<?php

trait traits {
    
    // -----------------------------------------------
    // Simulated database of users
    // Replace this with a real DB query when ready
    // -----------------------------------------------
    // public static array $database = [
    //     [
    //         'name'      => 'Marvis Johnson',
    //         'slug'      => 'marvis',
    //         'address'   => 'Lagos Island, Lagos',
    //         'specialty' => 'Agbada & Native Wears',
    //         'bio'       => 'Expert in traditional Yoruba attire with over 10 years of experience crafting premium agbadas and native wears for weddings and ceremonies.',
    //         'avatar'    => 'https://placehold.co/120x120',
    //         'rating'    => 4.8,
    //         'orders'    => 142,
    //     ],
    //     [
    //         'name'      => 'Chisom Eze',
    //         'slug'      => 'chisom',
    //         'address'   => 'Enugu State, Nigeria',
    //         'specialty' => 'Ankara & Aso-Ebi',
    //         'bio'       => 'Specialist in vibrant Ankara designs and coordinated Aso-Ebi outfits. Known for bringing colour and culture together in every stitch.',
    //         'avatar'    => 'https://placehold.co/120x120',
    //         'rating'    => 4.6,
    //         'orders'    => 98,
    //     ],
    //     [
    //         'name'      => 'Emeka Okafor',
    //         'slug'      => 'emeka',
    //         'address'   => 'Abuja, FCT',
    //         'specialty' => 'Suits & Corporate Wear',
    //         'bio'       => 'Bespoke suit maker trained in both local and European tailoring. Trusted by politicians, executives, and professionals across Nigeria.',
    //         'avatar'    => 'https://placehold.co/120x120',
    //         'rating'    => 4.9,
    //         'orders'    => 207,
    //     ],
    //     [
    //         'name'      => 'Fatima Bello',
    //         'slug'      => 'fatima',
    //         'address'   => 'Kano State, Nigeria',
    //         'specialty' => 'Hijab Fashion & Modest Wear',
    //         'bio'       => 'Creative fashion designer specialising in modest wear, hijab styles, and elegant northern Nigerian fashion for all occasions.',
    //         'avatar'    => 'https://placehold.co/120x120',
    //         'rating'    => 4.7,
    //         'orders'    => 115,
    //     ],
    // ];


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
            
            $pin = $this->myQuery("SELECT * FROM products WHERE pid = '$pid' AND active_inspr = '1'");
            
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
            $category = $this->myQuery("SELECT * FROM categories WHERE name = '$cat'");
            
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

                $user = $this->myQuery("SELECT * FROM user WHERE username = '$page' AND provider = '1'");

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
        $moodBoard = $this->myQuery("SELECT * FROM pin_boards WHERE uid = '$uid'");

        if ($moodBoard->num_rows < 1) {
            $moodBoard = [];
        } else {
            $moodBoard = $moodBoard->fetch_all(MYSQLI_ASSOC);
        }

        
        foreach($moodBoard as $board){ $slug = $board['board_slug'];
            
            $pinSelect = $this->myQuery("SELECT * FROM pins WHERE uid = '$uid' AND board = '$slug'");
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

    // Star rating display
    /**
     * Generate an SVG star rating bar based on a value (1–5).
     *
     * @param  float  $rating   A number between 0 and 5 (supports decimals, e.g. 3.7)
     * @param  int    $width    Total SVG width in pixels (default: 160)
     * @param  int    $height   Total SVG height in pixels (default: 32)
     * @return string           Raw SVG markup string
     */
    public function generateStarRatingSvg(float $rating, int $width = 160, int $height = 32): string
    {
        // Clamp rating to [0, 5]
        $rating = max(0.0, min(5.0, $rating));

        $percentage  = $rating / 5.0;          // 0.0 – 1.0
        $starCount   = 5;
        $padding     = 0;                       // px around the whole bar
        $gap         = 3.5;                       // px between stars
        $starSize    = ($width - ($padding * 2) - ($gap * ($starCount - 1))) / $starCount;
        $svgHeight   = $height;
        $starY       = $svgHeight / 2;          // vertical center

        // ── Colour interpolation (red → amber → green) ──────────────────────
        $color = $this->interpolateStarColor($percentage);

        // ── Unique clip-path ID (prevents collisions on pages with multiple ratings) ──
        $clipId = 'sr_clip_' . substr(md5(uniqid((string)$rating, true)), 0, 8);

        // ── Build star polygon points (5-point star centred at 0,0) ──────────
        $starPath = $this->buildStarPath($starSize / 2);

        // ── Assemble star <use> elements ─────────────────────────────────────
        $starDefs   = '';   // grey background stars
        $starFilled = '';   // coloured foreground stars (clipped)

        for ($i = 0; $i < $starCount; $i++) {
            $cx = $padding + ($i * ($starSize + $gap)) + ($starSize / 2);
            $cy = $starY;

            $starDefs   .= sprintf(
                '<polygon points="%s" transform="translate(%s,%s)" fill="#ffffff3f" stroke="none"/>',
                $starPath, round($cx, 2), round($cy, 2)
            );
            $starFilled .= sprintf(
                '<polygon points="%s" transform="translate(%s,%s)" fill="%s" stroke="none"/>',
                $starPath, round($cx, 2), round($cy, 2), $color
            );
        }

        // ── Fill width for the clip rect ─────────────────────────────────────
        $fillWidth = ($width - $padding * 2) * $percentage;

        // ── Glow filter ──────────────────────────────────────────────────────
        $filterId = 'sr_glow_' . substr(md5($clipId), 0, 6);

        $svg = <<<SVG
            <svg xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="{$width}"
                height="{$svgHeight}"
                viewBox="0 0 {$width} {$svgHeight}"
                role="img"
                aria-label="Star rating: {$rating} out of 5">

            <defs>
                <!-- Soft glow on filled stars -->
                <filter id="{$filterId}" x="-20%" y="-20%" width="140%" height="140%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="1.2" result="blur"/>
                <feMerge>
                    <feMergeNode in="blur"/>
                    <feMergeNode in="SourceGraphic"/>
                </feMerge>
                </filter>

                <!-- Clip path: reveals only the filled portion -->
                <clipPath id="{$clipId}">
                <rect x="{$padding}" y="0" width="{$fillWidth}" height="{$svgHeight}"/>
                </clipPath>
            </defs>

            <!-- Background track -->
            <rect x="0" y="0" width="{$width}" height="{$svgHeight}"
                    rx="1" ry="1" fill="none"/>

            <!-- Grey (empty) stars -->
            {$starDefs}

            <!-- Coloured (filled) stars — clipped to fill percentage -->
            <g clip-path="url(#{$clipId})" filter="url(#{$filterId})">
                {$starFilled}
            </g>

            <!-- Subtle border -->
            <rect x="0" y="0" width="{$width}" height="{$svgHeight}"
                    rx="6" ry="6" fill="none" stroke="transperant" stroke-width="1"/>
            </svg>
            SVG;

        return trim($svg);
    }

    // ─────────────────────────────────────────────────────────────────────────
    // Private helpers
    // ─────────────────────────────────────────────────────────────────────────

    /**
     * Interpolate between red, amber, and green based on a 0–1 percentage.
     */

    private function interpolateStarColor(float $t): string
    {
        // Colour stops: [r, g, b]
        $red   = [255, 255,  0];
        $amber = [255, 255, 0];
        $green = [255,  255, 0];

        if ($t <= 0.5) {
            $local = $t / 0.5;
            $r = (int) round($red[0] + ($amber[0] - $red[0]) * $local);
            $g = (int) round($red[1] + ($amber[1] - $red[1]) * $local);
            $b = (int) round($red[2] + ($amber[2] - $red[2]) * $local);
        } else {
            $local = ($t - 0.5) / 0.5;
            $r = (int) round($amber[0] + ($green[0] - $amber[0]) * $local);
            $g = (int) round($amber[1] + ($green[1] - $amber[1]) * $local);
            $b = (int) round($amber[2] + ($green[2] - $amber[2]) * $local);
        }

        return sprintf('#%02X%02X%02X', $r, $g, $b);
    }

    /**
     * Build the SVG points string for a 5-pointed star centred at (0, 0).
     *
     * @param  float  $outerRadius  Radius to the tips
     * @return string               Space-separated "x,y" pairs
     */
    private function buildStarPath(float $outerRadius): string
    {
        $innerRadius = $outerRadius * 0.4;   // inner circle radius
        $points      = [];
        $numPoints   = 5;

        for ($i = 0; $i < $numPoints * 2; $i++) {
            // Outer tips at every even index, inner notches at odd
            $radius = ($i % 2 === 0) ? $outerRadius : $innerRadius;
            // Start at the top (−π/2) and rotate clockwise
            $angle  = (M_PI / $numPoints) * $i - M_PI / 2;
            $points[] = round($radius * cos($angle), 4) . ',' . round($radius * sin($angle), 4);
        }

        return implode(' ', $points);
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