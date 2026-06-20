// Hire and get Hired

const heroContent = document.querySelector(".hero-content");
const hire = document.querySelector("#hire");
const getHired = document.querySelector("#getHired");
const btn = document.querySelectorAll(".switchRole button");

btn.forEach(button => { 
    button.addEventListener("click", () => {

        if(button.innerHTML === "Hire") {

            hire.classList.remove("inActive");
            getHired.classList.add("inActive");

            heroContent.scrollBy({
                left: -window.innerWidth * 100,
                behavior: "smooth"
            });
            createBtn (clientFeatures);
            
        } else {
            
            hire.classList.add("inActive");
            getHired.classList.remove("inActive");

            heroContent.scrollBy({
                left: window.innerWidth * 100,
                behavior: "smooth"
            });
            createBtn (providerFeatures);
        }
    });

});

// How it works
function scrollSlider(num){

    slider.scrollBy({
        left: window.innerWidth * num,
        behavior: "smooth"
    });
}

(function () {
    "use strict";

    /* ── Toggle pill ── */
    const btnHiring  = document.getElementById('btn-hiring');
    const btnFinding = document.getElementById('btn-finding');

    [btnHiring, btnFinding].forEach(btn => {
        btn.addEventListener('click', () => {
            btnHiring.classList.toggle('active',  btn === btnHiring);
            btnFinding.classList.toggle('active', btn === btnFinding);
        });
    });

    /* ── Drag-to-scroll (mouse) ── */
    const slider    = document.getElementById('slider');
    const indicator = document.getElementById('scroll-indicator');
    const cards     = document.querySelectorAll('.step-card');

    let isDown   = false;
    let startX, scrollLeft;

    slider.addEventListener('mousedown', e => {
        if (window.innerWidth >= 1024) return;
        isDown     = true;
        startX     = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    ['mouseleave', 'mouseup'].forEach(ev =>
        slider.addEventListener(ev, () => { isDown = false; })
    );

    slider.addEventListener('mousemove', e => {
        if (!isDown) return;
        e.preventDefault();
        const x    = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2;
        slider.scrollLeft = scrollLeft - walk;
    });

    /* ── Scroll indicator + card scaling ── */
    function updateScrollEffects() {
        if (window.innerWidth >= 1024) {
            cards.forEach(c => (c.style.transform = 'scale(1)'));
            return;
        }

        const maxScroll    = slider.scrollWidth - slider.clientWidth;
        const fraction     = maxScroll > 0 ? slider.scrollLeft / maxScroll : 0;

        /* indicator */
        if (indicator) {
            indicator.style.transform = `translateX(${fraction * 200}%)`;
        }

        /* card scaling based on distance from viewport centre */
        const viewportCentre = slider.offsetWidth / 2;
        cards.forEach(card => {
            const rect         = card.getBoundingClientRect();
            const cardCentre   = rect.left + rect.width / 2;
            const dist         = Math.abs(viewportCentre - cardCentre);
            const normDist     = Math.min(dist / (slider.offsetWidth / 2), 1);
            const scale        = 1 - normDist * 0.1;
            card.style.transform = `scale(${scale})`;
        });
    }

    slider.addEventListener('scroll', updateScrollEffects);
    window.addEventListener('resize', updateScrollEffects);
    updateScrollEffects(); // initial call
})();

// Job sample banner
(function () {
    "use strict";

    /* ── Toggle pills (shared handler for all toggle groups) ── */
    document.querySelectorAll('.toggle-pill').forEach(pill => {
        pill.querySelectorAll('.tgl-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                pill.querySelectorAll('.tgl-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    });

    /* ══════════════════════════════════════════
       CAROUSEL INITIALISER
       Mirrors the original initCarousel() logic exactly.
       Receives the track <div> element and a flag for
       whether it's the "primary" (light) or "secondary" (dark) banner.
    ══════════════════════════════════════════ */
    function initCarousel(trackEl, isPrimary) {
        if (!trackEl) return;

        const originalItems = Array.from(trackEl.children);
        trackEl.innerHTML = '';
        trackEl.style.width = '100%';

        const clone1 = originalItems.map(i => i.cloneNode(true));
        const clone2 = originalItems.map(i => i.cloneNode(true));

        [...clone1, ...originalItems, ...clone2].forEach(item => {
            item.className = 'c-item flex-shrink-0';
            item.style.width = '33.333%';
            item.style.padding = '0 4px';
            item.style.transition = 'all 700ms ease-out';
            trackEl.appendChild(item);
        });

        const items      = Array.from(trackEl.children);
        const itemCount  = originalItems.length; // = 3
        let   currentIdx = itemCount;             // start at the real set

        function update(instant) {
            trackEl.style.transition = instant ? 'none' : 'transform 1000ms ease-in-out';
            trackEl.style.transform  = `translateX(${-currentIdx * 33.333}%)`;

            items.forEach((item, i) => {
                const img = item.querySelector('img');
                img.style.border     = '1px solid #001A41';

                if (i === currentIdx - 1) {
                    // Last image to the left
                    item.style.transform = 'scale(.8) translateX(20%)';
                    item.style.zIndex    = '5';
                    item.style.filter    = 'blur(2px)';
                    item.style.opacity   = '0.5';
                    img.style.boxShadow  = '';
                } else if (i === currentIdx + 1) {
                    // centre — hero

                    if(window.innerWidth < 768) {

                        item.style.transform = 'scale(1.7) translateX(0)';
                    } else {
                        
                        item.style.transform = 'scale(1.5) translateX(0)';
                    }
                    item.style.zIndex    = '30';
                    item.style.filter    = 'blur(0)';
                    item.style.opacity   = '1';
                } else if (i === currentIdx) {
                    // left side
                    item.style.transform = 'scale(1.1) translateX(5%)';
                    item.style.zIndex    = '10';
                    item.style.filter    = 'blur(2px)';
                    item.style.opacity   = '0.7';
                    img.style.boxShadow  = '';
                } else if (i === currentIdx + 2) {
                    // right side
                    item.style.transform = 'scale(1.1) translateX(-5%)';
                    item.style.zIndex    = '10';
                    item.style.filter    = 'blur(2px)';
                    item.style.opacity   = '0.7';
                    img.style.boxShadow  = '';
                
                } else if (i === currentIdx + 3) {
                    // Last image to the right
                    item.style.transform = 'scale(.8) translateX(-20%)';
                    item.style.zIndex    = '5';
                    item.style.filter    = 'blur(2px)';
                    item.style.opacity   = '0.5';
                    img.style.boxShadow  = '';
                } else {
                    item.style.transform = 'scale(.6) translateX(0)';
                    item.style.filter    = 'blur(2px)';
                    item.style.opacity   = '0.5';
                    img.style.boxShadow  = '';
                }
            });

            if (instant) trackEl.offsetHeight; // force reflow
        }

        function next() {
            currentIdx++;
            update(false);
            if (currentIdx >= itemCount * 2 - 1) {
                setTimeout(() => {
                    currentIdx = itemCount - 1;
                    update(true);
                }, 1000);
            }
        }

       // Pause on hover over the outer section
        const section = trackEl.closest('section');
        let   timer   = setInterval(next, 3000);
        if (section) {
            section.addEventListener('mouseenter', () => clearInterval(timer));
            section.addEventListener('mouseleave', () => { timer = setInterval(next, 3000); });
        }

        update(true); // initial position
    }

    document.addEventListener('DOMContentLoaded', () => {
        initCarousel(document.getElementById('carousel-primary'),   true);
        initCarousel(document.getElementById('carousel-secondary'),  false);
    });
})();


//=========== PROFILES

// Remove Popup
function removePopup(e = '') {
    document.getElementById('ls-popup').remove();
    window.location.href = `${siteUrl}${e}`;
}