<?php include './fileasset/header.php';

// Reviews

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

// How It Works

$steps = [
    [
        "title"   => "Post a job for free",
        "desc"    => "Tell us what you need. Provide a few detail.",
        "btn"     => "Get Started",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuCv8QS1h9v7fP6D7RzeQs6rdcRypDVKgHDYJDKdc_ojn0k3KbM9Wp5YC6zRqTzeQzorZ0ujR8bxKZB3daF44h8MphqiTQUqQlVkkEqHKNYQ0YGL8esSR6ZreNcDP5NvKtwx_QlS_4v-D8rGBe8MUyfV3dnTvsiYOXX_O4MXiJvxTj_Ji0j9ot-tPCpRh3cjXDcNgrACYCfBWg4Kr0zRJqNGEkqJo2MbF2RUIX1i_fsjRqeSLSfofoU08iNbDSRkRBeZOsaouPtFJ3YV",
        "alt"     => "Post a job",
    ],
    [
        "title"   => "Get proposals and hire",
        "desc"    => "Top-rated pros will send you quotes. Review their.",
        "btn"     => "Find Pros",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuA60_bMmosfkhQKFjpM6XTAmRFSjcLp0_nduCPZbRHn2OtecLB-JuK4OOwq6Zk6DsKUX0hHyCmJ1qXiq_iD972VKBzx-hbDKSy6xlWYirigz8arPxUiEwwRoB8-GS7wMZ_Sr4tLBoO2Jik0nGK8DQ2JQ2KQlyd1c53sXlMeK4uExYYPFfx8Zfr0b2ecGAS41DScG1UL_RCzzX7S96_ZoTPvBwUTt8AMNs9hQoLq92KrIINMNEPnQW7VKjePjPr0PpDOOYQP2a7pZ3tz",
        "alt"     => "Hire experts",
    ],
    [
        "title"   => "Pay when work is done",
        "desc"    => "Secure payments released only when you're 100%.",
        "btn"     => "Learn More",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuAGtwMfAUW2SJ5HPcxpYqdSDF_3q6yJ0HYmkfNQbTASFFYh-C-Fo194mKbAGDeo1zESshi6_WBJkIqzYPyYZtu-8XcPSh_ww0lk8EFp3ehE2e59a8vAzfN7bUbXGtPfZ7qUPuDxQbuw9nPhAJR3116CRFlBg8e0S52X2vrBcCfuIIXMDihlKo9qScqa_JSdFvhrU7d-7WuED0-OxkgxOVWZvP1fsJdmcR2u6f9l5LPQnm2DupT4NY_wScdoQAt3OfpXsn6piILnH2PB",
        "alt"     => "Pay securely",
    ],
];

$specials = [
    [
        "title"   => "24 Hours delivery",
        "desc"    => "Have your cloth ready to wear in less than 2 days.",
        "btn"     => "Browse Tailors",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuCv8QS1h9v7fP6D7RzeQs6rdcRypDVKgHDYJDKdc_ojn0k3KbM9Wp5YC6zRqTzeQzorZ0ujR8bxKZB3daF44h8MphqiTQUqQlVkkEqHKNYQ0YGL8esSR6ZreNcDP5NvKtwx_QlS_4v-D8rGBe8MUyfV3dnTvsiYOXX_O4MXiJvxTj_Ji0j9ot-tPCpRh3cjXDcNgrACYCfBWg4Kr0zRJqNGEkqJo2MbF2RUIX1i_fsjRqeSLSfofoU08iNbDSRkRBeZOsaouPtFJ3YV",
        "alt"     => "24 hours delivery",
    ],
    [
        "title"   => "Discount deals and special offers",
        "desc"    => "See tailors offering discounts and giveaway.",
        "btn"     => "View Promo",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuA60_bMmosfkhQKFjpM6XTAmRFSjcLp0_nduCPZbRHn2OtecLB-JuK4OOwq6Zk6DsKUX0hHyCmJ1qXiq_iD972VKBzx-hbDKSy6xlWYirigz8arPxUiEwwRoB8-GS7wMZ_Sr4tLBoO2Jik0nGK8DQ2JQ2KQlyd1c53sXlMeK4uExYYPFfx8Zfr0b2ecGAS41DScG1UL_RCzzX7S96_ZoTPvBwUTt8AMNs9hQoLq92KrIINMNEPnQW7VKjePjPr0PpDOOYQP2a7pZ3tz",
        "alt"     => "Discounts and promo",
    ],
    [
        "title"   => "Bulk oders and arrangement",
        "desc"    => "Get large number jobs done fast and easy.",
        "btn"     => "Learn More",
        "img"     => "https://lh3.googleusercontent.com/aida-public/AB6AXuAGtwMfAUW2SJ5HPcxpYqdSDF_3q6yJ0HYmkfNQbTASFFYh-C-Fo194mKbAGDeo1zESshi6_WBJkIqzYPyYZtu-8XcPSh_ww0lk8EFp3ehE2e59a8vAzfN7bUbXGtPfZ7qUPuDxQbuw9nPhAJR3116CRFlBg8e0S52X2vrBcCfuIIXMDihlKo9qScqa_JSdFvhrU7d-7WuED0-OxkgxOVWZvP1fsJdmcR2u6f9l5LPQnm2DupT4NY_wScdoQAt3OfpXsn6piILnH2PB",
        "alt"     => "bulk order",
    ],
];

// Banners

$imgs = [
    "img1" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCv8QS1h9v7fP6D7RzeQs6rdcRypDVKgHDYJDKdc_ojn0k3KbM9Wp5YC6zRqTzeQzorZ0ujR8bxKZB3daF44h8MphqiTQUqQlVkkEqHKNYQ0YGL8esSR6ZreNcDP5NvKtwx_QlS_4v-D8rGBe8MUyfV3dnTvsiYOXX_O4MXiJvxTj_Ji0j9ot-tPCpRh3cjXDcNgrACYCfBWg4Kr0zRJqNGEkqJo2MbF2RUIX1i_fsjRqeSLSfofoU08iNbDSRkRBeZOsaouPtFJ3YV",
    "img2" => "https://lh3.googleusercontent.com/aida-public/AB6AXuA60_bMmosfkhQKFjpM6XTAmRFSjcLp0_nduCPZbRHn2OtecLB-JuK4OOwq6Zk6DsKUX0hHyCmJ1qXiq_iD972VKBzx-hbDKSy6xlWYirigz8arPxUiEwwRoB8-GS7wMZ_Sr4tLBoO2Jik0nGK8DQ2JQ2KQlyd1c53sXlMeK4uExYYPFfx8Zfr0b2ecGAS41DScG1UL_RCzzX7S96_ZoTPvBwUTt8AMNs9hQoLq92KrIINMNEPnQW7VKjePjPr0PpDOOYQP2a7pZ3tz",
    "img3" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAGtwMfAUW2SJ5HPcxpYqdSDF_3q6yJ0HYmkfNQbTASFFYh-C-Fo194mKbAGDeo1zESshi6_WBJkIqzYPyYZtu-8XcPSh_ww0lk8EFp3ehE2e59a8vAzfN7bUbXGtPfZ7qUPuDxQbuw9nPhAJR3116CRFlBg8e0S52X2vrBcCfuIIXMDihlKo9qScqa_JSdFvhrU7d-7WuED0-OxkgxOVWZvP1fsJdmcR2u6f9l5LPQnm2DupT4NY_wScdoQAt3OfpXsn6piILnH2PB",
];

$carousel_primary = [
    ["src" => $imgs["img1"], "alt" => "Project 1"],
    ["src" => $imgs["img2"], "alt" => "Project 2"],
    ["src" => $imgs["img3"], "alt" => "Project 3"],
];

// Second Banner

$stats = [
    [
        'icon'       => 'verified',
        'icon_class' => 'icon-box-primary',
        'text_class' => 'icon-primary',
        'value'      => '50k+',
        'label'      => 'Verified Pros',
        'size'       => 'lg',
        'pos'        => 'card-top-right',
    ],
    [
        'icon'       => 'lock',
        'icon_class' => 'icon-box-green',
        'text_class' => 'icon-green',
        'value'      => 'Secure Escrow',
        'label'      => 'Payment Protection',
        'size'       => 'md',
        'pos'        => 'card-mid-left',
    ],
    [
        'icon'       => 'support_agent',
        'icon_class' => 'icon-box-blue',
        'text_class' => 'icon-blue',
        'value'      => '24/7 Support',
        'label'      => 'Dedicated Help',
        'size'       => 'md',
        'pos'        => 'card-bottom-right',
    ],
];

$success_rate = '99.9%';

?>

<!-- Hero Section -->
<section class="hero <?=$section_padding ?>">

    <div class="container-xl py-3 mb-3 py-md-0 mb-md-0">

        <div class="hero-content px-2 px-sm-4 px-md-5 overflow-hidden">
            
            <div class="col-12 col-lg-8" id="hire">

                <h2 class="font-headline display-4 tracking-tight text-white mb-3">
                    <span class="text-primary-light display-5"> Port Harcourt's best </span>  <br> Tailors, all in one place
                </h2>
                <p class="mb-5 fs-6-plus text-white w-md-100" style="width: 85%;">
                    Browse their work, read reviews from real customers, and pay safely.
                    100% money back guarantee if your job isn't done.
                </p>

                <div class="switchRole rounded-5 mb-4 d-flex w-md-100">
                    <button class="w-50 btn btn-outline-light btn-sm py-2 rounded-5 text-light">Hire</button>
                    <button class="w-50 btn text-light btn-sm py-2 rounded-5">Get Hire</button>
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
                    <button class="hero-gradient px-4 rounded-5 fs-6 py-1">Search</button>
                </div>
                <div class="mt-4 d-flex gap-2">

                    <div class="d-flex flex-wrap gap-2">

                        <a href="#" class="btn btn-outline-white fs-7">Bobo gown</a>
                        <a href="#" class="btn btn-outline-white fs-7">Caftan</a>
                        <a href="#" class="btn btn-outline-white fs-7">Two piece</a>
                    </div>
                </div>
            </div>
            <div class="col-12 inActive offset-6 py-5 my-5 text-center" id="getHired">

                <h2 class="font-headline display-2 fw-bolder tracking-tight text-white mb-3">
                    <span class="text-primary-light display-6"> Are you a tailor in </span> <br> Port Harcourt?
                </h2>

                <p class="mb-5 fs-6-plus text-white w-md-100 mx-auto" style="width: 350px;">
                    Get paid for your skills and discovered by hundreds of local clients.
                </p>

                <button class="btn btn-primary rounded-5 px-5 py-2 fs-6 mb-5 mx-auto" style="width: 200px;">Get started</button>

                <div class="switchRole rounded-5 d-flex w-md-100 mx-auto mt-3">
                    <button class="w-50 btn btn-sm py-2 rounded-5 text-light">Hire</button>
                    <button class="w-50 btn text-light btn-sm py-2 rounded-5 btn-outline-light">Get Hire</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features slidder -->
<section class="features py-3 bg-white <?=$section_padding ?>">

    <div class="container-xl feature-slider py-3 py-md-5">

        <div class="edge left"></div>
        <div class="edge right"></div>
        <div class="slider-track" id="track">
        
        </div>
    </div>
</section>

<!-- HOW IT WORKS SECTION -->
<section class="pt-4 pb-5 <?=$section_padding ?>">
    <div class="container-xl pb-md-2">
        <!-- Header row -->
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-between mb-5 gap-4">
            <h2 class="<?=$section_title; ?>">How it works</h2>
            <div class="toggle-pill">
                <button class="toggle-btn active" id="btn-hiring">For hiring</button>
                <button class="toggle-btn" id="btn-finding">For finding work</button>
            </div>
        </div>

        <!-- Slider container -->
        <div class="position-relative" id="slider-wrapper">
            <div class="steps-slider" id="slider">

                <?php foreach ($steps as $i => $step): ?>
                <div class="step-card d-flex flex-column">
                    <!-- Image -->
                    <div class="card-img-wrap site-radius">
                        <img
                            class="h-100 w-100 object-fit-cover"
                            src="<?php echo htmlspecialchars($step['img']); ?>"
                            alt="<?php echo htmlspecialchars($step['alt']); ?>"
                            loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                        />
                    </div>

                    <!-- Title + mobile body -->
                    <div class="d-flex flex-column flex-grow-1">
                        <h3 class="h5 headline-light fw-bolder mb-2"><?php echo htmlspecialchars($step['title']); ?></h3>
                        <div class="card-mobile-body">
                            <p class="mb-2 <?=$body_text; ?>"><?php echo htmlspecialchars($step['desc']); ?></p>
                            <button class="btn btn-primary btn-sm w-100 rounded-2 fs-7"><?php echo htmlspecialchars($step['btn']); ?></button>
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

    </div>
</section>

<!-- BANNERS -->
<section class="container-xl py-5 overflow-hidden" id="banners">
    
    <!-- SAMPLING EXPERTS BANNER (light bg) -->
    <div class="pb-4" id="section-primary">
        <div class="<?=$section_padding ?>">
            <div class="banner-wrap site-radius">
    
                <div class="row flex-column-reverse flex-lg-row">
    
                    <!-- Banner Heading -->
                    <div class="banner-content col-lg-6">
                        <h2 class="display-6 <?=$section_title; ?>"> Jobs done by experts</h2>
                        <p style="color:var(--on-surface-variant);font-size:1.1rem;margin-bottom:2.5rem;">From high-end residential renovations to critical electrical infrastructure, see the caliber of work our verified professionals deliver daily.</p>
                        <button class="btn btn-primary rounded-2 px-5 py-2 fs-6 w-100 w-md-75 w-lg-75 w-xl-50">Explore Portfolio</button>
                    </div>
        
                    <!-- Sample Jobs Slider -->
                    <div class="carousel-outer carousel-primary col-lg-6" id="carousel-primary-outer">
                        <div class="carousel-track-internal p-0 m-0 w-100" id="carousel-primary">
                            <?php foreach ($carousel_primary as $item): ?>
                            <div class="c-item p-0 m-0 w-100">
                                <img src="<?php echo htmlspecialchars($item['src']); ?>" alt="<?php echo htmlspecialchars($item['alt']); ?>"/>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- UNDECIDED BANNER (Primary bg) -->
    <div class="pb-2" id="section-secondary">
        <div class="<?=$section_padding ?>">
            <div class="banner-wrap site-radius overflow-hidden position-relative px-2 py-2">
    
                <!-- Overlay layers -->
                <div class="banner__grid" aria-hidden="true"></div>
                <div class="banner__gradient" aria-hidden="true"></div> 

                <div class="row flex-column-reverse align-items-center flex-lg-row position-relative" style="z-index: 2;">
    
                    <!-- Banner Heading -->
                    <div class="banner-content col-lg-6">
                        <div class="font-headline fs-7 btn btn-outline-light rounded-5 px-4 py-0 mb-4">
                            Unmatched Professional Standards
                        </div>
                        <h2 class="display-6 <?=$section_title; ?> text-white mb-3 fw-lighter"> Building Trust Through <span class="font-headline">Technical Precision</span> </h2>
                        <p class="text-white fs-6-plus mb-4"> Every professional on our platform undergoes a rigorous multi-step vetting process. We guarantee not just quality, but the absolute peace of mind that comes with hiring the best in the business. </p>
                        <a class="btn btn-light rounded-2 px-5 py-2 fs-6 w-100 w-md-75 w-lg-75 w-xl-50">Get Started</a>
                    </div>
        
                    <!-- Sample Jobs Slider -->
                    <div class="col-12 col-lg-6">
                        <div class="visual-col">

                            <!-- Spinning rings -->
                            <div class="ring-outer" aria-hidden="true">
                                <div class="ring-inner"></div>
                            </div>

                            <?php foreach ($stats as $stat): ?>
                            <!-- Float card: <?= htmlspecialchars($stat['value']) ?> -->
                            <div class="float-card <?= htmlspecialchars($stat['pos']) ?>">
                                <div class="d-flex align-items-center gap-3">
                                <div class="icon-box <?= htmlspecialchars($stat['icon_class']) ?>">
                                    <span class="material-symbols-outlined <?= htmlspecialchars($stat['text_class']) ?>">
                                    <?= htmlspecialchars($stat['icon']) ?>
                                    </span>
                                </div>
                                <div>
                                    <p class="font-headline <?= $stat['size'] === 'lg' ? 'card-value-lg' : 'card-value-md' ?> mb-0">
                                    <?= htmlspecialchars($stat['value']) ?>
                                    </p>
                                    <p class="card-label mb-0"><?= htmlspecialchars($stat['label']) ?></p>
                                </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <!-- Live success-rate pill -->
                            <div class="live-pill" role="status" aria-live="polite">
                                <div class="ping-wrap" aria-hidden="true">
                                <span class="ping-ring"></span>
                                <span class="ping-dot"></span>
                                </div>
                                <p class="pill-text mb-0">
                                <?= htmlspecialchars($success_rate) ?>
                                <span class="pill-muted">Success Rate</span>
                                </p>
                            </div>

                            <!-- Crosshair decorations -->
                            <div class="cross-h" aria-hidden="true"></div>
                            <div class="cross-v" aria-hidden="true"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EXTRA SPECIAL -->
<section class="py-5 <?=$section_padding ?>">
    <div class="container-xl pb-md-2">
        <!-- Header row -->
        <div class="mb-5 gap-4">
            <h2 class="<?=$section_title; ?>"> Extra Special </h2>
            <p class='<?=$body_text?>' style='max-width:450px'>Read about the experiences of homeowners and property managers who trust ProMarket.</p>
        </div>

        <!-- Slider container -->
        <div>
            <div class="row g-5">

                <?php foreach ($specials as $i => $special): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex flex-column">
                        <!-- Image -->
                        <div class="card-img-wrap site-radius">
                            <img
                                class="h-100 w-100 object-fit-cover"
                                src="<?php echo htmlspecialchars($special['img']); ?>"
                                alt="<?php echo htmlspecialchars($special['alt']); ?>"
                                loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                            />
                        </div>

                        <!-- Title + mobile body -->
                        <div class="d-flex flex-column flex-grow-1">
                            <h3 class="h5 headline-light fw-bolder mb-2"><?php echo htmlspecialchars($special['title']); ?></h3>
                            <div class="card-mobile-body">
                                <p class="mb-2 <?=$body_text; ?>"><?php echo htmlspecialchars($special['desc']); ?></p>
                                <button class="btn btn-primary btn-sm w-100 rounded-2 fs-7"><?php echo htmlspecialchars($special['btn']); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>

<!-- REFERRAL PROGRAM -->
<section class="py-5">
    <div class="pb-md-2">

        <div class="text-center mb-5 mx-auto px-3" style="max-width:48rem;">
            <h2 class="<?=$section_title; ?>">Join our Referral Program</h2>
            <p class="<?=$body_text ?>">Earn rewards by inviting friends and professionals to the ProMarket community. Whether you're a service provider or a client, there's a place for you to grow with us.</p>
        </div>
    
        <div class="video-wrap d-flex align-items-center justify-content-center">
            <img class="thumb" src="<?php echo htmlspecialchars($imgs['img1']); ?>" alt="Referral Program Video Thumbnail"/>
            <div class="play-btn">
                <span class="material-symbols-outlined fill-1">play_arrow</span>
            </div>
            <div class="video-caption">
                <p style="font-weight:700;font-size:1.4rem;margin:0;">Watch our referral guide</p>
                <p style="color:rgba(255,255,255,.7);font-size:.95rem;margin:0;">2:45 &bull; High Fidelity</p>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="py-5 container-xl bg-white">
    <div class='<?=$section_margin ?> py-md-2'>
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
<section class="container-xl py-5">
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
<section class="<?=$section_padding ?> py-5">

    <div class="container-xl d-flex flex-column align-items-center pb-md-2">

        <div class="<?=$section_margin ?> w-100" style="max-width: 800px;">
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
    <div class="container pb-2 z-1">
        <h2 class="<?=$section_title; ?> mb-4">Grow your business with Architecto</h2>
        <p class="fs-6 text-secondary-emphasis mb-5 mx-auto" style="max-width: 600px;">Join thousands of professionals finding new customers every day. No lead fees. Just quality bookings.</p>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            <button class="btn btn-primary btn-lg rounded-3 px-5 py-3 fw-bold fs-7">Join as a Professional</button>
            <button class="btn btn-outline-light btn-lg rounded-3 px-5 py-3 fw-bold fs-7">How it works for Pros</button>
        </div>
    </div>
</section>


<?php include './fileasset/footer.php'; ?>