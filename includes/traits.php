<?php

trait traits {
    
    // SETTINGS
    private $data = [];

    public function __construct($db) {

        $result = $db->query("SELECT item, value FROM setting");

        while ($row = $result->fetch_assoc()) {
            
            $this->data[$row['item']] = $row['value'];
        }
    }

    public function __get($name) {

        return $this->data[$name] ?? null;
    }

    // Routing
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
        // Anything starting with /inspiration is handled here
        // views/inspiration/{page}.php
        // -----------------------------------------------
       
        $this->router->get('/fabrics', function () {
            
            Router::view('inspiration', ['fabrics' => ['term' => '']]);

        });

        
        $this->router->get('/inspiration/:term', function (string $pid) {
            
            $pid = htmlspecialchars($pid);
            
            $pin = $this->myQuery(
                "SELECT * FROM products WHERE pid = ? AND active_inspr = '1'",
                "s",
                [$pid]
            );
            
            if ($pin->num_rows < 1) {
                // User doesn't exist — send them home
                Router::pageNotFound();
                return;
            }

            $pin = $pin->fetch_assoc();
            // User exists — load the tailor view and pass user data
            Router::view('inspiration', ['pin' => $pin]);

        });
        

        $this->router->get('/category/:term', function (string $cat) {
            
            $cat = htmlspecialchars($cat);
            $cat_empty = false;
            $category = $this->myQuery(
                "SELECT * FROM categories WHERE name = ?",
                "s",
                [$cat]
            );
            
            if ($category->num_rows < 1) {

                // Empty category
                $cat_empty = true;
                Router::pageNotFound();
                
            }

            $cat = $category->fetch_assoc();
            // Category exists — load the inspiration view and pass category data
            Router::view('inspiration', ['mycat' => $cat]);

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

            // Sanitise — only allow clean slugs, no path traversal
            if (!preg_match('/^[a-zA-Z0-9]+$/', $page)) {
                Router::pageNotFound();
                return;
            }

            // Check if a view file exists for this page
            if (file_exists($file)) {
                
                Router::view($page, ['pageInfo' => ['item' => $page]]);

            } else {

                // -----------------------------------------------
                // If page doesn't exist then Check if user exists,
                // then renders or redirects
                // -----------------------------------------------

                $user = $this->myQuery(
                    "SELECT * FROM user WHERE username = ? AND provider = '1'",
                    "s",
                    [$page]
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


        // -----------------------------------------------
        // Run
        // -----------------------------------------------

        $this->router->dispatch();
    }

    //Show MoodBoard for Inspiration Page
    public function showMoodBoard($id = '') {

        $uid = "2";
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
                    
                    <div class=" d-flex align-items-center justify-content-between">
                        
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


    // Set PHP alert
    public function setAlert($message, $type = 'danger') {

        if (session_status() === PHP_SESSION_NONE) {
            
            session_start();
        }

        $_SESSION['error_message'] = $message;
        $_SESSION['error_type'] = $type;
    }

    // Get PHP alert
    public function getAlert(string $fetch = '', string $nextStep = '') {

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
?>

        <style>

            #cover {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                pointer-events: auto;
                z-index: 99998;
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
            
            <div id="appalert" class="p-3 py-4 alert alert-<?=htmlspecialchars($type); ?> position-fixed">
                <?=$message.$nextStep ?>
            </div>
        </div>

        <?php if(empty($fetch)){ ?>

        <?php
        }
    }
}