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
        "title"   => "Finding a tailor has never been easier",
        "desc"    => "Browse verified Port Harcourt tailors in seconds..",
        "btn"     => "Find a tailor",
        "img"     => "",
        "alt"     => "Find a tailor",
    ],
    [
        "title"   => "Payment protection and how ".$company_name." keeps you safe",
        "desc"    => "Your money doesn't move until you're satisfied.",
        "btn"     => "Learn More",
        "img"     => "./img/home/howitworks/payment.webp",
        "alt"     => "escrow protection display",
    ],
    [
        "title"   => "Earn while you shop — the referral program",
        "desc"    => "Love a tailor? Tell your friends and earn. ",
        "btn"     => "Get started",
        "img"     => "./img/home/howitworks/refer.webp",
        "alt"     => "Referal program",
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
    "img1" => "project1.webp",
    "img2" => "project6.webp",
    "img3" => "project5.webp",
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

                <h2 class="font-headline display-4 tracking-tight text-white mb-3" data-aos="fade-up">
                    <span class="text-primary-light display-5"> Port Harcourt's best </span>  <br> Tailors, all in one place
                </h2>
                <p class="mb-5 fs-6-plus text-white w-md-100" style="width: 85%;" data-aos="fade-up" data-aos-duration="500">
                    Browse their work, read reviews from real customers, and pay safely.
                    100% money back guarantee if your job isn't done.
                </p>

                <div class="switchRole rounded-5 mb-4 d-flex w-md-100" data-aos="fade-up" data-aos-duration="550">
                    <button class="w-50 btn btn-outline-light btn-sm py-2 rounded-5 text-light">Hire</button>
                    <button class="w-50 btn text-light btn-sm py-2 rounded-5">Get Hire</button>
                </div>

                <div class="bg-white p-1 rounded-4 rounded-md-5 shadow-lg d-flex flex-column flex-md-row gap-0" id="searchBar"data-aos="fade-up" data-aos-duration="550">
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
                <div class="mt-4 d-flex gap-2" data-aos="fade-up" data-aos-duration="550">

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

<!-- BANNERS -->
<section class="container-xl pt-4 pb-5" id="banners">
    
    <div class="<?=$section_padding ?>">
        <div class="row">

            <div class="col-lg-6 pb-5 pb-md-4">
                <div class="banner-wrap site-radius px-4 pt-4 px-md-5 pt-md-0 banner-grid grid-dark" style="background: var(--color-banner-bg2);">
        
                    <!-- Banner Heading -->
                    <div class="banner-content pb-0 pt-md-5 justify-content-end">
                        <span class="px-4 py-1 text-primary fw-bold rounded-pill uppercase mb-3 bg-light text-uppercase fs-8" style="letter-spacing: 2;" data-aos="flip-left" data-aos-delay="200">Premium Experience</span>
                        <h2 class="<?=$section_title_bold; ?> mb-3" data-aos="fade-up" data-aos-delay="300"> Get your tailoring needs met from the comfort of your home. </h2>
                        <a class="fs-6 text-primary pb-5" data-aos="fade-up" data-aos-delay="300">Learn More<span class="material-symbols-outlined text-primary fs-7">arrow_forward</span> </a>
                    
                        <div class="overflow-hidden rounded-4" style="transform: translateY(25px);">
                            <img alt="Professional tailor taking measurements of a Nigerian woman in a modern apartment" class="w-100 object-fit-cover" data-aos="fade-in" data-aos-delay="350" style="aspect-ratio: 4 / 3;" src="./img/home/screen.png"/>
                        </div>
                    </div>
        
                </div>
            </div>
            <div class="col-lg-6 pb-5 pb-md-4">
                <div class="banner-wrap site-radius px-4 pt-4 px-md-5 pt-md-0 banner-grid" style="background: var(--color-banner-bg);">

                    <div class="banner-content pb-0 pt-md-5 justify-content-end">
                        <span class="px-4 py-1 text-white fw-bold rounded-pill uppercase mb-3 text-uppercase fs-8" style="letter-spacing: 2; background: rgba(225,225,225, 0.3)" data-aos="flip-left" data-aos-delay="200">The <?=$company_name?> Promise</span>
                        <h2 class="text-white <?=$section_title_bold; ?> mb-3" data-aos="fade-up" data-aos-delay="200"> No more tailor drama </h2>
                        <p class="text-light fs-6-plus mb-4" data-aos="fade-up" data-aos-delay="300">Money Back Guarantee if your needs aren't met.</p>
                        <a class="text-white fs-6 text-white pb-5" data-aos="fade-up" data-aos-delay="300">Learn More <span class="material-symbols-outlined text-white fs-7">arrow_forward</span> </a>
                    
                        <div class="overflow-hidden rounded-4 w-100" style="transform: translateY(25px);">
                            <img alt="Professional tailor taking measurements of a Nigerian woman in a modern apartment" class="rounded-4 w-100 object-fit-cover" data-aos="fade-in" data-aos-delay="350" style="aspect-ratio: 4 / 3;" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0IVam1X3bPObq8ehAHvl3Xi73OaxgA6Li67i7AI4RFi1fSvmgRgjza-EaDTo9wL1DgSIMnuARKheaFCyyBUhSK6SyUB0IpvIeuN6zxRKla1wh1HE9hZd1DY0xJ3O6Fvc9uVLrdP8jq7BodYYGMj_puXAzhC6rEgHXW-jo2VN-3hHRjGfDFcYPeVkmjpjgnm8k7zzFqwggxlsyGLQq_K7UV1702jYD8BfOK8nbup21srr4FmRsFpTZFxbt4hDf0eEOlH4Ee59ceHAk"/>
                        </div>
                    </div>

                </div>
            </div>

            <div class="small-banner col-12">
        
                <div class="banner-bg site-radius p-4 p-md-5 banner-grid grid-dark">
                    
                    <div class="d-flex flex-column align-items-center justify-content-center flex-lg-row justify-content-lg-between">

                        <div class="pe-lg-5 text-center text-lg-start">
                            
                            <h2 class="<?=$section_title_bold; ?> fs-4 w-100" data-aos="flip-left">
                                Your Next Perfect Outfit Starts Here
                            </h2>
                            <p class="<?=$body_text?> w-100" data-aos="flip-left" data-aos-delay="100">
                                Explore styles, connect with tailors all over port harcourt, and bring your fashion ideas to life today.
                            </p>
                        </div>
                        <div>

                            <a href="" class="btn btn-primary rounded-3 px-4 py-2 fs-6" data-aos="flip-left" data-aos-delay="100"> Explore Styles </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</section>

<!-- HOW IT WORKS SECTION -->
<section class="py-5 <?=$section_padding ?>">
    <div class="container-xl py-md-2">
        <!-- Header row -->
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-between mb-5 gap-4" data-aos="fade-up">
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
                    <div class="step-card d-flex flex-column" data-aos="fade-in">
                        <!-- Image -->

                        <?php if ($i == 0 ): ?>

                            <div class="d-flex mb-3">

                                <div class="card-img-inner me-2 position-relative">
                                    <img
                                        class="profile"
                                        src="./img/home/howitworks/profile.webp"
                                        alt="<?php echo htmlspecialchars($step['alt']); ?>"
                                        loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                                        />
                                    <div class="z-3 pe-3 w-100 title position-absolute bottom-0 p-2 h-100 d-flex align-items-end">

                                        <img src="./img/home/howitworks/profilename1.png" alt="" class="w-100">
                                    </div>
    
                                </div>
                                <div class="card-img-inner position-relative">
                                    <img
                                        class="profile"
                                        src="./img/home/howitworks/profile2.webp"
                                        alt="<?php echo htmlspecialchars($step['alt']); ?>"
                                        loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                                    />
                                    <div class="z-3 pe-3 w-100 title position-absolute bottom-0 p-2 h-100 d-flex align-items-end">

                                        <img src="./img/home/howitworks/profilename2.png" alt="" class="w-100">
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>

                            <div class="card-img-wrap rounded-3 mb-3">
                                <img
                                    class="h-100 w-100 object-fit-cover"
                                    src="<?php echo htmlspecialchars($step['img']); ?>"
                                    alt="<?php echo htmlspecialchars($step['alt']); ?>"
                                    loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>"
                                />
                            </div>

                        <?php endif; ?>

                        <!-- Title + mobile body -->
                        <div class="d-flex flex-column mt-0">
                            <h3 class="h6 font-headline fw-bolder mb-2"><?php echo htmlspecialchars($step['title']); ?></h3>
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
            <div class="banner-wrap site-radius banner-grid grid-dark p-lg-5">

                <div class="row flex-column-reverse flex-lg-row">
    
                    <!-- Banner Heading -->
                    <div class="col-lg-6 ">
                        <div class="banner-content p-4 p-lg-0 pe-lg-4">

                            <h2 class="<?=$section_title; ?>" data-aos="fade-up"> Jobs done by experts</h2>
                            <p class="text-muted fs-6-plus mb-4" data-aos="fade-up" data-aos-delay="100">From high-end residential renovations to critical electrical infrastructure, see the caliber of work our verified professionals deliver daily.</p>
                            <button class="btn btn-primary rounded-2 px-5 py-2 fs-6 w-100 w-md-75 w-lg-75 w-xl-50" data-aos="fade-up" data-aos-delay="200">Explore Portfolio</button>
                        </div>
                    </div>
        
                    <!-- Sample Jobs Slider -->
                    <div class="col-lg-6 pt-4 pt-sm-5 pt-lg-0">

                        <div class="carousel-outer carousel-primary" id="carousel-primary-outer" data-aos="fade-in" data-aos-delay="200">

                            <div class="carousel-track-internal p-0 m-0 w-100 py-md-5 py-lg-0" id="carousel-primary">
                                <?php foreach ($carousel_primary as $item): ?>
                                    <div class="c-item p-0 m-0 w-100">
                                        <img class="rounded-3" src="./img/home/projects/<?php echo htmlspecialchars($item['src']); ?>" alt="<?php echo htmlspecialchars($item['alt']); ?>"/>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Fabric House Section -->
    <div class="pb-5 mb-2 <?=$section_padding?>">
       
        <?php

        $hero_img = "https://lh3.googleusercontent.com/aida-public/AB6AXuAQt77SqDb77BN7fwf6_ShPPvZeARbIDe1DbkkaR9mUK6NNcqnnECd6wkELoTRfkCx-pmAgQMeXBGGcE1f6NTXugQh8uapuYYVpObMk9g1Eo2I-bqKA0ShYUhrolKqxaPyEn1cQ4JQy8DLX5kfCu0N5wChLtdSJVR7COvVMhOm06iXr3jhpBv19a2ZRSpW0dhvBXwD8nwa7hmKBOVdmTl0_FWhqNb4cuicJEXn79NGnHB5VV3lIX5xsCRFSkYOoV93xOvO5vmoZvWZg";

        $fabric_cards = [
            [
                "name"  => "Ankara",
                "href"  => "#",
                "img"   => "https://lh3.googleusercontent.com/aida-public/AB6AXuCVlsabZ0qfquuDwTuwO9pEN0ATCKBK2UFf7UyoU-oOJeoTSftZeyay4-EnLI7PKbPrSSu6rCYNmJnEaDGWrqFpr3tRpP1lH0niMJ5Iy7HIxJeT3NwCCooIbjRZBMOvCh__tDkr6WufdN3_0az2XGwpWR-bAu6GkfOs3Akkl3285f--2oAdhJ8GxM1Q0EOsypHun0RlvGA9oYyRb8iak3zjtE9xV7sB7RHfNkqg8PmGnid-JKAb4h5K1lhCju_zuG-j68xWbDiWM4y3",
            ],
            [
                "name"  => "Linen",
                "href"  => "#",
                "img"   => "https://lh3.googleusercontent.com/aida-public/AB6AXuBujODav5wHPZxRsuN5JD3tXCrWueHGCw4yAcMm_QcoVYh6Uh09aP8Zld1S-sQKjsRDnlSs-fBzhwdzobwWkJStG20b0OHGEdXCxv6v3s47ssqOlb9-93lYACcrt8cudIX54Gh8Y6VgiLLzoUUb_li9ypTIWXnocxQaeKs_R--_u5ahY9qS0k-DtU_tthv5OkKymcuyn8-LALuYR9b58StWrnNM57mkP3RL-LbRr9uIHTnQRZPIgM_gVppFYRhljwj67aF7yQ",
            ],
            [
                "name"  => "Vintage",
                "href"  => "#",
                "img"   => "https://lh3.googleusercontent.com/aida-public/AB6AXuAM8pzSHKl_1GLwUvGJZNOjIpAHVEOoPZ_cL8z10QNwXoIYGrPKdBZ3DmKmCm8FY-OKaH0taahSskinCKCyI-Zf2qyVMVhUOjfCXVRm7CER60TkVVAkxEUYl9nZn1yyIWof7wCrL7ULnwgqL0Rhpezt9N7voWPNpGFSTJPvSxJCOblv3LFlONqC3OQmDnVr4eThEZzhhJgP3n5Hkhn6rAL62AMXi2qmNW_bIuguMUIsszeirmZiQuWetyJ3WpoxbNJlPdQ7T8ZB8tre",
            ],
        ];
        ?>


        <!-- ═══════════════════════════════════════════
            THE FABRIC HOUSE
        ═══════════════════════════════════════════ -->
        <div id="fabric-house">
            <div>

                <!-- Hero Banner -->
                <div class="mb-4">
                    <div class="fabric-hero site-radius">
                        <img src="<?= htmlspecialchars($hero_img) ?>" alt="Premium fabric collection"/>
                        <div class="fabric-hero-overlay d-flex align-items-center justify-content-center">
                            <!-- Header -->
                            <div class="text-center reveal">
                                <h2 class="<?=$section_title_bold?> text-white mb-2" data-aos="flip-left">The Fabric House</h2>
                                <p class="fs-6 text-white mb-4" data-aos="flip-left" data-aos-delay="100">Find your fabric and send it straight <br> to your tailor for free or <br> get it delivered to your doorstep.</p>
                                
                                <div class="d-flex justify-content-center" data-aos="flip-left" data-aos-delay="100">
                                    <a href="" class="btn btn-light rounded-2 px-5 py-2 fs-6 ">Explore Fabric House</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Fabric Cards -->
                <div class="row g-4 mb-4">
                    <?php foreach ($fabric_cards as $i => $card): ?>
                        <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="<?= $i * 50 ?>">
                            <a href="<?= htmlspecialchars($card['href']) ?>" class="fabric-card">
                            <img src="<?= htmlspecialchars($card['img']) ?>" alt="<?= htmlspecialchars($card['name']) ?>"/>
                            <div class="fabric-card-overlay">
                                <span class="fabric-card-label"><?= htmlspecialchars($card['name']) ?></span>
                            </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

    </div>

    <!-- Discount Banner -->
    <div class="<?=$section_padding ?>">
        <div class="hero-gradient p-4 p-md-5 site-radius banner-grid grid-mid">
            
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
    
                <div class="text-center text-md-start mb-4 mb-md-0">
                    <span data-aos="flip-left" class="badge bg-white bg-opacity-25 mb-3 fs-9 px-3 pt-2 pb-1 fw-light rounded-pill">LIMITED TIME OFFER</span>
                    <h2 data-aos="flip-left" data-aos-delay="50" class="font-headline fs-3 display-5 mb-3"><span class="font-headline display-3 fw-bolder">Get 20% OFF</span><br>On your first booking
                    </h2>
                    <p data-aos="flip-left" data-aos-delay="100"  class="fs-6 opacity-75">Use code <span class="bg-white bg-opacity-25 px-2 py-1 rounded font-monospace fw-bold">ARCHI20</span> at checkout. Valid for all services.</p>
                </div>
                <button data-aos="flip-left" data-aos-delay="100" class="btn btn-light  rounded-2 px-5 py-2 fs-6 w-100 w-md-unset text-primary">Claim Discount Now</button>
            </div>
        </div>
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

<script src="./js/script.js"></script>

<?php include './fileasset/footer.php'; ?>