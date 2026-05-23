<?php
    $site_url = "http://localhost/work/localproviders/";
    $section_title = "headline display-7";
    $section_title_bold = "font-headline display-7";
    $body_text = "text-muted fs-6";
    $body_text_sm = "text-muted fs-7";
    $body_text_sm = "text-muted fs-7";
    $section_padding = "px-2 px-sm-4 px-md-5 px-xl-0";
    $section_margin = "mx-2 mx-sm-4 mx-md-5 mx-xl-0";

    // Configuration
    $company_name = "StitchNG";
    $tagline = "Evolution of Excellence";

    $page = basename($_SERVER['PHP_SELF']);

    $page_title = "Sign in";
    $page_description = "";
    if($page == "login.php") {

        $page_title = "Sign in";
        $page_description = "";
    }

    if($page == "login.php") {

        $page_title = "Sign in";
        $page_description = "";
    }

    if($page == "login.php") {

        $page_title = "Sign in";
        $page_description = "";
    }

    if($page == "login.php") {

        $page_title = "Sign in";
        $page_description = "";
    }
    $nav_links = [
        [
            'href'    => './style',
            'icon'    => 'dresser',
            'label'   => 'Style Inspiration',
            'subtext' => '200+ New Styles',
        ],
        [
            'href'    => './fabrics',
            'icon'    => 'texture',
            'label'   => 'Fabric House',
            'subtext' => '400+ Fabrics',
        ],
        [
            'href'    => './profile',
            'icon'    => 'photo_album',
            'label'   => "Tailor's Portfolio",
            'subtext' => 'Rating/Reviews',
        ],
        [
            'href'    => './about',
            'icon'    => 'info',
            'label'   => 'Learn More',
            'subtext' => 'About StitchNG',
        ],
        [
            'href'    => './contact',
            'icon'    => 'perm_phone_msg',
            'label'   => 'Contact Us',
            'subtext' => 'Get in touch',
        ],
    ];

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title> <?=$page_title?> </title>
    <meta name="description" content="<?=$page_description ?>">

    <!-- Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/aos.css">
    
</head>
<body onscroll="navbarAndBanner()">

<header class="">

    <div class="navbar-wrapper fixed-top">

        <nav class="navbar navbar-expand-lg container-xl">
            
            <div class="container-fluid gap-3 position-relative">
        
                <div class="d-lg-none ps-2 ps-sm-4 ps-md-5 ps-xl-0">
                    <span class="navIcon material-symbols-outlined text-primary fs-2">menu</span>
                </div>
        
                <h1>
                    <a class="navbar-brand ps-lg-5 px-xl-0 font-headline fw-bold text-primary" href="<?=$site_url?>" style="letter-spacing: -1px; font-size: 1.5rem;"><?=$company_name; ?></a>
                </h1>
                
                <!-- Desktop Search -->
                <div class="d-none mx-3 w-lg-50 w-md-40" id="desktopSearch">
                    <div class="nav-search rounded-5 bg-white">
                        <div class="d-flex align-items-center px-2">
                            <span class="material-symbols-outlined text-primary fs-5">search</span>
                            <input type="text" placeholder="Service">
                        </div>
                        <div style="width: 1px; height: 20px; background: var(--outline-variant);"></div>
                        <div class="d-flex align-items-center px-2">
                            <span class="material-symbols-outlined text-primary fs-5">location_on</span>
                            <input type="text" placeholder="Port Harcourt" disabled>
                        </div>
                        <button class="btn btn-primary btn-sm px-3 py-1 rounded-4">Search</button>
                    </div>
                </div>
        
                <div class="pe-2 pe-sm-4 pe-md-5 pe-xl-0 d-flex align-items-center justify-content-end gap-3 w-lg-50">
        
                    <div class="mobile-nav">
                        <div class="position-relative">
        
                            <div class="d-flex d-lg-none top pt-4 pb-3 border-bottom container-xl">
                                
                                <div class="<?=$section_padding?> d-flex w-100 justify-content-between align-items-center">

                                    <h1>
                                        <a class="navbar-brand font-headline fs-1 fw-bold text-primary" href="<?=$site_url?>" style="letter-spacing: -1px; font-size: 1.5rem;"><?=$company_name; ?></a>
                                    </h1>
                                    
                                    <span class="navIcon material-symbols-outlined text-primary fs-2">close</span>
                                </div>
                            </div>
                            
                            <div class="allNavLinks d-flex overflow-hidden">
        
                                <div class="scrollNav main-nav-links">
                                    <div class="border-bottom border-lg-0 d-flex flex-column flex-lg-row gap-2">
            
                                        <div class="d-none d-lg-flex">
                                            <button onclick="popup(this, 'explore-toggle')"  class="nav-link d-flex"> Explore <span class="material-symbols-outlined text-primary">Keyboard_Arrow_Down</span> </button>
                                        </div>

                                        <div class="nav-link container-lg-max d-lg-none">
                                            <a id="explore-link" class="w-100 nav-link d-flex <?=$section_margin?> mx-lg-0">Explore <span class="d-lg-none material-symbols-outlined text-primary">chevron_forward</span> </a>
                                        </div>

                                        <div class="nav-link container-lg-max">
                                            <a href="<?=$site_url?>signup" id="provider-link" class="w-100 nav-link <?=$section_margin?> mx-lg-0">Become a Tailor <span class="d-lg-none material-symbols-outlined text-primary">chevron_forward</span> </a>
                                        </div>

                                    </div>
                                    <div class="d-flex d-lg-none nav-link container-lg-max">
                                        <a class="<?=$section_margin?> nav-link disabled w-100 d-flex justify-content-between align-items-center">Open in app <span class="fs-8">coming soon</span>  <span class="disabled material-symbols-outlined text-primary">open_in_new</span> </a>
                                    </div>
            
                                </div>

                                <div class="pop-up-container">
        
                                    <input type="text" name="" class="myToggler" id="explore-toggle">
                                    <div class="d-lg-none scrollNav pop-up secondary-nav-links2 rounded-4 overflow-hidden">
                                        
                                        
                                        <div class="d-flex flex-column gap-3 gap-lg-0">
                                            <a class="d-lg-none nav-link justify-content-start text-primary border-bottom border-top" id="explore-back-link">
                                                <div class="<?=$section_margin?> container-xl py-3">
                                                    <span class="me-3 material-symbols-outlined text-primary">arrow_back</span> 
                                                    Explore
                                                </div>
                                            </a>
                                            <?php foreach ($nav_links as $index => $link): ?>
                                                <a href="<?= htmlspecialchars($link['href']) ?>"
                                                class="nav-link <?= $index < count($nav_links) - 1 ? 'border-bottom' : '' ?>">
                                                    <div class="container-lg-max py-2 px-lg-3 py-lg-3">
                                                        <div class="d-flex align-items-center px-2 px-sm-4 px-md-5 p-lg-0">
                                                            <span class="material-symbols-outlined text-primary fs-3">
                                                                <?= htmlspecialchars($link['icon']) ?>
                                                            </span>
                                                            <div class="ps-5 ps-lg-3">
                                                                <div class="text-uppercase fs-6"><?= htmlspecialchars($link['label']) ?></div>
                                                                <div class="fs-8 light-text"><?= htmlspecialchars($link['subtext']) ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                                
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="container-xl">

                            <div class="d-flex d-lg-none justify-content-between align-items-center gap-3 p-4 border-top <?=$section_padding?>">
                                <a href="<?=$site_url?>signup" class="btn btn-primary btn-lg rounded-2 w-50 px-3 py-2 fs-6">Join <?=$company_name; ?></a>
                                <a href="<?=$site_url?>signin" class="btn btn-outline-primary btn-lg rounded-2 w-50 px-3 py-2 fs-6">sign in</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="d-flex align-items-center gap-3">
                        <a href="<?=$site_url?>signin" class="d-none d-sm-flex nav-link
                        ">Sign in</a>
                        <a href="<?=$site_url?>signup" class="nav-link btn btn-outline-primary
                        btn-lg rounded-2 px-3 py-2">Join</a>
                    </div>
                </div>
            </div>
        </nav>

    </div>
    
    <div class="px-0 px-md-5 px-xl-0">

        <div class="container-xl small-banner mb-0 mb-md-5 ">
    
            <div class="site-radius banner-bg px-2 px-sm-4 px-md-5 py-4">
                
                <div>

                    <h2 class="h5 d-xl-flex align-items-center justify-content-between" data-aos="fade-in" data-aos-delay="300">
                        Hand selected Tailors in Port Harcourt - Risk Free
                        <a href="" class="text-dark ps-2">Get started <span class="material-symbols-outlined text-dark">chevron_forward</span> </a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</header>