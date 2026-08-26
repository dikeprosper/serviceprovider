<?php

trait traits {
    
    // ROUTING
    public function routing () {

        // Routing Setup


        // Block direct access to /tailor
        $this->router->get('/profile', function () {
            Router::pageNotFound();
        });

        // Block direct access to /tailor/anything
        $this->router->get('/profile/:any', function (string $any) {
            Router::pageNotFound();
        });

        // -----------------------------------------------
        // INSPIRATION ROUTES
        // Anything starting with /inspiration or /fabrics is handled here
        // views/inspiration/{page}.php
        // -----------------------------------------------
       
        $this->router->get('/fabrics', function () {
            
            Router::view('fabrics', ['fabrics' => ['term' => '']]);

        });

        
        $this->router->get('/fabrics/:term', function (string $term) {
            
            $term = htmlspecialchars($term);
            
            $selectedItem = $this->myQuery(
                "SELECT * FROM fabrics WHERE fid = ?",
                "s",
                [$term]
            );
            
            if ($selectedItem->num_rows > 0) {

                $selectedItem = $selectedItem->fetch_assoc();
                Router::view('fabrics', ['selectedItem' => $selectedItem]);

            } else {

                $cat_empty = false;
                $category = $this->myQuery( "SELECT * FROM categories WHERE name = ?", "s", [$term]);

                if ($category->num_rows > 0) {

                    $cat = $category->fetch_assoc();
                    Router::view('fabrics', ['mycat' => $cat]);

                } else {

                    Router::pageNotFound();
                    return;
                }

            }

        });


        $this->router->get('/inspiration/:term', function (string $term) {
            
            $term = htmlspecialchars($term);
            
            $selectedItem = $this->myQuery(
                "SELECT * FROM products WHERE pid = ? AND active_inspr = '1'", 's', [$term]);
            

            if ($selectedItem->num_rows > 0) {

                $selectedItem = $selectedItem->fetch_assoc();
                Router::view('inspiration', ['selectedItem' => $selectedItem]);

            } else {

                $cat_empty = false;
                $category = $this->myQuery( "SELECT * FROM categories WHERE name = ?", "s", [$term]);

                if ($category->num_rows > 0) {

                    $cat = $category->fetch_assoc();
                    Router::view('inspiration', ['mycat' => $cat]);

                } else {

                    Router::pageNotFound();
                    return;
                }

            }


        });
        
        
        // -----------------------------------------------
        // DASHBOARD ROUTE
        // -----------------------------------------------

        $this->router->get('/dashboard', function () {

            Router::view('dashboard/index', ['pageInfo' => ['item' => 'home', 'folder' => 'dashboard']]);
        });


        // -----------------------------------------------
        // GENERAL ROUTES
        // Reads the first segment of the URL and checks
        // if a matching file exists in views/
        // e.g. /about → views/about.php
        //      /contact → views/contact.php
        // -----------------------------------------------

        $this->router->get('/', function () {
            Router::view('home', ['pageInfo' => ['item' => 'home']]);
        });



        // Single segment — /about
        $this->router->get('/:page', function (string $page) {

            $page = htmlspecialchars($page);

            // $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);
            $file = $this->my_directory. 'views/' . $page . '.php';

            // Check if a view file exists for this page
            if (file_exists($file)) {
                
                Router::view($page, ['pageInfo' => ['item' => $page]]);

            } else {

                // -----------------------------------------------
                // If page doesn't exist then Check if user exists,
                // then renders or redirects
                // -----------------------------------------------

                $user = $this->myQuery(
                    "SELECT * FROM user WHERE username = ? AND role = ?",
                    "ss",
                    [$page,"customer"]
                );

                if ($user->num_rows < 1) {
                    // User doesn't exist — send them home
                    Router::pageNotFound();
                    return;
                }

                $user = $user->fetch_assoc();
                // User exists — load the tailor view and pass user data
                Router::view('profile', ['user' => $user]);
            }
        });


        // Two segments

        $this->router->get('/:folder/:term', function (string $folder, string $page) {
            
            $folder = htmlspecialchars($folder);
            $folder = preg_replace('/[^a-zA-Z0-9_-]/', '', $folder);
            
            $page = htmlspecialchars($page);
            $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);
            
            $file = $this->my_directory. 'views/' . $folder . '/' . $page . '.php';

            if (file_exists($file)) {
                
                Router::view( $folder . '/'.$page, ['pageInfo' => ['item' => $page, 'folder' => $folder]]);

            }
            
            else {

                Router::pageNotFound();
            }
        });

        $this->router->get('/dashboard/pin/:term', function (string $term) {

            $term = trim($term);
            $term = strip_tags($term);
            $currentUserId = $this->user->authCheck()['uid']; 

            if($term != "all_items") {

                $pinQuery = "SELECT * FROM pins WHERE uid = '$currentUserId' AND board = '$term'";
            } else{ 

                $pinQuery = "SELECT * FROM pins WHERE uid = '$currentUserId'";
            }
            $boardQuery = "SELECT * FROM pin_boards WHERE uid = '$currentUserId'";
            

            $pinData = $this->myQuery($pinQuery);
            $boardData = $this->myQuery($boardQuery);


            if ($boardData->num_rows > 0) {
                
                Router::view('dashboard/pin', ['pageInfo' => ['item' => 'pin', 'folder' => 'dashboard', 'query' => $pinQuery, 'term' => $term]]);

            }
            
            else {

                Router::pageNotFound();
            }
        });


        // -----------------------------------------------
        // Run
        // -----------------------------------------------

        $this->router->dispatch();
    }

    // INSPIRATION PAGE
    // Show MoodBoard for Inspiration Page
    public function showMoodBoard($id = '') {

        if (!isset($_SESSION['user'])) { ?>

            <a href="<?= SITE_URL ?>login" class="btn btn-fade">Login to continue</a>
        <?php
        
        } else {

            $currentUser = $this->user->authCheck();

            $uid = $currentUser['uid'];

            $moodBoard = $this->myQuery(
                "SELECT * FROM pin_boards WHERE uid = ?",
                "s",
                [$uid]
            );

            if ($moodBoard->num_rows < 1) {
                $moodBoard = [];
            } else {
                $moodBoard = $moodBoard->fetch_all(MYSQLI_ASSOC);
            }

            
            foreach($moodBoard as $board){ $slug = $board['board_slug'];
                
                $pinSelect = $this->myQuery(
                    "SELECT * FROM pins WHERE uid = ? AND board = ?",
                    "ss",
                    [$uid, $slug]
                );
                $onClick = "onclick=\"savePin('$slug')\"";
                $tag = "";

                $data = $pinSelect->fetch_all(MYSQLI_ASSOC);
                foreach($data as $pin){
                    
                    if($pin['pid'] == $id){
                        
                        $onClick = "";
                        $tag = "<div class=\"fs-7 text-danger mt-2 text-start\">Pin already saved here</div>";
                    }
                } ?>

                
                <div class="col-sm-6">

                    <button class="w-100 border p-4 d-block" <?=$onClick; ?>>
                        
                        <div class="d-flex align-items-center justify-content-between">
                            
                            <div class="fs-6 fw-light"><?=$board['board_name']?></div>
                            <div class="option-icon rounded-4 fs-7 m-0 py-2 px-4" style="width: unset; height: unset;">
                                <?= $pinSelect->num_rows; ?> 
                                <span class="material-symbols-outlined fs-6" style="transform: rotate(30deg);">keep</span> 
                            </div>
                        </div>
                        <?= $tag ?>
                    </button>
                </div>

            <?php }
        }
    }

    //Get pin data
    public function getPinData($currentUser,$query,$pinQuery = NULL) {

        $currentUserId = $this->user->authCheck()['uid'];
        $pinQuery = $pinQuery ?? "SELECT * FROM pins WHERE uid = '$currentUserId'";
        $pins = $this->myQuery($pinQuery);

        $pinnedProducts = [];

        foreach ($pins as $pin) {

            $productId = $pin['pid'];

            // Already added this product from a different board?
            // if (isset($pinnedProducts[$productId])) {

            //     $pinnedProducts[$productId]['board'][] = $pin['board'];
            //     continue; // skip creating a duplicate entry
            // }

            $productResult = $this->myQuery($query, "s", [$productId]);

            if (!empty($productResult)) {

                $product = $productResult->fetch_assoc();

                $pinnedProducts[$product['pid']] = [
                    'pid'      => $product['pid'],
                    'image'    => $product['img'],
                    'name'     => $product['name'],
                    'category' => $product['category'],
                    'board'    => $pin['board'], // always an array
                    'tailor'   => $pin['username'],
                    'note'     => $pin['note'],
                    'alarm'    => $pin['alarm'],
                    'available'=> true
                ];

            } else {

                // Product not found — dummy placeholder
                $pinnedProducts[] = [
                    'pid'      => $productId,
                    'image'    => 'assets/images/product-not-available.png',
                    'name'     => 'Not Available',
                    'board'    => [$pin['board']], // always an array
                    'tailor'   => '',
                    'note'     => '',
                    'alarm'    => '',
                    'type'     => '0',
                    'available'=> false
                ];
            }

        }

        return $pinnedProducts;
    }

    // get boards 
    public function boards($userId) {

        $stmt = "SELECT * FROM pin_boards WHERE uid = ?";
        $boards = $this->myQuery($stmt, "s", [$userId]);
        return $boards;
    }

    // ORDER PAGE
    // Add selected style to the order session
    public function addSelectedStyle($pid, $size, $standard = 0) {

        // Get product information
        $styleQuery = $this->myQuery(
            "SELECT * FROM products WHERE pid = ? AND active_inspr = '1'",
            "s",
            [$pid]
        );

        if ($standard < 1) {

            $user_id    = $this->user->authCheck()['username'];
            $sizeQuery  = $this->myQuery("SELECT * FROM user_measurements WHERE label = ? AND username = ?", "ss", [$size, $user_id]);
            $m = $sizeQuery->fetch_assoc();

            $size                   = "Saved Measurement ($size)";
            $tap_measurement        = $m['measurements'] ?? null;
            $close_match            = $m['close_match'];

        } else {

            $tap_measurement        = null;
            $close_match            = null;
        }
        
        if ($styleQuery->num_rows > 0) {
            
            $style = $styleQuery->fetch_assoc();

            if ($standard > 0) {

                $yards_required = json_decode($style['sizes_available'], true)[$size] ?? null;
                
            } else {
                
                $yards_required = json_decode($style['fabric_yards'], true)[$close_match];
            }

            $_SESSION['selected_styles'] = [
                'pid'               => $style['pid'],
                'name'              => $style['name'],
                'img'               => $style['img'],
                'price'             => [$style['price']],
                'size'              => $size,
                'tap_measurement'   => $tap_measurement,
                'close_match'       => $close_match,
                '$standard'         => $standard,
                'category'          => $style['category'],
                'fabrics'           => ["fid" => "", "name" => "", "img_url" => "", "yards_required" => "$yards_required", "yards_left" => "", "total_yards" => "", "price" => ""],
                'tailors'           => ["uid" => "", "name" => "", "profile_url" => ""],
                'fixed_fab'         => false,
                'fixed_fab_list'    => [],
                'fab_num'           => $style['fab_num'],
                'compatible'        => $style['compatible_fabrics'],
                'is_set'            => true,
                'saved_at'          => time(),
            ];

            return "saved";

        } else {

            return "Error";
        }
    }

    // Add Fabric
    public function addFabric($fid = NULL, $yards_left = NULL, $total_yards = NULL, $fab_price = NULL) {

        // Check if Fabric Id Exist
        $fabQuery = $this->myQuery(
            "SELECT * FROM fabrics WHERE fid = ?",
            "s",
            [$fid]
        );

        if (!isset($_SESSION['selected_styles'])) {

            return "ORDER ERROR";
            exit;
        }

        if ($fabQuery->num_rows > 0) {

            $fab            = $fabQuery->fetch_assoc();
            $name           = $fab["name"] ?? NULL;
            $img_url        = $fab["fabric_img"] ?? NULL;


            // Update the order session
            $_SESSION['selected_styles']['fabrics']['fid']          = $fid;
            $_SESSION['selected_styles']['fabrics']['name']         = $name;
            $_SESSION['selected_styles']['fabrics']['fabric_img']   = $img_url;
            $_SESSION['selected_styles']['fabrics']['yards_left']   = $yards_left;
            $_SESSION['selected_styles']['fabrics']['total_yards']  = $total_yards;
            $_SESSION['selected_styles']['fabrics']['price']        = $fab_price;

            $this->setAlert("Step two complete <br> Now pick a tailor for your amazing style ", "success");
            exit;
            
        } else {
                
            return "ORDER ERROR";
        }

        exit;
    }

    // Add Tailor
    public function addTailor($uid = NULL) {

        // Check if Tailor Id Exist
        $tailorQuery = $this->myQuery(
            "SELECT * FROM user WHERE uid = ?",
            "s",
            [$uid]
        );

        if (!isset($_SESSION['selected_styles'])) {

            return "ORDER ERROR";
            exit;
        }

        if ($tailorQuery->num_rows > 0) {

            $tailor         = $tailorQuery->fetch_assoc();
            $name           = $tailor["name"] ?? NULL;
            $img_url        = $tailor["photo_url"] ?? NULL;


            // Update the order session
            $_SESSION['selected_styles']['tailors']['uid']          = $uid;
            $_SESSION['selected_styles']['tailors']['name']         = $name;
            $_SESSION['selected_styles']['tailors']['photo_url']  = $img_url;

            $this->setAlert("Step two complete <br> Now pick a tailor for your amazing style ", "success");
            exit;
            
        } else {
                
            return "ORDER ERROR";
        }

        exit;
    }

    // Fabric Selection
    public function renderFabricGrid($items, $gridId) { ?>

        <div class="masonry-grid" id="<?= $gridId ?>">
            <?php foreach ($items as $item): ?>
                <div class="masonry-item"
                     data-category="<?= $item['category'] ?>"
                     data-price-per-yard="<?= (float) ($item['price_persale'] ?? 0) ?>">

                    <div class="style-card shadow-sm mb-1" onclick="addFabric('<?= $item['fid'] ?>','<?= $item['yards_left'] ?>', '<?= $item['total_yards'] ?>', '<?=$item['fab_price'] ?>')">

                        <img
                            loading="lazy"
                            src="<?= SITE_URL ?>img/fabrics/<?= $item['fabric_img'] ?>"
                            alt="<?= $item['name'] ?: $item['category'] ?>"
                        >

                        <a class="overlay"></a>

                        <div class="card-title-overlay">
                            <div class="cat-pill fs-9 fw-lighter"><?= $item['category'] ?></div>
                            <div><?= $item['name'] ?? '' ?></div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php }

    // Select a new style from the order session
    // public function selectNew($pid) {
        
    //     $item = $_SESSION['selected_styles'];
        
    //     $return = "";
    //     $pid  = $item ['pid'] ?? null;
    //     $img = $item['img'] ?? null;

    //     if ($item) {
        
    //         $return .= '<div class="row mb-5">
    //                         <div class="col-md-5 mb-3 mb-md-0">
    //                             <div class="itemImg position-relative overflow-hidden rounded-3" style="width: 100%;">
    //                                 <img src="' . SITE_URL . 'img/inspiration/' . $item['img'] . '" 
    //                                     class="w-100 h-100"
    //                                     style="object-fit: cover;">
    //                             </div>
    //                         </div>
            
    //                         <div class="col-md-7 d-flex flex-column justify-content-between">

    //                             <div class="">
    //                                 <div class="d-flex justify-content-between border-bottom py-3">
    //                                     <div class="w-50">
    //                                         <span class="fs-5 material-symbols-outlined">dresser</span>
    //                                         Style: 
    //                                     </div>
    //                                     <span class="w-50 fs-6 ps-2">'. $item['name'] .'</span>
    //                                 </div>

    //                                 <div class="d-flex justify-content-between align-items-center border-bottom">
    //                                     <div class="w-50">
    //                                         <span class="fs-5 material-symbols-outlined">inventory_2</span>
    //                                         Fabrics: <br>
    //                                         <span class="text-muted fs-8">Click box to Add or edit fabric</span>
    //                                     </div>
    //                                     <div class="w-50 d-flex pt-3" style="height: 110px;">';

    //                                         for($i = 0; $i < $item['fab_num']; $i++):

    //                                             if(isset($item['fabrics'][$i])) {

    //                                                 $return .=
    //                                                 '<a href="'. SITE_URL .'fabrics?id='.$i.'" class="itemImg ps-2 py-2">
    //                                                     <div class="pm-add fs-8 position-relative overflow-hidden rounded-3" style="width: 80px; height: 80px !important;">
    //                                                         <img src="'. SITE_URL .'img/fabrics/' . $item['fabrics'][$i]['img'] . '" alt="" class="object-fit">
    //                                                     </div>
    //                                                 </a>';

    //                                             } else {

    //                                                 $return .=
    //                                                 '<a href="'. SITE_URL .'fabrics" class="itemImg ps-2 py-2">
    //                                                     <div class="pm-add fs-8" style="width: 80px; height: 80px !important;">
    //                                                         <span class="material-symbols-outlined fs-5">add</span>
    //                                                     </div>
    //                                                 </a>';
    //                                             }

    //                                         endfor;

    //                         $return .= '</div>
    //                                 </div>
    
    //                             </div>

    //                             <div class="d-flex gap-3" id="style-cta-container">
    //                                 <button class="btn-outline-pill fw-bold text-center py-1" id="secondary-style-btn">
    //                                     Continue
    //                                 </button>
    //                                 <button onclick="delItem('. $item['pid'] .')" class="btn-outline-pill danger-pill text-center py-1 fs-7" id="secondary-style-btn">
    //                                     Remove Item
    //                                 </button>
    //                             </div>
    //                         </div>

    //                     </div>'; 
    //     }

    //     return $return;
    // }

    // GENERAL FUNCTIONS

    // Currency
    public function naira(float $amount): string {
        
        return '₦' . number_format($amount, 2);
    }

    // Price range for our styles
    public function priceRange ($price,$fabrics) {

        return $this->naira($price + 3000) . " - " . $this->naira($price + 7000);
    }

    // Set PHP alert
    public function setAlert($message, $type = 'danger') {

        if (session_status() === PHP_SESSION_NONE) {
            
            session_start();
        }

        $_SESSION['error_message'] = $message;
        $_SESSION['error_type'] = $type;
    }

    // Get PHP alert
    public function getAlert(string $nextStep = '', bool $return = false) {

        if (session_status() === PHP_SESSION_NONE) {
            
            session_start();
        }

        if (!isset($_SESSION['error_message'])) {

            return;
        }

        $message = $_SESSION['error_message'] ?? "";
        $type = $_SESSION['error_type'] ?? "";

        if (!$message) {

            return;
        }

        // Reset session values after reading
        unset($_SESSION['error_message']);
        unset($_SESSION['error_type']);

        $html =
        '<style>

            #cover {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                pointer-events: auto;
                z-index: 99999999999;
                background: rgba(0, 0, 0, 0.4);
            }

            #appalert {
                top: -400px;
                z-index: 99999;
                max-width: 400px;
                box-sizing: border-box;
                box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
                transition: 0.5s;
                border-radius: 1.4rem;
                cursor: pointer;
                pointer-events: auto;
            }

            .alert-success {
                background: var(--primary-color);
                border: none;
                color: var(--on-primary);
            }
            
            /* desktop constraint */

            @media (max-width: 767px) {

                #appalert {
                    max-width: 80%;
                }
            }

            @media (max-width: 576px) {

                #appalert {
                    max-width: 90%;
                }
            }

        </style>


        <div class="d-flex justify-content-center w-100" id="cover">
            
            <div id="appalert" class="text-center p-3 py-4 alert alert-'. htmlspecialchars($type) .' position-fixed" style="line-height: 30px;">
                '. $message.$nextStep .'
            </div>
        </div>';

        if ($return) {
            return $html;
        }

        echo $html;
    }
}