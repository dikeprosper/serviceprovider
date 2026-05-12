<?php
    $site_url = "http://localhost/work/localproviders/";
    $section_title = "headline display-6";
    $body_text = "text-muted fs-6";
    $body_text_sm = "fw-bold text-muted fs-7";
    $body_text_sm = "fw-bold text-muted fs-7";
    $section_padding = "px-2 px-sm-4 px-md-5 px-xl-0";
    $section_margin = "mx-2 mx-sm-4 mx-md-5 mx-xl-0";
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Architecto | Book Trusted Local Professionals</title>
    <!-- Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    
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
                    <a class="navbar-brand ps-lg-5 px-xl-0 font-headline fw-bold text-primary" href="<?=$site_url?>" style="letter-spacing: -1px; font-size: 1.5rem;">Archi</a>
                </h1>
                
                <!-- Desktop Search -->
                <div class="d-none mx-3 w-lg-45 w-xl-60 w-md-40" id="desktopSearch">
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
        
                <div class="pe-2 pe-sm-4 pe-md-5 pe-xl-0 d-flex align-items-center justify-content-end gap-3 w-lg-75">
        
                    <div class="mobile-nav">
                        <div class="position-relative ">
        
                            <div class="top d-flex d-lg-none justify-content-between align-items-center py-2 px-4 border-bottom">
                                
                                <h1>
                                    <a class="navbar-brand font-headline fs-1 fw-bold text-primary" href="<?=$site_url?>" style="letter-spacing: -1px; font-size: 1.5rem;">Architeco</a>
                                </h1>
                                
                                <span class="navIcon material-symbols-outlined text-primary fs-2">close</span>
                            </div>
                            
                            <div class="allNavLinks d-flex overflow-hidden">
        
                                <div class="scrollNav main-nav-links">
                                    <div class="border-bottom border-lg-0 p-4 p-lg-0 d-flex flex-column flex-lg-row gap-4">
            
                                        <div class="d-none d-lg-flex gap-4">
                                            <button onclick="popup(this, 'category-toggle')" class="nav-link"> Categories  <span class="material-symbols-outlined text-primary">Keyboard_Arrow_Down</span> </button>
                                            <button onclick="popup(this, 'explore-toggle')"  class="nav-link"> Explore <span class="material-symbols-outlined text-primary">Keyboard_Arrow_Down</span> </button>
                                        </div>
                                        <a id="explore-link" class="nav-link d-flex d-lg-none">Explore <span class="d-lg-none material-symbols-outlined text-primary">chevron_forward</span> </a>
                                        <a id="categories-link" class="nav-link d-flex d-lg-none">Categories  <span class="d-lg-none material-symbols-outlined text-primary">chevron_forward</span> </a>
                                        <a href="<?=$site_url?>register.php" id="provider-link" class="nav-link">Become a provider  <span class="d-lg-none material-symbols-outlined text-primary">chevron_forward</span> </a>
                                    </div>
                                    <div class="d-flex d-lg-none px-4 py-1">
            
                                        <a class="nav-link disabled w-100 d-flex justify-content-between align-items-center">Open in app <span class="fs-8">coming soon</span>  <span class="disabled material-symbols-outlined text-primary">open_in_new</span> </a>
                                    </div>
            
                                </div>
                                <div class="pop-up-container">
        
                                    <input type="text" name="" class="myToggler" id="category-toggle">
                                    <div class="d-lg-none pop-up scrollNav secondary-nav-links1">
                                        <div class="d-flex flex-column gap-3 px-4 py-2 border-top">
                                            <a class="d-lg-none nav-link justify-content-start text-primary" id="categories-back-link"> <span class="me-3 material-symbols-outlined text-primary">arrow_back</span> Categories</a>
                                            <a href="./categories.php" class="nav-link">Tailoring</a>
                                            <a class="nav-link">Beauty and Cusmetics</a>
                                        </div>
        
                                    </div>
        
                                </div>
                                <div class="pop-up-container">
        
                                    <input type="text" name="" class="myToggler" id="explore-toggle">
                                    <div class="d-lg-none scrollNav pop-up secondary-nav-links2">
                                        <div class="d-flex flex-column gap-3 px-4 py-2 border-top">
                                            <a class="d-lg-none nav-link justify-content-start text-primary" id="explore-back-link"> <span class="me-3 material-symbols-outlined text-primary">arrow_back</span> Explore</a>
                                            <a href="./about.php" class="nav-link">Learn more</a>
                                            <a href="./contact.php" class="nav-link">Contact us</a>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="d-flex d-lg-none justify-content-between align-items-center gap-3 p-4 border-top">
                            <a href="./register.php" class="btn btn-primary btn-lg rounded-2 w-50 px-3 py-2 fs-6">Join Architeco</a>
                            <a href="./login.php" class="btn btn-outline-primary btn-lg rounded-2 w-50 px-3 py-2 fs-6">sign in</a>
                        </div>
                    </div>
        
                    <div class="d-flex align-items-center gap-3">
                        <a href="./login.php" class="d-none d-sm-flex nav-link
                        ">Sign in</a>
                        <a href="./register.php" class="nav-link btn btn-outline-primary
                        btn-lg rounded-2 px-3 py-2">Join</a>
                    </div>
                </div>
            </div>
        </nav>

    </div>
    
    <div class="px-0 px-md-5 px-xl-0">

        <div class="container-xl small-banner mb-0 mb-md-5 ">
    
            <div class="banner-bg px-2 px-sm-4 px-md-5 py-4">
                
                <h2 class="h5 d-xl-flex align-items-center justify-content-between">
                    Hand selected Tailors in Port Harcourt - Risk Free
                    <a href="" class="text-dark ps-2">Get started <span class="material-symbols-outlined text-dark">chevron_forward</span> </a>
                </h2>
            </div>
        </div>
    </div>
</header>