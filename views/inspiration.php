<?php include './fileasset/header.php'; 

    $category = [
        'ankara',
        'casual',
        'office',
        'hijab',
        'gowns',
        'native',
        'bridal',
        'shirts'
    ];

    $fabric_category = [
        'linen',
        'vintage',
        'ankara',
        'lace'
    ];

    $active_all = "active";

    // Single pin view
    // Likes and Profile selection
    if(isset($pin['pid'])) {

        $pid = $pin['pid'];
        $username = $pin['username'];
        $selectedCat = $pin['category'];
    
        // Likes
        $likes = $app->myQuery("SELECT * FROM likes WHERE pid = '$pid'");
        
        // Tailor selection
        $user = $app->myQuery("SELECT * FROM user WHERE username = '$username'");
        $t_user = $user->fetch_assoc();

        $product_type = $pin['p_type'];

        if($product_type == 1) {

            $link = "f=" . $pin['pid'];
            
        } else {

            $link = "s=" . $pin['pid'];
        }

    }

    // Product listing based on category filter
    if(isset($mycat)) {

        $active_all = "";
        $cat = $mycat['name'];
        $product_type = $mycat['type'];

        $styles = $app->myQuery("SELECT * FROM products WHERE category = '$cat' AND active_inspr = '1' AND p_type = '$product_type'");
    
    }  elseif (isset($selectedCat)) {
        
        $styles = $app->myQuery("SELECT * FROM products WHERE category = '$selectedCat' AND active_inspr = '1' AND p_type = '$product_type' AND pid != '$pid'");

    } elseif (isset($fabrics)) {

        $styles = $app->myQuery("SELECT * FROM products WHERE p_type = '1'");
        $product_type = 1;

    } else {

        $styles = $app->myQuery("SELECT * FROM products WHERE active_inspr = '1' AND p_type = '0'");
        $product_type = 0;
    }

    // Convert to array for easier handling in views
    if (isset($selectedCat)) {
        
        $myStyles = [];
        while ($row = $styles->fetch_assoc()) {

            $myStyles[] = $row;
        }

        $current_name = $pin['name'];
        $tags = explode(',', $pin['tags']);
        
        $current_tags = array_map('trim', explode(',', $pin['tags']));
        
        // Scoring function to determine relevance based on name and tags
        // Higher score means more relevant
        // Word matches are weighted more heavily than tag matches, and having both boosts the score further
        $scoreItem = function($item) use ($current_name, $current_tags) {
            $score = 0;

            //Word matching
            $current_words  = array_filter(explode(' ', strtolower($current_name)));
            $item_words     = array_filter(explode(' ', strtolower($item['name'])));
            $matching_words = array_intersect($current_words, $item_words);
            $score += count($matching_words) * 20;

            // Tag matching — explode here since they're comma-separated strings
            $item_tags = array_filter(array_map('trim', explode(',', $item['tags'])));
            $matching_tags = array_intersect(
                array_map('strtolower', $item_tags),
                array_map('strtolower', $current_tags)
            );

            $score += count($matching_tags) * 20;

            // Priority boost — at least 1 matching WORD AND at least 1 matching tag
            if (count($matching_words) >= 1 && count($matching_tags) >= 1) {
                $score += 40;
            }
            
            return $score;
        };

        
        usort($myStyles, function($a, $b) use ($scoreItem) {
            return $scoreItem($b) - $scoreItem($a);
        });

        
    } elseif ($styles->num_rows < 1) {

        $myStyles = [];

    } else {

        $myStyles = $styles->fetch_all(MYSQLI_ASSOC);
    }

    if($product_type == 1) {

        $allCat = 'fabrics';
        
    } else {

        $allCat = 'inspiration';
    }

    $stmt = $app->myQuery("SELECT * FROM categories WHERE type = '$product_type'");
    $categories = $stmt->fetch_all(MYSQLI_ASSOC);

?>

<link rel="stylesheet" href="<?=SITE_URL?>css/inspiration.css">


<!-- MAIN -->
<main class="py-5 my-1 my-md-5 <?=$section_padding?>">
    <div class="container-xl">

        <div class="categories pt-3">

            <?php if(!isset($selectedCat)): ?>
                
                <div class="btn-fade fs-7 rounded-5 <?= $active_all?>"> <a href="<?= SITE_URL . $allCat ?>">All</a> </div>
           
            <?php foreach ($categories as $item):  ?>
                <div class="btn-fade fs-7 rounded-5 <?php if (isset($cat) AND $cat == $item['name']){ echo "active"; } ?>"> <a href="<?=SITE_URL ?>category/<?=$item['name'] ?>"><?=$item['name'] ?></a> </div>
            <?php endforeach; endif; ?>
            

        </div>

        <div class="">

            <?php if(isset($pin['pid'])) : ?>
                <div class="pin-detail-card site-radius p-4 p-md-5 mb-5">
                    <div class="row gap-4">
                        <!-- LEFT: Image -->
                        <div class="pin-image-box col-lg-6">
                            <img
                            src="<?= SITE_URL ?>img/<?= $allCat ?>/<?= htmlspecialchars($pin['img']) ?>"
                            alt="<?= htmlspecialchars($pin['name']) ?>"
                            >
                        </div>
                        <!-- RIGHT: Details -->
                        <div class="pin-details col-lg-6">

                            <!-- Tailor profile -->
                            <a href="<?= SITE_URL . urlencode($t_user['username']) ?>" class="tailor-profile">
                                <div class="tailor-avatar"> <img src="<?= SITE_URL . htmlspecialchars($t_user['profile']) ?>" alt=""></div>
                                <div>
                                    <p class="tailor-name"><?= htmlspecialchars($t_user['username']) ?></p>
                                    <p class="tailor-sub"><?= htmlspecialchars($t_user['specialty']) ?></p>
                                </div>
                                <button class="btn-follow" onclick="event.preventDefault()">Follow</button>
                            </a>

                            <hr class="pin-divider">

                            <!-- Title + category -->
                            <div>
                            <h1 class="pin-title"><?= htmlspecialchars($pin['name']) ?></h1>
                            <span class="category-pill"><?= htmlspecialchars($pin['category']) ?></span>
                            </div>

                            <!-- Description -->
                            <p class="pin-desc"><?= htmlspecialchars($pin['description']) ?></p>

                            <!-- Tags -->
                            <div class="pin-tags">
                                <?php foreach ($tags as $tag): ?>
                                    <span class="pin-tag"><?= htmlspecialchars($tag) ?></span>
                                <?php endforeach; ?>
                            </div>

                            <!-- CTA button -->
                            <div class="">

                                <div class="btn btn-fade rounded-5 px-0">
                                    <a href="<?= SITE_URL . '?' . $link; ?>" class="p-5 fs-6">
                                        Pick a Style
                                    </a>
                                </div>
                                <div class="btn btn-fade rounded-5 px-0">
                                    <a href="<?= SITE_URL ?>" class="p-5 fs-6">
                                        Find a tailor
                                    </a>
                                </div>
                            </div>

                            <hr class="pin-divider">

                            <!-- Engagement: like, comment, share -->
                            <div class="engagement-row">

                                <button class="engage-btn" aria-label="Like (<?= $likes->num_rows; ?> likes)">
                                    <div class="engage-icon-wrap">
                                    <span class="material-symbols-outlined">favorite</span>
                                    <span class="engage-count"><?= $likes->num_rows; ?></span>
                                    </div>
                                    <span class="engage-label">Like</span>
                                </button>

                                

                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="masonry-grid">
    
                <?php foreach ($myStyles as $item): ?>
                    <div class="masonry-item">
                        <div class="style-card shadow-sm">
    
                            <img
                                src="<?= SITE_URL ?>img/<?= $allCat ?>/<?= htmlspecialchars($item['img']) ?>"
                                alt="<?= htmlspecialchars($item['name'] ?: $item['category']) ?>"
                            >
    
                            <a href="<?= SITE_URL ?>inspiration/<?=$item['pid']; ?>" class="overlay">
                                
                            </a>
    
                            <!-- Pin button -->
                            <div class="pin-btn">
                                <div
                                    onclick="openModal('<?= htmlspecialchars($item['pid']) ?>','<?= htmlspecialchars($item['username']) ?>')"
                                    class="btn btn-primary"
                                >
                                    <span class="material-symbols-outlined" style="font-size:18px;">keep</span>
                                </div>
                            </div>
    
                            <!-- Title + category overlay -->
                            <div class="card-title-overlay">
                                <div class="cat-pill"><?= htmlspecialchars($item['category']) ?></div>
                                <?php if (!empty($item['name'])): ?>
                                    <div><?= htmlspecialchars($item['name']) ?></div>
                                <?php endif; ?>
                            </div>
    
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>


    <!-- MODAL -->
    <div class="modal-overlay" id="modal">
        <div class="modal-box rounded-5">

            <div class="step active" id="step1">
                
                <div class="fs-3 fw-bold text-center mb-3">Select A Board</div>
                <input type="hidden" id="username" value="">
                <input type="hidden" id="pid" value="">
                <div class="row g-3">

                    <?php $app->showMoodBoard(); ?>
                </div>
            </div>
        </div>
    </div>
</main>




<?php include './fileasset/footer.php'; ?>
<script src="<?=SITE_URL?>js/selections.js"></script>
<script src="<?=SITE_URL?>js/inspiration.js"></script>
