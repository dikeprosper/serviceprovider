<?php include './fileasset/header.php'; ?>

<!-- Hero Section -->
<section class="hero <?=$section_padding ?>">

    <div class="container-xl">

        <div class="hero-content px-2 px-sm-4 px-md-5 py-5 overflow-hidden">
            
            <div class="col-12 col-lg-8 py-3 mt-3 mb-5 mb-md-0" id="hire">

                <h2 class="font-headline display-3 tracking-tight text-white mb-3">
                    <span class="text-primary-light display-5"> Port Harcourt's best </span>  <br> Tailors, all in one place
                </h2>
                <p class="mb-5 fs-6-plus text-white w-md-100" style="width: 85%;">
                    100% money back guarantee if your job isn't done.
                    Browse their work, read reviews from real customers, and pay safely.
                </p>

                <div class="switchRole rounded-5 mb-4 d-flex w-md-100">
                    <button class="w-50 btn btn-outline-light btn-sm py-1 rounded-5 text-light">Hire</button>
                    <button class="w-50 btn text-light btn-sm py-1 rounded-5">Get Hire</button>
                </div>

                <div class="bg-white p-1 rounded-4 rounded-md-5 shadow-lg d-flex flex-column flex-md-row gap-0" id="searchBar">
                    <div class="flex-grow-1 d-flex align-items-center px-3 py-1 border-end">
                        <span class="material-symbols-outlined text-primary me-2">search</span>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="What service do you need?">
                    </div>
                    <div class="flex-grow-1 d-flex align-items-center px-3 py-1">
                        <span class="material-symbols-outlined text-primary me-2 icon-fill">location_on</span>
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Port harcourt" style="width: 130px;">
                    </div>
                    <button class="hero-gradient px-4 rounded-5 fs-6">Search</button>
                </div>
                <div class="mt-4 d-flex gap-2">

                    <div class="d-flex flex-wrap gap-2">

                        <a href="#" class="btn btn-outline-white fs-7">Bobo gown</a>
                        <a href="#" class="btn btn-outline-white fs-7">Caftan</a>
                        <a href="#" class="btn btn-outline-white fs-7">Two piece</a>
                    </div>
                </div>
            </div>
            <div class="col-12 inActive offset-6 py-3 mt-3 text-center" id="getHired">

                <h2 class="font-headline display-2 fw-bolder tracking-tight text-white mb-3">
                    <span class="text-primary-light display-6"> Are you a tailor in </span> <br> Port Harcourt?
                </h2>

                <p class="mb-5 fs-6-plus text-white w-md-100 mx-auto" style="width: 350px;">
                    Get paid for your skills and discovered by hundreds of local clients.
                </p>

                <button class="btn btn-primary rounded-5 px-5 py-2 fs-6 mb-5 mx-auto" style="width: 200px;">Get started</button>

                <div class="switchRole rounded-5 d-flex w-md-100 mx-auto mt-3">
                    <button class="w-50 btn btn-sm py-1 rounded-5 text-light">Hire</button>
                    <button class="w-50 btn text-light btn-sm py-1 rounded-5 btn-outline-light">Get Hire</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features slidder -->
<section class="feature-slidder py-5 container-xl bg-white">

    <div class="py-5 container-xl">
    </div>
</section>

<!-- Popular Categories (Bento Grid) -->
<section class="Categories py-5 container-xl">

    <div class="py-5 container-xl">

        <div class="bento-grid <?=$section_padding ?>">
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
            <a href="#" class="bento-card-small site-radius">
                <div class="icon-circle">
                    <span class="material-symbols-outlined text-primary fs-2"><?= $cat['icon'] ?></span>
                </div>
                <span class="fw-bold text-dark fs-7"><?= $cat['label'] ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Top Rated Professionals -->
<section class="py-5 my-5 container-xl pro-stack">

    <div class="<?=$section_padding ?>">

        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="<?=$section_title; ?>">Top-Rated Providers</h2>
            <a href="#" class="d-sm-blocktext-primary text-decoration-none fs-7">View All Pros →</a>
        </div>
        
        <div class="row">
            <!-- Pro Card 1 -->

            <?php for($topRated = 0; $topRated < 3; $topRated++): ?>
                <div class="col-md-6 mb-4">

                    <div class="overlapping-card p-3 p-md-4 border site-radius">
                        <div class="row g-5 align-items-center <?php if($topRated == 1): echo 'flex-row-reverse'; endif; ?>">
                            <div class="col-lg-6">
                                <div class="img rounded-3" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA60_bMmosfkhQKFjpM6XTAmRFSjcLp0_nduCPZbRHn2OtecLB-JuK4OOwq6Zk6DsKUX0hHyCmJ1qXiq_iD972VKBzx-hbDKSy6xlWYirigz8arPxUiEwwRoB8-GS7wMZ_Sr4tLBoO2Jik0nGK8DQ2JQ2KQlyd1c53sXlMeK4uExYYPFfx8Zfr0b2ecGAS41DScG1UL_RCzzX7S96_ZoTPvBwUTt8AMNs9hQoLq92KrIINMNEPnQW7VKjePjPr0PpDOOYQP2a7pZ3tz');"></div>
                            </div>
                            <div class="col-lg-6">

                                <h3 class="font-headline h4 fw-bold mb-1">David Miller</h3>
                                <p class="text-primary fs-7 mb-2">Master Electrician</p>
                                <p class="<?=$body_text?> mb-4">Specializing in smart home fintegration and emergency electrical repairs...</p>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="small fw-bold fs-8 text-uppercase text-muted mb-1">Response</p>
                                        <p class="fw-bold fs-9 mb-0">~ 15 mins</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="small fw-bold fs-8 text-uppercase text-muted mb-1">Reviews</p>
                                        <p class="fw-bold fs-9 mb-0">124 verified</p>
                                    </div>
                                </div>
                                <button class="btn btn-primary rounded-2 px-5 py-2 fs-7 fw-bold w-md-100">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>


            <!-- More pro cards would follow the same pattern... -->
        </div>
    </div>
</section>

<?php
    $steps = [
        [
            'num' => '1',
            'title' => 'Search Services',
            'desc' => 'Tell us what you need. From emergency repairs to seasonal maintenance, we cover it all.'
        ],
        [
            'num' => '2',
            'title' => 'Select Your Pro',
            'desc' => 'Compare profiles, read verified reviews, and check transparent pricing in real-time.'
        ],
        [
            'num' => '3',
            'title' => 'Book & Relax',
            'desc' => 'Secure your slot instantly. No phone tag, no stress. Pay safely through the platform.'
        ]
    ];

    $reviews = [
        [
            'name' => 'Sarah J.',
            'role' => 'Homeowner in Austin',
            'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD54v7OddbKYdAKyf0LtkPRueyZf7Z8IsekzymdMo3h4IpVKS2d2Ia1MA-gFEvQm68wvYUrYkuwgo8KJTzJZ39qPPMZm7s8Pw_tz9vD1At5DKbXk7pW2sxSxbyF_qhSZmWZSXxFoUn8jyGROrWNJOAwW5R8WjnUs1XPYRUzFrrq8s9oA3ikPPZrWGcbUZrGCmpK9TC5sJogqGkeVFQD84DiR1xXSNSPKFitKmupdPsDhf3qBmm48wtOMxuwh-dv-f4nQWVPDcd4iX5O',
            'text' => 'ProMarket saved my weekend. Finding a reliable plumber on a Friday night used to be impossible. I had David at my door in under an hour.'
        ],
        [
            'name' => 'Michael R.',
            'role' => 'Property Manager',
            'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA2DtCOkFruFn83uw7qGlQbcH8GodExlxJdhDwwD0-9NAuVlghaA7kI6tR8WsdlxZHOOuVf_O4tyzgdg5-RHPVHiMjt4DAaDw81L3jkzsgN8Hc9mbGPkYttM6w8_kZjz2ukN3Hcaf1iBsYBrG62DeI143zZgH3VfuyZe58KgJQk0ZHrTrr7vlPMSl6mui6eWGJ690sU1sn0klZfS5cLWfMSSdFzREkAGBfkTQXNaU0yBuYz7QhdW82GwV190OOIRp6uVUxoU6uSxgJj',
            'text' => 'As a property manager, I need pros who show up and do the work right. The vetting process on ProMarket is the best I\'ve seen in the industry.'
        ]
    ];
?>

<!-- How it Works -->
<section class="py-5 bg-light mt-5 <?=$section_padding ?>">
    <div class="container-xl py-5">
        <div class="text-center mb-5">
            <h2 class="<?=$section_title; ?>">Three Simple Steps</h2>
            <p class="<?=$body_text?>">From search to finish, we've got you covered.</p>
        </div>
        <div class='row g-4'>
            <?php foreach($steps as $i=>$step): ?>
                <div class='col-md-6 col-lg-4 '>
                    <div class='cardx site-radius border'>
                        <?php if($i==0): ?>
                        <div class='soft rounded-3 p-3 border'>
                            <div class='bg-primary opacity1 rounded mb-2' style='height:12px;width:50%'></div>
                            <div class='bg-primary opacity2 rounded mb-2' style='height:12px'></div>
                            <div class='bg-primary opacity2 rounded mb-4' style='height:12px;width:75%'></div>
                            <div class='row g-2 mt-4'>
                                <div class='col-6'>
                                    <div class='bg-white rounded p-4 text-center border'>
                                        <span class='opacity3 material-symbols-outlined fs-1 text-primary'>cleaning_services</span>
                                    </div>
                                </div>
                                <div class='col-6'>
                                    <div class='bg-white rounded p-4 text-center border'>
                                        <span class='opacity3 material-symbols-outlined fs-1 text-primary'>plumbing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php elseif($i==1): ?>
                        <div class='bg-white rounded-4 shadow p-3 mx-auto' style='max-width:240px;aspect-ratio:4/3'>
                            <div class='d-flex align-items-center gap-2 mb-3'>
                                <div class='rounded-circle' style='width:40px;height:40px;background:#d5e3fd'></div>
                                <div class='flex-grow-1'>
                                    <div class='bg-dark rounded mb-1' style='height:8px;width:70px'></div>
                                    <div class='bg-secondary-subtle rounded' style='height:8px;width:45px'></div>
                                </div>
                                <small class='fw-bold text-primary'>$$$</small>
                            </div>
                            <hr>
                            <div class='d-flex align-items-center gap-2 mb-3'>
                                <div class='rounded-circle bg-primary' style='width:40px;height:40px'></div>
                                <div class='flex-grow-1'>
                                    <div class='bg-dark rounded mb-1' style='height:8px;width:90px'></div>
                                    <div class='bg-secondary-subtle rounded' style='height:8px;width:40px'></div>
                                </div>
                                <small class='fw-bold text-primary'>$$</small>
                            </div>
                            <button class='btn btn-primary btn-sm w-100 rounded-2'>Select Pro</button>
                        </div>
                        
                        <?php else: ?>

                           <div class='bg-primary text-white rounded-3 d-flex flex-column justify-content-center align-items-center text-center p-4'>
                                <span class='material-symbols-outlined' style='font-size:60px'>event_available</span>
                                <p class='fw-bold fs-5 mb-1 mt-2 mt-1'>Booking Confirmed!</p>
                                <small>Friday, Oct 24 at 10:00 AM</small>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class='d-flex gap-3 mt-4'>
                        <div class='num px-3'><?= $step['num'] ?></div>
                        <div>
                            <h4 class='headline fw-bold fs-5'><?= $step['title'] ?></h4>
                            <p class='<?=$body_text?> mb-0'><?= $step['desc'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Gallery Section (Simplified for Bootstrap) -->
<section class="py-5 bg-light-subtle <?=$section_padding ?>">
    <div class="container-xl py-5">

    <div class="mb-5">

        <h2 class="<?=$section_title; ?>">See the Quality</h2>
        <p class='<?=$body_text?>' style='max-width:450px'>Read about the experiences of homeowners and property managers who trust ProMarket.</p>
    </div>

    <div class="row g-4">
        <!-- Gallery Item 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="gallery-card rounded-5 shadow-lg border-0">
                <div class="d-flex" style="height: 320px;">
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
                    <h5 class="fw-bold mb-1 fs-6">Full Kitchen Remodel — Marcus Chen</h5>
                    <p class="<?=$body_text?> mb-0">Completed in 14 days • 5-star service</p>
                </div>
            </div>
        </div>
        <!-- Gallery Item 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="gallery-card rounded-5 shadow-lg border-0">
                <div class="d-flex" style="height: 320px;">
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
                    <h5 class="fw-bold mb-1 fs-6">Garden Transformation — GreenThumb Pros</h5>
                    <p class="<?=$body_text?> mb-0">Completed in 2 days • Elite Partner</p>
                </div>
            </div>
        </div>
        <!-- Gallery Item 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="gallery-card rounded-5 shadow-lg border-0">
                <div class="d-flex" style="height: 320px;">
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
                    <h5 class="fw-bold mb-1 fs-6">Garden Transformation — GreenThumb Pros</h5>
                    <p class="<?=$body_text?> mb-0">Completed in 2 days • Elite Partner</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Reviews Section-->
<section class="container-xl py-5 bg-white">
    <div class='py-5 <?=$section_margin ?>'>
        <div class='text-center mb-5'>
            <h2 class='<?=$section_title; ?>'>Customer Testimonials</h2>
            <p class='<?=$body_text?> mx-auto' style='max-width:450px'>Read about the experiences of homeowners and property managers who trust ProMarket.</p>
        </div>
        <div class='row g-4'>
            <?php foreach($reviews as $r): ?>
                <div class='col-md-6 col-lg-4'>
                    <div class='review site-radius'>
                        <div class='text-warning mb-4 fs-4'>★ ★ ★ ★ ★</div>
                        <p class='fs-6 fst-italic'>“<?= $r['text'] ?>”</p>
                        <div class='d-flex align-items-center gap-3 mt-4'>
                            <img src='<?= $r['img'] ?>' style='width:48px;height:48px;border-radius:50%;object-fit:cover'>
                            <div>
                                <h6 class='fw-bold mb-0'><?= $r['name'] ?></h6>
                                <small class="text-uppercase <?=$body_text_sm ?>"><?= $r['role'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class='col-md-6 col-lg-4'><div class='cta d-flex flex-column justify-content-between'>
                <div>
                    <h3 class='font-headline fw-bold'>Are you a professional?</h3>
                    <p class='opacity-75 fs-6'>Join 50,000+ local experts and grow your business with a platform that puts professionals first.</p>
                </div>
                <button class='btn fs-7 btn-light btn-lg rounded-3 px-5 py-3 fw-bold text-primary'>Become a Provider</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Discount Banner -->
<section class="container-xl pt-5 mt-5">
    <div class="<?=$section_margin ?> hero-gradient p-5 site-radius shadow-lg d-flex flex-column flex-md-row justify-content-between align-items-center position-relative">
        <div class="text-center text-md-start mb-4 mb-md-0">
            <span class="badge bg-white bg-opacity-25 mb-3 fs-9 px-3 pt-2 pb-1 rounded-pill">LIMITED TIME OFFER</span>
            <h2 class="font-headline fs-3 display-5 fw-bold mb-3">Get 20% OFF your first booking</h2>
            <p class="fs-6 opacity-75">Use code <span class="bg-white bg-opacity-25 px-2 py-1 rounded font-monospace fw-bold">ARCHI20</span> at checkout. Valid for all services.</p>
        </div>
        <button class="btn fs-7 btn-light btn-lg rounded-3 px-5 py-3 fw-bold text-primary">Claim Discount Now</button>
    </div>
</section>

<!-- FAQ -->
<section class="<?=$section_padding ?>">

    <div class="container-xl d-flex flex-column align-items-center">

        <div class="my-5 <?=$section_margin ?> w-100" style="max-width: 800px;">
            <h2 class="<?=$section_title; ?> text-center mb-5">Common Questions</h2>
            <div class="accordion accordion-flush" id="faqAccordion">
                <div class="accordion-item bg-white rounded-4 border shadow-sm mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold py-4 rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            How are professionals verified?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body <?=$body_text?>">
                            Every professional undergoes a 3-step verification: background checks, license verification, and a skills assessment.
                        </div>
                    </div>
                </div>
                <!-- More FAQ items... -->
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-dark text-white text-center position-relative <?=$section_padding ?>">
    <div class="container py-5 z-1">
        <h2 class="<?=$section_title; ?> mb-4">Grow your business with Architecto</h2>
        <p class="fs-6 text-secondary-emphasis mb-5 mx-auto" style="max-width: 600px;">Join thousands of professionals finding new customers every day. No lead fees. Just quality bookings.</p>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            <button class="btn btn-primary btn-lg rounded-3 px-5 py-3 fw-bold fs-7">Join as a Professional</button>
            <button class="btn btn-outline-light btn-lg rounded-3 px-5 py-3 fw-bold fs-7">How it works for Pros</button>
        </div>
    </div>
</section>


<?php include './fileasset/footer.php'; ?>