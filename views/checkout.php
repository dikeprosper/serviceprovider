<?php
if (isset($_SESSION['selected_styles']) && isset($_GET['selected'])) {

    $item = $_SESSION['selected_styles'];

    $pid = htmlentities($item['pid']) ?? null;
    $img = $item['img'] ?? null;

    $savedTime = $item['saved_at'] ?? null;

} else {

    header("location:" . SITE_URL);
}

include './fileasset/header.php';


// Brings in $zones, buildZoneSearchIndex(), calculateDeliveryFeeByZone()
include './fileasset/delivery-zones.php';
// Brings in $pickupPoints
include './fileasset/pickup-points.php';

// Saved address for a logged in customer - replace with a real query
// e.g. SELECT * FROM addresses WHERE uid = $user['uid'] AND is_default = 1
$savedAddress = null;
if (isset($user)) {
    // $savedAddress = ['label' => 'Home', 'address' => '14 Soso Street, off Wimpy', 'zone_id' => 'wimpy'];
}

// Price the saved address up front so the total is correct before the user
// touches anything.
$initialDeliveryFee = ['valid' => true, 'fee' => 0, 'zone' => null];
if ($savedAddress) {
    $initialDeliveryFee = calculateDeliveryFeeByZone($savedAddress['zone_id']);
}

// Amounts in kobo (Paystack expects the smallest currency unit)
$itemPriceKobo = isset($item['price']) ? (int) ($item['price'] * 100) : 0;
$initialDeliveryFeeKobo = $initialDeliveryFee['fee'] * 100;

?>

<link rel="stylesheet" href="<?= SITE_URL ?>css/order.css">

<main class="<?= $section_padding ?> pt-5 mt-5 pb-5 mb-5">
    <div class="container-xl">

        <header class="mb-4 pb-md-4">
            <span class="mb-3 fs-6 text-primary">Final step</span>
            <h1 class="mb-3 <?= $section_title_bold ?> text-primary">CHECKOUT</h1>
        </header>

        <div class="row g-4">
            <div class="col-lg-7">

                <!-- Fulfillment method -->
                <div class="option-card card-hover p-4 mb-4">
                    <h5 class="mb-3">How do you want your order?</h5>

                    <div class="d-flex gap-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fulfillment" id="fulfillPickup" value="pickup">
                            <label class="form-check-label" for="fulfillPickup">Pick up</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fulfillment" id="fulfillDelivery" value="delivery" checked>
                            <label class="form-check-label" for="fulfillDelivery">Delivery</label>
                        </div>
                    </div>

                    <!-- Pickup -->
                    <div id="pickupSection" class="d-none">
                        <label for="pickupPoint" class="form-label">Choose a pickup point</label>
                        <select class="form-select" id="pickupPoint" name="pickup_point">
                            <option value="" selected disabled>Select a location</option>
                            <?php foreach ($pickupPoints as $point): ?>
                                <option value="<?= htmlspecialchars($point['id']) ?>">
                                    <?= htmlspecialchars($point['name']) ?> — <?= htmlspecialchars($point['address']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Delivery -->
                    <div id="deliverySection">
                        <?php if (isset($user)): ?>

                            <?php if ($savedAddress): ?>
                                <div class="saved-address-card border rounded p-3 mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="delivery_address_choice" id="useSavedAddress" value="saved" checked>
                                        <label class="form-check-label fw-semibold" for="useSavedAddress">
                                            <?= htmlspecialchars($savedAddress['label']) ?>
                                        </label>
                                    </div>
                                    <p class="text-muted mb-2 ps-4"><?= htmlspecialchars($savedAddress['address']) ?></p>
                                    <button type="button" class="btn btn-link ps-4 p-0" id="useDifferentAddressBtn">Use a different address</button>
                                </div>

                                <div id="zoneFieldWrap" class="d-none">
                                    <?php include './fileasset/delivery-zone-field.php'; ?>
                                </div>
                            <?php else: ?>
                                <?php include './fileasset/delivery-zone-field.php'; ?>
                            <?php endif; ?>

                        <?php else: ?>

                            <?php include './fileasset/delivery-zone-field.php'; ?>

                            <div class="guest-account-card border rounded p-3 mt-3">
                                <p class="small text-muted mb-3">We'll create an account for you so you can track this order — just set a password below.</p>
                                <div class="mb-2">
                                    <label for="guestEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="guestEmail" name="guest_email" required>
                                </div>
                                <div class="mb-2">
                                    <label for="guestPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="guestPassword" name="guest_password" required>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>

                <!-- Payment -->
                <div class="option-card card-hover p-4">
                    <h5 class="mb-3">Payment method</h5>

                    <div class="payment-options d-flex flex-column gap-2 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="payTransfer" value="bank_transfer" checked>
                            <label class="form-check-label" for="payTransfer">Bank Transfer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="payCard" value="card">
                            <label class="form-check-label" for="payCard">Debit/Credit Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="payUssd" value="ussd">
                            <label class="form-check-label" for="payUssd">USSD</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="payBank" value="bank">
                            <label class="form-check-label" for="payBank">Pay With Bank</label>
                        </div>
                    </div>

                    <button type="button" id="payNowBtn" class="btn btn-primary w-100 py-2">
                        Pay Now
                    </button>
                </div>

            </div>

            <div class="col-lg-5">
                <div class="option-card card-hover p-4">
                    <h5 class="mb-3">Order summary</h5>
                    <?php if (isset($img)): ?>
                        <img src="<?= htmlspecialchars($img) ?>" class="img-fluid rounded mb-3" alt="Selected style">
                    <?php endif; ?>

                    <div id="addressServiceWarning" class="alert alert-warning py-2 px-3 small d-none">
                        We couldn't match that to a delivery zone yet. Try a nearby landmark, or choose pickup instead.
                    </div>

                    <div class="d-flex justify-content-between mb-1">
                        <span>Item</span>
                        <span>₦<?= number_format($itemPriceKobo / 100, 2) ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-1" id="deliveryFeeRow">
                        <span>Delivery fee</span>
                        <span id="deliveryFeeDisplay">₦<?= number_format($initialDeliveryFeeKobo / 100, 2) ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span id="orderTotalDisplay">₦<?= number_format(($itemPriceKobo + $initialDeliveryFeeKobo) / 100, 2) ?></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    const CHECKOUT_CONFIG = {
        userEmail: <?= isset($user) ? json_encode($user['email']) : 'null' ?>,
        paystackPublicKey: "<?= PAYSTACK_PUBLIC_KEY ?>",
        itemPriceKobo: <?= $itemPriceKobo ?>,
        deliveryFeeKobo: <?= $initialDeliveryFeeKobo ?>, // updated live by order.js as the zone changes
        zoneValid: <?= $initialDeliveryFee['valid'] ? 'true' : 'false' ?>,
        // { label, zone_id, fee } for every zone/street/alias — built once server-side, searched client-side
        zoneSearchIndex: <?= json_encode(array_map(
            fn($entry) => $entry + ['fee' => findZoneById($entry['zone_id'])['fee']],
            buildZoneSearchIndex()
        )) ?>,
        verifyUrl: "<?= SITE_URL ?>api/verify-payment.php",
        successUrl: "<?= SITE_URL ?>order-success",
    };
</script>
<script src="<?= SITE_URL ?>js/order.js"></script>

<?php include './fileasset/footer.php'; ?>

// Pickup points - replace with a real query, e.g. SELECT * FROM pickup_points
$pickupPoints = [
    ['id' => 1, 'name' => 'GRA Phase 2', 'address' => '12 Aba Road, GRA Phase 2, Port Harcourt'],
    ['id' => 2, 'name' => 'Rumuola',     'address' => '45 Rumuola Road, Port Harcourt'],
    ['id' => 3, 'name' => 'Trans Amadi', 'address' => '8 Trans Amadi Industrial Layout, Port Harcourt'],
];

// Saved address for a logged in customer - replace with a real query
// e.g. SELECT * FROM addresses WHERE uid = $user['uid'] AND is_default = 1
$savedAddress = null;
if (isset($user)) {
    // $savedAddress = ['label' => 'Home', 'address' => '...', 'lat' => 4.8, 'lng' => 7.0];
}

// Amount to charge, in kobo (Paystack expects the smallest currency unit)
$amountKobo = 78000 * 100;

include './fileasset/header.php';
?>

<link rel="stylesheet" href="<?= SITE_URL ?>css/order.css">

<main class="<?= $section_padding ?> pt-5 mt-5 pb-5 mb-5">
    <div class="container-xl">

        <header class="mb-4 pb-md-4">
            <span class="mb-3 fs-6 text-primary">Final step</span>
            <h1 class="mb-3 <?= $section_title_bold ?> text-primary">CHECKOUT</h1>
        </header>

        <div class="row g-4">
            <div class="col-lg-7">

                <!-- Fulfillment method -->
                <div class="option-card card-hover p-4 mb-4">
                    <h5 class="mb-3">How do you want your order?</h5>

                    <div class="d-flex gap-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fulfillment" id="fulfillPickup" value="pickup">
                            <label class="form-check-label" for="fulfillPickup">Pick up</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fulfillment" id="fulfillDelivery" value="delivery" checked>
                            <label class="form-check-label" for="fulfillDelivery">Delivery</label>
                        </div>
                    </div>

                    <!-- Pickup -->
                    <div id="pickupSection" class="d-none">
                        <label for="pickupPoint" class="form-label">Choose a pickup point</label>
                        <select class="form-select" id="pickupPoint" name="pickup_point">
                            <option value="" selected disabled>Select a location</option>
                            <?php foreach ($pickupPoints as $point): ?>
                                <option value="<?= htmlspecialchars($point['id']) ?>">
                                    <?= htmlspecialchars($point['name']) ?> — <?= htmlspecialchars($point['address']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Delivery -->
                    <div id="deliverySection">
                        <?php if (isset($user)): ?>

                            <?php if ($savedAddress): ?>
                                <div class="saved-address-card border rounded p-3 mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="delivery_address_choice" id="useSavedAddress" value="saved" checked>
                                        <label class="form-check-label fw-semibold" for="useSavedAddress">
                                            <?= htmlspecialchars($savedAddress['label']) ?>
                                        </label>
                                    </div>
                                    <p class="text-muted mb-2 ps-4"><?= htmlspecialchars($savedAddress['address']) ?></p>
                                    <button type="button" class="btn btn-link ps-4 p-0" id="useDifferentAddressBtn">Use a different address</button>
                                </div>

                                <div id="addressMapWrap" class="d-none">
                                    <?php include './fileasset/address-map-fields.php'; ?>
                                </div>
                            <?php else: ?>
                                <?php include './fileasset/address-map-fields.php'; ?>
                            <?php endif; ?>

                        <?php else: ?>

                            <?php include './fileasset/address-map-fields.php'; ?>

                            <div class="guest-account-card border rounded p-3 mt-3">
                                <p class="small text-muted mb-3">We'll create an account for you so you can track this order — just set a password below.</p>
                                <div class="mb-2">
                                    <label for="guestEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="guestEmail" name="guest_email" required>
                                </div>
                                <div class="mb-2">
                                    <label for="guestPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="guestPassword" name="guest_password" required>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>

                <!-- Payment -->
                <div class="option-card card-hover p-4">
                    <div class="">

                        <h5 class="mb-3">Payment method</h5>
    
                        <div class="payment-options d-flex flex-column gap-2 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payTransfer" value="bank_transfer" checked>
                                <label class="form-check-label" for="payTransfer">Bank Transfer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payCard" value="card">
                                <label class="form-check-label" for="payCard">Debit/Credit Card</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payUssd" value="ussd">
                                <label class="form-check-label" for="payUssd">USSD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="payBank" value="bank">
                                <label class="form-check-label" for="payBank">Pay With Bank</label>
                            </div>
                        </div>
    
                        <button type="button" id="payNowBtn" class="btn btn-primary w-100 py-2">
                            Pay Now
                        </button>
                    </div>
                </div>

            </div>

            <div class="col-lg-5">
                <div class="option-card card-hover p-4">
                    <h5 class="mb-3">Order summary</h5>
                    
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Load your own key here, restricted to Places + Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_KEY&libraries=places"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<?php define("PAYSTACK_PUBLIC_KEY","hello") ?>
<script>
    const CHECKOUT_CONFIG = {
        userEmail: <?= isset($user) ? json_encode($user['email']) : 'null' ?>,
        paystackPublicKey: "<?= PAYSTACK_PUBLIC_KEY ?>",
        amount: <?= $amountKobo ?>, // kobo
        verifyUrl: "<?= SITE_URL ?>api/verify-payment.php",
        successUrl: "<?= SITE_URL ?>order-success",
    };
</script>
<script src="<?= SITE_URL ?>js/checkout.js"></script>

<?php include './fileasset/footer.php'; ?>