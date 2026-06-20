<?php require_once 'page_info.php'; ?>

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

    <link href="<?=SITE_URL?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=SITE_URL?>css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=SITE_URL?>css/style.css">
    <link rel="stylesheet" href="<?=SITE_URL?>css/aos.css">
    
</head>
<body onscroll="navbarAndBanner()">

<header class="">

    <div class="navbar-wrapper fixed-top <?=$section_padding ?>">

        <nav class="navbar navbar-expand-lg container-xl">
            
            <div class="container-fluid d-flex justify-content-between align-items-center">

                <h1 class="brand">
                    <a href="<?=SITE_URL?>" class="text-capitalize"><?=$page_label; ?></a>
                </h1>
                
                <div class="d-flex justify-content-end w-75 w-sm-50 w-md-80">
                    
                    <!-- Desktop Search -->
                    <div id="desktopSearch" class="me-5 w-md-50">
                        <div class="nav-search rounded-5 bg-white d-none d-lg-flex">
                            <div class="w-100 d-flex align-items-center px-2">
                                <span class="material-symbols-outlined text-primary fs-5">search</span>
                                <input type="text" placeholder="Service">
                            </div>
                            <div style="width: 1px; height: 20px; background: var(--outline-variant);"></div>
                            <div class="w-25 d-flex align-items-center px-2">
                                <span class="material-symbols-outlined text-primary fs-5">location_on</span>
                                <input type="text" placeholder="Port Harcourt" disabled>
                            </div>
                            <button class="btn btn-primary btn-sm px-3 py-1 rounded-4">Search</button>
                        </div>
                    </div>
            
                    <div class="d-flex position-relative align-items-center justify-content-between">
                        
                        <div class="d-flex align-items-center">

                            <div class="d-flex flex-column flex-lg-row justify-content-center gap-3">
                                
                                <div class="d-none d-lg-flex">
                                    <?=$popUps; ?>
                                </div>

                                <?php if($folder !== "dashboard"): ?>
                                    <button onclick="popup(this, 'explore-toggle')" class="nav-link d-none d-lg-flex align-items-center"> more <span class="material-symbols-outlined text-primary">Keyboard_Arrow_Down</span> </button>
                                <?php endif; ?>

                                <?php if ($currentUser): ?>
        
                                    <div class="d-flex gap-2">
                                        <a href="<?=SITE_URL?>dashboard/notify" class="icon-btn"> <span class="material-symbols-outlined">notifications <span></span> </a>
                                        <a href="<?=SITE_URL?>dashboard/mail" class="icon-btn"> <span class="material-symbols-outlined">chat_bubble <span></span> </a>
                                        <a href="<?=SITE_URL?>dashboard/settings" class="icon-btn"> <span class="material-symbols-outlined">settings <span></span> </a>
                                    </div>
                                    
                                <?php endif; ?>
        
        
                                <?php if (!$currentUser): ?>
                                    <a href="<?=SITE_URL?>tailors_program" class="d-none d-lg-flex nav-link <?=$section_margin?>">Become a Tailor </a>
                                <?php endif; ?>
        
                            </div>
                                
                            <div class="d-flex align-items-center">
        
                                <?php if (!$currentUser): ?>
        
                                    <a href="<?=SITE_URL?>login" class="mx-3 d-none d-lg-flex nav-link
                                    ">Log in</a>
                                    <a href="<?=SITE_URL?>register" class="d-none d-lg-flex nav-link btn btn-outline-primary
                                    btn-lg rounded-2 px-3 py-2">Join</a>
        
                                <?php else: ?>
        
                                    <a href="<?=SITE_URL . "dashboard"?>" class="profile_img d-flex ms-3"> <img src="<?=SITE_URL ?>img/profile/<?=htmlspecialchars($profile_img, ENT_QUOTES, 'UTF-8')?>" alt=""> </a>
        
                                <?php endif; ?>
                                
                            </div>
                        </div> 

                        
                        <?php if (!$currentUser): ?>
                            <div class="d-flex align-items-center gap-3">
                                <?=$popUps; ?>
                                
                                <button onclick="popup(this, 'search-toggle')" class="nav-link d-lg-none"> <span class="material-symbols-outlined"> search </span> </button>
                                <button onclick="popup(this, 'explore-toggle')" class="nav-link d-lg-none"> <span class="material-symbols-outlined"> browse </span> </button>
                            </div>
                        <?php endif; ?>
                    </div>
    
                </div>

            </div>
        </nav>
    </div>
    
    <div class="px-0 px-md-5 px-xl-0">

        <div class="container-xl small-banner mb-0 mb-md-5">
    
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

<input type="hidden" id="siteUrl" value="<?=SITE_URL?>">

<div id="message">
    <?php $app->getAlert(); ?>
</div>


<nav id="mobile-nav" class="">

    <div class="position-relative d-flex">
        <?php if ($currentUser): ?>
            
            <?= $popUps; ?>
            <a  onclick="popup(this, 'explore-toggle')" class="mobile-nav-item <?= $page == "overview" ?? "active"; ?>"><span class="material-symbols-outlined">grid_view</span> Menu</a>
            <a href="<?=SITE_URL?>dashboard/projects" class="mobile-nav-item"><span class="material-symbols-outlined">analytics</span> Projects</a>
            <a onclick="popup(this, 'search-toggle')" class="mobile-nav-item"><span class="material-symbols-outlined">search</span> Explore</a>
            <a href="<?=SITE_URL?>dashboard/wallet" class="mobile-nav-item"><span class="material-symbols-outlined">account_balance_wallet</span> Wallet</a>
        <?php else: ?>
            
            <a href="<?=SITE_URL?>register" class="mobile-nav-item <?php if($page == "register"){ echo "active"; } ?>"> <span class="material-symbols-outlined">person_add</span> Register </a>
            <a href="<?=SITE_URL?>tailors_program" class="mobile-nav-item <?php if($page == "tailors_program"){ echo "active"; } ?>"> <span class="material-symbols-outlined">content_cut</span> Become a Tailor </a>
            <a href="<?=SITE_URL?>login" class="mobile-nav-item <?php if($page == "login"){ echo "active"; } ?>"> <span class="material-symbols-outlined">login</span> Login </a>
        <?php endif; ?>
    </div>
</nav>
 