document.addEventListener('DOMContentLoaded', function () {

    const pickupRadio = document.getElementById('fulfillPickup');
    const deliveryRadio = document.getElementById('fulfillDelivery');
    const pickupSection = document.getElementById('pickupSection');
    const deliverySection = document.getElementById('deliverySection');

    function toggleFulfillment() {
        const isPickup = pickupRadio.checked;
        pickupSection.classList.toggle('d-none', !isPickup);
        deliverySection.classList.toggle('d-none', isPickup);
        document.getElementById('deliveryFeeRow')?.classList.toggle('d-none', isPickup);
        if (isPickup) document.getElementById('addressServiceWarning')?.classList.add('d-none');
        updateTotalDisplay();
    }
    pickupRadio?.addEventListener('change', toggleFulfillment);
    deliveryRadio?.addEventListener('change', toggleFulfillment);
    toggleFulfillment();
    updateTotalDisplay();

    // Logged-in user with a saved zone: reveal the search field to pick a different one
    const useDifferentBtn = document.getElementById('useDifferentAddressBtn');
    const zoneFieldWrap = document.getElementById('zoneFieldWrap');
    useDifferentBtn?.addEventListener('click', function () {
        zoneFieldWrap.classList.toggle('d-none');
    });

    initZoneSearch();

    const channelMap = {
        bank_transfer: ['bank_transfer'],
        card: ['card'],
        ussd: ['ussd'],
        bank: ['bank'],
    };

    document.getElementById('payNowBtn')?.addEventListener('click', function () {
        if (!validateCheckout()) return;

        const selectedMethod = document.querySelector('input[name="payment_method"]:checked')?.value || 'card';
        const email = CHECKOUT_CONFIG.userEmail || document.getElementById('guestEmail')?.value;
        const fulfillment = document.querySelector('input[name="fulfillment"]:checked')?.value;
        const totalKobo = CHECKOUT_CONFIG.itemPriceKobo + (fulfillment === 'delivery' ? CHECKOUT_CONFIG.deliveryFeeKobo : 0);

        const handler = PaystackPop.setup({
            key: CHECKOUT_CONFIG.paystackPublicKey,
            email: email,
            amount: totalKobo,
            channels: channelMap[selectedMethod],
            callback: function (response) {
                fetch(CHECKOUT_CONFIG.verifyUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        reference: response.reference,
                        fulfillment: document.querySelector('input[name="fulfillment"]:checked')?.value,
                        pickup_point: document.getElementById('pickupPoint')?.value,
                        delivery_zone_id: document.getElementById('delivery_zone_id')?.value,
                        guest_email: document.getElementById('guestEmail')?.value,
                        guest_password: document.getElementById('guestPassword')?.value,
                    }),
                })
                    .then((res) => res.json())
                    .then((data) => {
                        window.location.href = data.redirect || CHECKOUT_CONFIG.successUrl;
                    })
                    .catch(() => {
                        alert('Payment went through, but we could not confirm your order automatically. Contact support with your reference: ' + response.reference);
                    });
            },
            onClose: function () {
                console.log('Payment window closed');
            },
        });

        handler.openIframe();
    });

    function validateCheckout() {
        const fulfillment = document.querySelector('input[name="fulfillment"]:checked')?.value;

        if (fulfillment === 'pickup') {
            if (!document.getElementById('pickupPoint')?.value) {
                alert('Please select a pickup point.');
                return false;
            }
            return true;
        }

        const usingSaved = document.getElementById('useSavedAddress')?.checked;
        if (!usingSaved && !document.getElementById('delivery_zone_id')?.value) {
            alert('Please search and select your delivery area.');
            return false;
        }

        if (!usingSaved && !CHECKOUT_CONFIG.zoneValid) {
            alert('Please pick a valid delivery area from the suggestions, or choose pickup.');
            return false;
        }

        if (!CHECKOUT_CONFIG.userEmail) {
            const email = document.getElementById('guestEmail')?.value;
            const pass = document.getElementById('guestPassword')?.value;
            if (!email || !pass) {
                alert('Please enter an email and password so we can create your account.');
                return false;
            }
        }

        return true;
    }
});

/**
 * Local-data search box over CHECKOUT_CONFIG.zoneSearchIndex — matches zone
 * names, listed streets, and hidden aliases, all client-side, no API calls.
 */
function initZoneSearch() {
    const input = document.getElementById('zoneSearch');
    const suggestionsBox = document.getElementById('zoneSuggestions');
    if (!input || !suggestionsBox) return;

    input.addEventListener('input', function () {
        const query = input.value.trim().toLowerCase();
        document.getElementById('delivery_zone_id').value = '';
        CHECKOUT_CONFIG.zoneValid = false;

        if (query.length < 2) {
            suggestionsBox.classList.add('d-none');
            suggestionsBox.innerHTML = '';
            return;
        }

        const matches = CHECKOUT_CONFIG.zoneSearchIndex
            .filter((entry) => entry.label.toLowerCase().includes(query))
            .slice(0, 8);

        renderSuggestions(matches);
    });

    input.addEventListener('blur', function () {
        // Slight delay so a click on a suggestion registers before the list hides
        setTimeout(() => suggestionsBox.classList.add('d-none'), 150);
    });

    function renderSuggestions(matches) {
        if (matches.length === 0) {
            suggestionsBox.innerHTML = '<div class="list-group-item small text-muted">No matches — try a nearby landmark, or choose pickup instead.</div>';
            suggestionsBox.classList.remove('d-none');
            return;
        }

        suggestionsBox.innerHTML = matches
            .map((entry, i) => `<button type="button" class="list-group-item list-group-item-action small" data-index="${i}">${entry.label}</button>`)
            .join('');
        suggestionsBox.classList.remove('d-none');

        suggestionsBox.querySelectorAll('button').forEach((btn, i) => {
            btn.addEventListener('click', () => selectZone(matches[i]));
        });
    }

    function selectZone(entry) {
        input.value = entry.label;
        document.getElementById('delivery_zone_id').value = entry.zone_id;
        document.getElementById('selectedZoneDisplay').textContent = `Delivery fee for this area: ₦${entry.fee.toLocaleString('en-NG')}`;
        suggestionsBox.classList.add('d-none');

        CHECKOUT_CONFIG.zoneValid = true;
        CHECKOUT_CONFIG.deliveryFeeKobo = entry.fee * 100;
        document.getElementById('addressServiceWarning')?.classList.add('d-none');
        updateTotalDisplay();
    }
}

function updateTotalDisplay() {
    const fulfillment = document.querySelector('input[name="fulfillment"]:checked')?.value;
    const feeKobo = fulfillment === 'delivery' ? CHECKOUT_CONFIG.deliveryFeeKobo : 0;
    const totalKobo = CHECKOUT_CONFIG.itemPriceKobo + feeKobo;

    const feeDisplay = document.getElementById('deliveryFeeDisplay');
    const totalDisplay = document.getElementById('orderTotalDisplay');

    if (feeDisplay) feeDisplay.textContent = `₦${(feeKobo / 100).toLocaleString('en-NG', { minimumFractionDigits: 2 })}`;
    if (totalDisplay) totalDisplay.textContent = `₦${(totalKobo / 100).toLocaleString('en-NG', { minimumFractionDigits: 2 })}`;
}