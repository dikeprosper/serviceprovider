<?php
   include_once './fileasset/header.php';
?>

    <style>
        :root {
            --primary: #00288e;
            --primary2: #1e40af;
            --surface: #f8f9ff;
            --surface-low: #eff4ff;
            --surface-high: #dde9ff;
            --text: #0d1c2f;
            --muted: #444653;
        }

        body {
            background: var(--surface);
            color: var(--text);
            font-family: 'Manrope', sans-serif;
        }

        h1, h2, h3, h4, .headline {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .editorial-shadow {
            box-shadow: 0 12px 32px rgba(13, 28, 47, .06);
        }

        .bg-primary-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary2) 100%);
        }

        .rounded-3xl { border-radius: 1.5rem; }
        .rounded-xl { border-radius: .75rem; }
        .text-primary-custom { color: var(--primary) !important; }
        .text-muted-custom { color: var(--muted) !important; }
        .bg-panel { background: #fff; }


        .hero-title {
            font-size: clamp(3rem, 8vw, 5.5rem);
            line-height: 1.1;
            font-weight: 800;
        }

        .icon-box {
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            background: var(--surface-high);
            color: var(--primary);
            transition: .3s;
        }

        .info-row:hover .icon-box {
            background: var(--primary);
            color: #fff;
        }

        .card-hover { transition: .3s; }
        .card-hover:hover { transform: translateY(-8px); }

        .btn-main {
            color: #fff;
            font-weight: 700;
            padding: 16px;
            border: none;
            width: 100%;
        }

        .smallcaps {
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .15em;
            color: var(--muted);
        }

        .form-control, .form-select {
            background: var(--surface-low);
            border: none;
            padding: 1rem;
            border-radius: .75rem;
        }

        .faq-section {
            background: var(--surface-low);
            border-top-left-radius: 3rem;
            border-top-right-radius: 3rem;
        }

        .faq-title { font-size: 1.75rem; }
        .faq-card-title { font-size: 1.05rem; font-weight: 600; }
        .faq-text { font-size: .9rem; line-height: 1.6; }
        .faq-icon { font-size: 24px !important; }
        .faq-btn {
            font-size: .85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: .25rem;
        }
    </style>
</head>
<body>

<main class="py-5 my-5">

    <!-- HERO -->
    <section class="container-xl py-5 text-center">

        <div class="py-5 px-2 px-sm-4 px-md-5">

            <div class="text-uppercase fw-bold small text-primary-custom mb-4" style="letter-spacing: .2em;">
                Concierge Support
            </div>

            <h1 class="hero-title mb-4">Get in Touch</h1>

            <p class="fs-6 text-muted-custom mx-auto" style="max-width: 700px;">
                Our team of dedicated service architects is ready to help you scale your operations or find the perfect professional fit for your next project.
            </p>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="container-xl py-5">

        <div class="py-5 px-2 px-sm-4 px-md-5">

            <div class="row align-items-start mb-5">
    
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="bg-panel rounded-3xl editorial-shadow p-4 p-md-5">
                        <form method="post" action="#">
    
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label class="smallcaps mb-2">Full Name</label>
                                    <input type="text" class="form-control" placeholder="John Architect">
                                </div>
                                <div class="col-md-6">
                                    <label class="smallcaps mb-2">Work Email</label>
                                    <input type="email" class="form-control" placeholder="john@firm.com">
                                </div>
                            </div>
    
                            <div class="mb-4">
                                <label class="smallcaps mb-2">Subject</label>
                                <select class="form-select">
                                    <option>Enterprise Solutions</option>
                                    <option>Professional Verification</option>
                                    <option>Billing & Billing</option>
                                    <option>Partnership Inquiries</option>
                                </select>
                            </div>
    
                            <div class="mb-4">
                                <label class="smallcaps mb-2">Message</label>
                                <textarea rows="5" class="form-control" placeholder="How can we help your business thrive?"></textarea>
                            </div>
    
                            <button class="btn btn-main bg-primary-gradient rounded-xl editorial-shadow">
                                Send Inquiry
                                <span class="material-symbols-outlined ms-1">arrow_forward</span>
                            </button>
    
                        </form>
                    </div>
                </div>
    
                <div class="col-lg-5 ps-lg-5">
    
                    <h3 class="headline fw-bold mb-4">Contact Details</h3>
    
                    <div class="vstack gap-4">
    
                        <div class="d-flex gap-3 info-row">
                            <div class="icon-box"><span class="material-symbols-outlined">mail</span></div>
                            <div>
                                <div class="smallcaps mb-1">Email Us</div>
                                <div class="fs-6 fw-semibold">hello@promarket.global</div>
                            </div>
                        </div>
    
                        <div class="d-flex gap-3 info-row">
                            <div class="icon-box"><span class="material-symbols-outlined">call</span></div>
                            <div>
                                <div class="smallcaps mb-1">Call Us</div>
                                <div class="fs-6 fw-semibold">+1 (888) 420-PROS</div>
                            </div>
                        </div>
    
                        <div class="d-flex gap-3 info-row">
                            <div class="icon-box"><span class="material-symbols-outlined">location_on</span></div>
                            <div>
                                <div class="smallcaps mb-1">Our Headquarters</div>
                                <div class="fs-6 fw-semibold">350 Fifth Avenue<br>New York, NY 10118</div>
                            </div>
                        </div>
    
                    </div>
    
                    <!-- CAREER BOX ADDED -->
                    <div class="mt-4 p-4 rounded-3xl" style="background: rgba(30,64,175,.06); border: 1px solid rgba(0,40,142,.05);">
                        <h4 class="fw-bold mb-2">Looking for a career?</h4>
                        <p class="faq-text text-muted-custom mb-3">
                            We are always hunting for visionaries. Join our global remote-first team.
                        </p>
                        <a href="#" class="text-primary-custom faq-btn text-decoration-none">
                            View Openings <span class="material-symbols-outlined">open_in_new</span>
                        </a>
                    </div>
    
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="faq-section py-5">

        <div class="container-xl ">

            <div class="py-5 px-2 px-sm-4 px-md-5">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5 gap-4">

                    <div style="max-width: 650px;">
                        <h2 class="headline fw-bold faq-title mb-3">Quick Solutions</h2>
                        <p class="text-muted-custom">
                            Before reaching out, you might find an immediate answer in our curated knowledge base or common inquiries list.
                        </p>
                    </div>

                    <a href="#" class="btn btn-light text-primary-custom fw-bold px-4 py-3 editorial-shadow">
                        Visit Help Center
                    </a>

                </div>

                <div class="row g-4">

                    <div class="col-md-4">
                        <div class="bg-white p-4 rounded-3xl editorial-shadow card-hover h-100">
                            <span class="material-symbols-outlined text-primary-custom mb-3 faq-icon">verified_user</span>
                            <h4 class="faq-card-title mb-2">Verification Process</h4>
                            <p class="text-muted-custom faq-text mb-4">
                                Learn about our 12-step professional vetting process and how to get your "Elite" badge.
                            </p>
                            <a href="#" class="text-primary-custom faq-btn text-decoration-none">
                                Read Guide <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-white p-4 rounded-3xl editorial-shadow card-hover h-100">
                            <span class="material-symbols-outlined text-primary-custom mb-3 faq-icon">payments</span>
                            <h4 class="faq-card-title mb-2">Payment Escrow</h4>
                            <p class="text-muted-custom faq-text mb-4">
                                Understand how ProMarket protects both clients and pros with our secure milestone-based escrow.
                            </p>
                            <a href="#" class="text-primary-custom faq-btn text-decoration-none">
                                Read Guide <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-white p-4 rounded-3xl editorial-shadow card-hover h-100">
                            <span class="material-symbols-outlined text-primary-custom mb-3 faq-icon">hub</span>
                            <h4 class="faq-card-title mb-2">API & Integrations</h4>
                            <p class="text-muted-custom faq-text mb-4">
                                Explore our enterprise API documentation for custom workforce management integrations.
                            </p>
                            <a href="#" class="text-primary-custom faq-btn text-decoration-none">
                                Read Guide <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

</main>
<?php
   include_once './fileasset/footer.php';
?>