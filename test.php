<?php
// Architecto | How It Works — PHP + Bootstrap conversion
$page_title = "Architecto | How It Works";
$steps = [
    [
        "title"   => "Post a job for free",
        "desc"    => "Tell us what you need. Provide a few details and we'll help you find the right professional for your project.",
        "btn"     => "Get Started",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuCv8QS1h9v7fP6D7RzeQs6rdcRypDVKgHDYJDKdc_ojn0k3KbM9Wp5YC6zRqTzeQzorZ0ujR8bxKZB3daF44h8MphqiTQUqQlVkkEqHKNYQ0YGL8esSR6ZreNcDP5NvKtwx_QlS_4v-D8rGBe8MUyfV3dnTvsiYOXX_O4MXiJvxTj_Ji0j9ot-tPCpRh3cjXDcNgrACYCfBWg4Kr0zRJqNGEkqJo2MbF2RUIX1i_fsjRqeSLSfofoU08iNbDSRkRBeZOsaouPtFJ3YV",
        "alt"     => "Post a job",
    ],
    [
        "title"   => "Get proposals and hire",
        "desc"    => "Top-rated pros will send you quotes. Review their portfolios, read reviews, and hire the best match for your needs.",
        "btn"     => "Find Pros",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuA60_bMmosfkhQKFjpM6XTAmRFSjcLp0_nduCPZbRHn2OtecLB-JuK4OOwq6Zk6DsKUX0hHyCmJ1qXiq_iD972VKBzx-hbDKSy6xlWYirigz8arPxUiEwwRoB8-GS7wMZ_Sr4tLBoO2Jik0nGK8DQ2JQ2KQlyd1c53sXlMeK4uExYYPFfx8Zfr0b2ecGAS41DScG1UL_RCzzX7S96_ZoTPvBwUTt8AMNs9hQoLq92KrIINMNEPnQW7VKjePjPr0PpDOOYQP2a7pZ3tz",
        "alt"     => "Hire experts",
    ],
    [
        "title"   => "Pay when work is done",
        "desc"    => "Secure payments released only when you're 100% satisfied with the completed project. Quality guaranteed.",
        "btn"     => "Learn More",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuAGtwMfAUW2SJ5HPcxpYqdSDF_3q6yJ0HYmkfNQbTASFFYh-C-Fo194mKbAGDeo1zESshi6_WBJkIqzYPyYZtu-8XcPSh_ww0lk8EFp3ehE2e59a8vAzfN7bUbXGtPfZ7qUPuDxQbuw9nPhAJR3116CRFlBg8e0S52X2vrBcCfuIIXMDihlKo9qScqa_JSdFvhrU7d-7WuED0-OxkgxOVWZvP1fsJdmcR2u6f9l5LPQnm2DupT4NY_wScdoQAt3OfpXsn6piILnH2PB",
        "alt"     => "Pay securely",
    ],
];
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Manrope:wght@500;600;700&display=swap" rel="stylesheet"/>

    <style>
        /* ── Custom Design Tokens (mirrors original Tailwind config) ── */
        :root {
            --color-primary:               #00288e;
            --color-primary-container:     #1e40af;
            --color-primary-fixed:         #dde1ff;
            --color-on-primary:            #ffffff;
            --color-on-primary-fixed:      #001453;
            --color-on-background:         #0d1c2f;
            --color-on-surface:            #0d1c2f;
            --color-on-surface-variant:    #444653;
            --color-surface:               #f8f9ff;
            --color-surface-container-low: #eff4ff;
            --color-surface-container:     #e6eeff;
            --color-outline-variant:       #c4c5d5;
            --color-primary-fixed-dim:     #b8c4ff;
        }

        /* ── Base ── */
        html { scroll-behavior: smooth; }
        body {
            background: #ffffff;
            color: var(--color-on-background);
            font-family: 'Manrope', sans-serif;
            font-weight: 500;
        }
        ::selection {
            background: var(--color-primary-fixed);
            color: var(--color-on-primary-fixed);
        }

        /* ── Section ── */
        .hiw-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 6rem 0;
            background: #ffffff;
            overflow: hidden;
        }

        /* ── Headline ── */
        .hiw-headline {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: clamp(2.5rem, 6vw, 3.75rem);
            letter-spacing: -0.02em;
            color: var(--color-on-background);
        }

        /* ── Toggle Pill ── */
        .toggle-pill {
            display: inline-flex;
            padding: 0.25rem;
            background: var(--color-surface-container-low);
            border: 1px solid rgba(196,197,213,0.3);
            border-radius: 9999px;
            gap: 0;
        }
        .toggle-pill .toggle-btn {
            padding: 0.5rem 2rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 700;
            border: none;
            background: transparent;
            color: var(--color-on-surface-variant);
            cursor: pointer;
            transition: color 0.2s;
            white-space: nowrap;
        }
        .toggle-pill .toggle-btn.active {
            background: #ffffff;
            color: var(--color-primary);
            box-shadow: 0 1px 3px rgba(0,0,0,0.12);
        }
        .toggle-pill .toggle-btn:not(.active):hover {
            color: var(--color-on-surface);
        }

        /* ── Slider wrapper (mobile / tablet) ── */
        .steps-slider {
            display: flex;
            overflow-x: auto;
            gap: 1.5rem;
            padding-bottom: 3rem;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            cursor: grab;
        }
        .steps-slider:active { cursor: grabbing; }
        .steps-slider::-webkit-scrollbar { display: none; }
        .steps-slider { scrollbar-width: none; -ms-overflow-style: none; }

        /* ── Step card base ── */
        .step-card {
            flex: 0 0 66%;
            scroll-snap-align: center;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease-out;
            transform-origin: center;
        }

        /* ── Card image wrapper ── */
        .card-img-wrap {
            aspect-ratio: 4 / 3;
            border-radius: 1.5rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
            background: var(--color-surface-container-low);
            border: 1px solid rgba(196,197,213,0.1);
            transition: box-shadow 0.5s ease;
        }
        .step-card:hover .card-img-wrap {
            box-shadow: 0 20px 40px rgba(0,40,142,0.05);
        }
        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }
        .step-card:hover .card-img-wrap img {
            transform: scale(1.10);
        }

        /* ── Card title ── */
        .step-card h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--color-on-background);
            margin-bottom: 0.75rem;
        }

        /* ── Mobile-only card body (text + button) ── */
        .card-mobile-body p {
            color: var(--color-on-surface-variant);
            font-size: 1.125rem;
            line-height: 1.65;
            margin-bottom: 1.5rem;
        }
        .card-mobile-body .btn-card {
            width: 100%;
            padding: 1rem;
            background: var(--color-primary);
            color: var(--color-on-primary);
            font-weight: 700;
            font-size: 1rem;
            border: none;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .card-mobile-body .btn-card:hover {
            background: var(--color-primary-container);
        }

        /* ── Scroll indicator ── */
        .scroll-track {
            width: 100%;
            height: 4px;
            background: var(--color-surface-container);
            border-radius: 9999px;
            margin-top: 1rem;
            overflow: hidden;
        }
        .scroll-thumb {
            height: 100%;
            width: 33.333%;
            background: var(--color-primary);
            border-radius: 9999px;
            transition: transform 0.1s linear;
        }

        /* ── DESKTOP: 3-column grid ── */
        @media (min-width: 1024px) {
            .steps-slider {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
                overflow: visible;
                padding-bottom: 0;
                cursor: default;
            }
            .step-card {
                flex: unset;
                scroll-snap-align: unset;
            }
            .step-card h3 {
                font-size: 1.5rem;
            }
            .card-mobile-body {
                display: none !important;
            }
            .scroll-track {
                display: none !important;
            }
        }

        /* ── TABLET: 2.5 cards visible ── */
        @media (min-width: 768px) and (max-width: 1023.9px) {
            .step-card { flex: 0 0 40%; }
        }
    </style>
</head>
<body>

<!-- ═══════════════════════════════════════════
     HOW IT WORKS SECTION
═══════════════════════════════════════════ -->
<section class="hiw-section">
    <div class="container" style="max-width: 88rem;">

        <!-- Header row -->
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-md-between mb-5 gap-4">
            <h2 class="hiw-headline mb-0">How it works</h2>
            <div class="toggle-pill align-self-start">
                <button class="toggle-btn active" id="btn-hiring">For hiring</button>
                <button class="toggle-btn" id="btn-finding">For finding work</button>
            </div>
        </div>

        <!-- Slider container -->
        <div class="position-relative" id="slider-wrapper">
            <div class="steps-slider" id="slider">

                <?php foreach ($steps as $i => $step): ?>
                <div class="step-card">
                    <!-- Image -->
                    <div class="card-img-wrap">
                        <img
                            src="<?php echo htmlspecialchars($step['img']); ?>"
                            alt="<?php echo htmlspecialchars($step['alt']); ?>"
                            loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                        />
                    </div>

                    <!-- Title + mobile body -->
                    <div class="d-flex flex-column flex-grow-1">
                        <h3><?php echo htmlspecialchars($step['title']); ?></h3>
                        <div class="card-mobile-body">
                            <p><?php echo htmlspecialchars($step['desc']); ?></p>
                            <button class="btn-card"><?php echo htmlspecialchars($step['btn']); ?></button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

            <!-- Scroll indicator (mobile / tablet only) -->
            <div class="scroll-track">
                <div class="scroll-thumb" id="scroll-indicator"></div>
            </div>
        </div>

    </div><!-- /.container -->
</section>

<!-- Bootstrap 5 JS (Bundle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
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
            const scale        = 1 - normDist * 0.08;
            card.style.transform = `scale(${scale})`;
        });
    }

    slider.addEventListener('scroll', updateScrollEffects);
    window.addEventListener('resize', updateScrollEffects);
    updateScrollEffects(); // initial call
})();
</script>
</body>
</html>