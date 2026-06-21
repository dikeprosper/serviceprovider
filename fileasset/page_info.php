<?php 

    // User Info
    if(isset($_SESSION['user'])) {

        $currentUser = $app->user->authCheck();

    } else {

        $currentUser = null;
    }

    $profile_img = $currentUser['profile'] ?? "placeholder.webp";

    // App variables
    $section_title = "headline display-7";
    $section_title_bold = "font-headline display-7";
    $body_text = "text-muted fs-6";
    $body_text_sm = "text-muted fs-7";
    $body_text_sm = "text-muted fs-7";
    $section_padding = "px-2 px-sm-4 px-md-5 px-xl-0";
    $section_margin = "mx-2 mx-sm-4 mx-md-5 mx-xl-0";

    // Configuration
    $company_name = $app->site_name;
    $tagline = $app->tagline;
    
    $page_title = $company_name;
    $page_description = $tagline;


    // Navigation Links
    $nav_links = [
        [
            'href'    => './inspiration',
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
            'href'    => './tailors',
            'icon'    => 'photo_album',
            'label'   => "Find Tailor's",
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
        ]
    ];

    $dash_nav_items = [
        [
            'href' => './',
            'icon' => 'grid_view',
            'label' => 'Overview',
            'subtext' => ''
        ],
        [
            'href' => './pin',
            'icon' => 'keep',
            'label' => 'pin',
            'subtext' => ''
        ],
        [
            'href' => './projects',
            'icon' => 'analytics',
            'label' => 'Projects',
            'subtext' => ''
        ],
        [
            'href' => './history',
            'icon' => 'history',
            'label' => 'History',
            'subtext' => ''
        ],
        [
            'href' => './mail',
            'icon' => 'mail',
            'label' => 'Messages',
            'subtext' => ''
        ],
        [
            'href' => './wallet',
            'icon' => 'account_balance_wallet',
            'label' => 'Wallet',        
            'subtext' => ''
        ],
        [
            'href' => './settings',
            'icon' => 'settings',               
            'label' => 'Settings',
            'subtext' => ''      
        ],
    ];


    // Identify the current page
    $page = $pageInfo['item'] ?? "";
    $folder = $pageInfo['folder'] ?? "";



    // Setting page data
    $page_label = $company_name;
    if($folder == "dashboard") { $page_label = $folder; }
    if($currentUser) { $nav_links = $dash_nav_items; }

    if ($page == "") {}
    if ($page == "") {}
    if ($page == "") {}
    if ($page == "") {}
    if ($page == "") {}
    if ($page == "") {}
    if ($page == "") {}

    
    $popUps =  '<div class="pop-up-container">
                    <input type="text" name="" class="myToggler" id="explore-toggle">
                    <div class="d-lg-none pop-up2 rounded-4 overflow-hidden px-2 py-3 p-md-0">
                    
                        <button id="closePop" class="d-md-none nav-link d-flex py-3 bg-light justify-content-center"> Close </button>
                                                                
                        <div class="d-flex flex-column gap-3 gap-lg-0 mt-4 mt-md-0">';

                            foreach ($nav_links as $index => $link):

                                 $popUps .=  '<a href="'.SITE_URL . htmlspecialchars($link['href']) .'"

                                class="nav-link border-bottom">
                                    <div class="container-lg-max py-2 px-lg-3 py-lg-3">
                                        <div class="d-flex align-items-center px-2 px-sm-4 px-md-5 p-lg-0">
                                            <span class="material-symbols-outlined text-primary fs-3">
                                                '.htmlspecialchars($link['icon']) .'
                                            </span>
                                            <div class="ps-5 ps-lg-3">
                                                <div class="text-uppercase fs-6">'. htmlspecialchars($link['label']) .'</div>
                                                <div class="fs-8 light-text">'. htmlspecialchars($link['subtext']) .'</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>';
                            endforeach;
                        $popUps .=  '</div>
                                
                    </div>
                </div>

                <div class="pop-up-container">
                    <input type="text" name="" class="myToggler" id="search-toggle">
                    <div class="d-lg-none pop-up2 rounded-4 overflow-hidden end-0 px-2 py-3">
                            
                        <button id="closePop" class="py-3 nav-link d-flex bg-light justify-content-center"> Close </button>                               

                        <form action="" class="h-75 d-flex align-items-center">

                            <div class="w-100 bg-white p-1 rounded-4 rounded-md-5 shadow-lg d-flex flex-column gap-0">
                                <div class="flex-grow-1 d-flex align-items-center px-3 py-1 border-end">
                                    <span class="material-symbols-outlined text-primary me-2">search</span>
                                    <input type="text" class="py-4 form-control border-0 shadow-none" data-id="focusme" placeholder="What service do you need?">
                                </div>
                                <div class="d-flex">
                                    <div class="flex-grow-1 d-flex align-items-center px-3 py-1">
                                        <span class="material-symbols-outlined text-primary me-2 icon-fill">location_on</span>
                                        <input type="text" class="form-control border-0 shadow-none" data-id="focusme" placeholder="Port harcourt" style="width: 130px;" disabled>
                                    </div>
                                        
                                    <div class="flex-grow-1 d-flex align-items-center px-3 py-1">
                                        <span class="material-symbols-outlined text-primary me-2 icon-fill">location_on</span>
                                        <select name="" id="" class="py-4 form-control border-0 shadow-none" data-id="focusme">
                                            <option value="">Lookking for ?</option>
                                            <option value="">Tailor</option>
                                            <option value="">Fabric</option>
                                            <option value="">Style</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="hero-gradient px-4 rounded-5 fs-6 py-1">Search</button>
                            </div>

                        </form>
                    </div>
                </div>';

                ?>
