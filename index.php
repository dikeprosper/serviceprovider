<?php include 'header.php'; ?>

<!-- Hero Section -->
<section class="hero" style="padding-top: 175px; padding-bottom: 90px;">
    <div class="container-xl hero-content">
        <div class="col-lg-8">
            <h2 class="font-headline display-4 fw-bold tracking-tight mb-5">
                Book Trusted Local Professionals <span class="text-primary">in Minutes</span>
            </h2>
            <div class="bg-white p-2 rounded-4 shadow-lg d-flex flex-column flex-md-row gap-0" id="searchBar">
                <div class="flex-grow-1 d-flex align-items-center px-3 py-2 border-end">
                    <span class="material-symbols-outlined text-primary me-2">search</span>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="What service do you need?">
                </div>
                <div class="flex-grow-1 d-flex align-items-center px-3 py-2">
                    <span class="material-symbols-outlined text-primary me-2 icon-fill">location_on</span>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Your Location">
                </div>
                <button class="hero-gradient px-4 py-2 rounded-3 fw-bold fs-6">Search Pros</button>
            </div>
            <div class="mt-4 d-flex gap-2">
                <span class="small fw-bold text-muted fs-7">Popular:</span>

                <div class="d-flex flex-wrap gap-2">

                    <a href="#" class="fs-7 fw-bold text-primary text-decoration-none">Birthday makeover</a>
                    <a href="#" class="fs-7 fw-bold text-primary text-decoration-none">Bobo gown</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Bar - High Fidelity -->
<section class="bg-white py-4 border-top border-bottom" id="trustBar">
    <div class="container-xl">
        <div class="d-flex flex-wrap gap-4 justify-content-between align-items-center">
            <div class="d-flex gap-2 w-sm-100">
                <span class="material-symbols-outlined text-primary icon-fill">verified_user</span>
                <span class="fw-bold">50k+ Verified Pros</span>
            </div>
            <div class="d-flex gap-2 w-sm-100">
                <span class="material-symbols-outlined text-primary icon-fill">lock</span>
                <span class="fw-bold">Secure 256-bit Payments</span>
            </div>
            <div class="d-flex gap-2 w-sm-100">
                <span class="material-symbols-outlined text-primary icon-fill">bolt</span>
                <span class="fw-bold">60min Response Time</span>
            </div>
            <div class="d-flex gap-2 w-sm-100">
                <span class="material-symbols-outlined text-primary icon-fill">star</span>
                <span class="fw-bold">4.9/5 Avg. Rating</span>
            </div>
        </div>
    </div>
</section>

<!-- Popular Categories (Bento Grid) -->
<section class="py-5 my-md-5 container-xl">
    <div class="bento-grid">
        <!-- Large Card -->
        <a href="#" class="bento-large position-relative overflow-hidden rounded-4 text-decoration-none d-flex flex-column justify-content-end p-4 p-md-5 group">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGtwMfAUW2SJ5HPcxpYqdSDF_3q6yJ0HYmkfNQbTASFFYh-C-Fo194mKbAGDeo1zESshi6_WBJkIqzYPyYZtu-8XcPSh_ww0lk8EFp3ehE2e59a8vAzfN7bUbXGtPfZ7qUPuDxQbuw9nPhAJR3116CRFlBg8e0S52X2vrBcCfuIIXMDihlKo9qScqa_JSdFvhrU7d-7WuED0-OxkgxOVWZvP1fsJdmcR2u6f9l5LPQnm2DupT4NY_wScdoQAt3OfpXsn6piILnH2PB" class="position-absolute start-0 bottom-0 inset-0 w-100 object-fit-cover transition-all group-hover-scale" alt="Cleaner" style="z-index: -1;">
            <div class="position-absolute inset-0 transition-all" style="background: linear-gradient(to top, rgba(13, 28, 47, 0.8), transparent); z-index: 0;"></div>
            <div class="position-relative z-1 text-white">
                <h3 class="h3 fw-bold font-headline mb-2">Home Cleaners</h3>
                <p class="mb-0 opacity-75">Book deep cleaning from top pros</p>
            </div>
        </a>
        
        <?php
        $cats = [
            ['icon' => 'build', 'label' => 'Plumbers'],
            ['icon' => 'ac_unit', 'label' => 'AC Repair'],
            ['icon' => 'brush', 'label' => 'Painters'],
            ['icon' => 'carpenter', 'label' => 'Carpenters'],
            ['icon' => 'face', 'label' => 'Makeup'],
            ['icon' => 'photo_camera', 'label' => 'Photography']
        ];
        foreach($cats as $cat): ?>
        <a href="#" class="bento-card-small">
            <div class="icon-circle">
                <span class="material-symbols-outlined text-primary fs-2"><?= $cat['icon'] ?></span>
            </div>
            <span class="fw-bold text-dark fs-7"><?= $cat['label'] ?></span>
        </a>
        <?php endforeach; ?>
    </div>
</section>

<!-- Top Rated Professionals -->
<section class="py-5 my-5 container-xl pro-stack">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="font-headline display-6 fw-bold mb-0">Top-Rated <br class="d-sm-none"> Providers</h2>
        <a href="#" class="text-primary text-decoration-none fs-7">View All Pros →</a>
    </div>
    
    <div class="vstack gap-0">
        <!-- Pro Card 1 -->

        <?php for($topRated = 0; $topRated < 3; $topRated++): ?>
            <div class="overlapping-card p-4 p-md-5 border rounded-4">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA60_bMmosfkhQKFjpM6XTAmRFSjcLp0_nduCPZbRHn2OtecLB-JuK4OOwq6Zk6DsKUX0hHyCmJ1qXiq_iD972VKBzx-hbDKSy6xlWYirigz8arPxUiEwwRoB8-GS7wMZ_Sr4tLBoO2Jik0nGK8DQ2JQ2KQlyd1c53sXlMeK4uExYYPFfx8Zfr0b2ecGAS41DScG1UL_RCzzX7S96_ZoTPvBwUTt8AMNs9hQoLq92KrIINMNEPnQW7VKjePjPr0PpDOOYQP2a7pZ3tz" class="img-fluid rounded-5 shadow" alt="Pro">
                    </div>
                    <div class="col-md-6 pt-md-5">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge bg-primary-subtle text-primary fs-9 px-3 py-2 rounded-pill">TESTED AND TRUSTED</span>
                            <span class="fw-bold fs-7"><span class="material-symbols-outlined text-warning fill-1">star</span> 4.9</span>
                        </div>
                        <h3 class="font-headline h3 fw-bold mb-1">David Miller</h3>
                        <p class="text-primary fw-bold fs-6 mb-4">Master Electrician</p>
                        <p class="text-muted fs-6 mb-4">Specializing in smart home fintegration and emergency electrical repairs with over 15 years of certified experience.</p>
                        <hr>
                        <div class="row mb-4">
                            <div class="col-6">
                                <p class="small fw-bold fs-8 text-uppercase text-muted mb-1">Response</p>
                                <p class="fw-bold fs-6 mb-0">~ 15 mins</p>
                            </div>
                            <div class="col-6">
                                <p class="small fw-bold fs-8 text-uppercase text-muted mb-1">Reviews</p>
                                <p class="fw-bold fs-6 mb-0">124 verified</p>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg rounded-3 px-5 py-2 fs-7 w-md-100">Book Now</button>
                    </div>
                </div>
            </div>
        <?php endfor; ?>


        <!-- More pro cards would follow the same pattern... -->
    </div>
</section>

<!-- How it Works -->
<section class="py-5 bg-light mt-5">
    <div class="container-xl py-5">
        <div class="text-center mb-5">
            <h2 class="font-headline display-6 fw-bold mb-0">Three Simple Steps</h2>
            <p class="text-muted fs-7">From search to finish, we've got you covered.</p>
        </div>
        <div class="row g-4">
            <?php
            $steps = [
                ['icon' => 'search', 'title' => '1. Search & Compare', 'desc' => 'Enter your service and category. Filter by rating, price, and availability.'],
                ['icon' => 'calendar_today', 'title' => '2. Book Instantly', 'desc' => 'Select a convenient time slot and book directly through our secure platform.'],
                ['icon' => 'verified', 'title' => '3. Get it Done', 'desc' => 'A professional arrives and completes the job. Release payment when satisfied.']
            ];
            foreach($steps as $step): ?>
            <div class="col-md-4">
                <div class="card border-0 rounded-5 p-4 text-center h-100 shadow-md transition-up shadow-md-hover">
                    <div class="hero-gradient rounded-4 d-flex align-items-center justify-content-center mx-auto mb-4 shadow" style="width: 80px; height: 80px;">
                        <span class="material-symbols-outlined fs-1"><?= $step['icon'] ?></span>
                    </div>
                    <h3 class="h5 fw-bold font-headline mb-3"><?= $step['title'] ?></h3>
                    <p class="text-muted fs-6 mb-0"><?= $step['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Gallery Section (Simplified for Bootstrap) -->
<section class="py-5 bg-light-subtle">
    <div class="container-xl py-5">
    <h2 class="font-headline h1 fw-bold mb-5 tracking-tight">See the Quality</h2>
    <div class="row g-4">
        <!-- Gallery Item 1 -->
        <div class="col-md-6">
            <div class="gallery-card rounded-5 shadow-lg border-0">
                <div class="d-flex" style="height: 400px;">
                    <div class="flex-grow-1 position-relative">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCanAUrc35DN-XBTtihR2YDplXfVlJANhkqDKtAzdbPvqhJRn4ki-lP3XyZc4ZkVGzPlv82PNw6iyBI0N7fA_pO2CMT_yWcwtXqY5MOV4tSnnfLWzE5BdueThW0FpaWRba73q0EhX4_3i2CoB-WEpvqbK5CDi44zDnvvvV2zaI5Hc8EMedGPns1rNZAhOSAplqiPYfLby_VQTeGm0v9vyRKaLrx9eIP0BVWNGz24v-GUWFGfLIHlueiz0WIAgPNbtZvgukMkroGn_7E" class="w-100 h-100 object-fit-cover">
                        <span class="badge bg-dark position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill opacity-75">BEFORE</span>
                    </div>
                    <div class="flex-grow-1 position-relative">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKuaEFJJfkyq22ni9xok_pxCUAVCgmH2paOP0w1EpAWZA9rd1Np-gigQTRLh4qNMwieD5WOECwPGv_MWkvwBvikLGHRjprJjJL0r7xqfH0il8naxIVxWzq7SAgE9VjQqhZ47vYnhD_mw3nOlDjBgeYvZJOqkNl6Yd55dwiASQK-qL1EgUs2s_PtKfjXr9WhukZNE30BusD0PKnkXhVdyS5bfSN7Yp2j9d9-5ZxHG9VKYJioVVD2jkUWu_NUh3-4BW_LyHi5uBeTuWL" class="w-100 h-100 object-fit-cover">
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill">AFTER</span>
                    </div>
                </div>
                <div class="gallery-caption">
                    <h5 class="fw-bold mb-1">Full Kitchen Remodel — Marcus Chen</h5>
                    <p class="small text-muted mb-0">Completed in 14 days • 5-star service</p>
                </div>
            </div>
        </div>
        <!-- Gallery Item 2 -->
        <div class="col-md-6">
            <div class="gallery-card rounded-5 shadow-lg border-0">
                <div class="d-flex" style="height: 400px;">
                    <div class="flex-grow-1 position-relative">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3qS_O_0nw-wI9tYm5cj-rNygLt9WiK5uMYRCn8UBYN-qUHZvVqSIkV6Wu_jwzGmO2Y3FzWNrx_kgvH5AJ7rrkcbvS6IaHDUHX6Xc1G_EcHdmHqbZfazzq45LaSu77flHVFT_zLZjrMJKVZBQomW9BhnXG6vwf60SOgUT67u2_mqc2Kq501qdQrPcLCAjhCjIjaOTvhPUkyg9eIlSpHPoyk4i9lwtr679pRtm2ue2U6hLhFbUZ9IVmKB_1XmPRzGfg-p_Vj0wNLTeg" class="w-100 h-100 object-fit-cover">
                        <span class="badge bg-dark position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill opacity-75">BEFORE</span>
                    </div>
                    <div class="flex-grow-1 position-relative">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDm09QaHgpi0Fb_8-QIi2unDxoqmTaWjJT0WFkstkrrvsJ0O9NkdkDcSf5BPP1jwFmbnThM4DU3dUQs8fFPRjNyyoMJ2sXZ4RB1aSAgoVcRCpVUw9GrOUffxqnTW5Y0V52jSur8rA271qAkshfoxRgiuxEZwx9N37Zq00fo3V6YTkhBl8UjuRIjVJt3Qd1d1F_i2NIqKY7kWY7fEjhoukxy2QNMQSw9CUhzU9AFwNNKXgEspkqH12DP-OL7X2AEea7AIHoUqAk2Fevl" class="w-100 h-100 object-fit-cover">
                        <span class="badge bg-primary position-absolute top-0 end-0 m-3 px-3 py-2 rounded-pill">AFTER</span>
                    </div>
                </div>
                <div class="gallery-caption">
                    <h5 class="fw-bold mb-1">Garden Transformation — GreenThumb Pros</h5>
                    <p class="small text-muted mb-0">Completed in 2 days • Elite Partner</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Discount Banner -->
<section class="container-xl" style="margin-top: -50px;">
    <div class="hero-gradient p-5 rounded-5 shadow-lg d-flex flex-column flex-md-row justify-content-between align-items-center position-relative overflow-hidden">
        <div class="text-center text-md-start mb-4 mb-md-0">
            <span class="badge bg-white bg-opacity-25 mb-3 px-3 py-2 rounded-pill">LIMITED TIME OFFER</span>
            <h2 class="font-headline fs-2 display-5 fw-bold mb-3">Get 20% OFF your first booking</h2>
            <p class="fs-6 opacity-75">Use code <span class="bg-white bg-opacity-25 px-2 py-1 rounded font-monospace fw-bold">ARCHI20</span> at checkout. Valid for all services.</p>
        </div>
        <button class="btn fs-6 btn-light btn-lg rounded-3 px-5 py-3 fw-bold text-primary">Claim Discount Now</button>
    </div>
</section>

<!-- FAQ -->
<section class="py-5 container-xl" style="max-width: 800px;">
    <h2 class="font-headline h2 fw-bold text-center mb-5">Common Questions</h2>
    <div class="accordion accordion-flush" id="faqAccordion">
        <div class="accordion-item bg-white rounded-4 border shadow-sm mb-3">
            <h2 class="accordion-header">
                <button class="accordion-button fw-bold py-4 rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    How are professionals verified?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body text-muted">
                    Every professional undergoes a 3-step verification: background checks, license verification, and a skills assessment.
                </div>
            </div>
        </div>
        <!-- More FAQ items... -->
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-dark text-white text-center position-relative overflow-hidden">
    <div class="container py-5 z-1">
        <h2 class="font-headline display-4 fw-bold mb-4">Grow your business with Architecto</h2>
        <p class="fs-5 text-secondary-emphasis mb-5 mx-auto" style="max-width: 600px;">Join thousands of professionals finding new customers every day. No lead fees. Just quality bookings.</p>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            <button class="btn btn-primary btn-lg rounded-4 px-5 py-3 fw-bold">Join as a Professional</button>
            <button class="btn btn-outline-light btn-lg rounded-4 px-5 py-3 fw-bold">How it works for Pros</button>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>