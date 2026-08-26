<?php include './fileasset/header.php'; 

    $active_all = "active";

    // Single pin view
    // Likes and Profile selection
    if(isset($selectedItem)) {

        $fid = $selectedItem['fid'];

        $username = $selectedItem['username'];
        $selectedCat = $selectedItem['category'];
    
        // Likes + Pins counts in one query
        $engagement = $app->myQuery(
            "SELECT
                (SELECT COUNT(*) FROM likes WHERE pid = ?) AS like_count,
                (SELECT COUNT(*) FROM pins WHERE pid = ?) AS pin_count",
            "ss",
            [$fid, $fid]
        );

        // Normalize: fetch if it's still a raw mysqli_result
        if ($engagement instanceof mysqli_result) {
            $engagement = $engagement->fetch_all(MYSQLI_ASSOC);
        }

        $likeCount = $engagement[0]['like_count'];
        $pinCount  = $engagement[0]['pin_count'];
        
        // Tailor selection
        $user = $app->myQuery(
            "SELECT * FROM user WHERE username = ?",
            "s",
            [$username]
        );
        $t_user = $user->fetch_assoc();

    }

    // Product listing based on category filter
    if(isset($mycat)) {

        $active_all = "";
        $cat = $mycat['name'];

        $styles = $app->myQuery(
            "SELECT * FROM fabrics WHERE category = ?",
            "s",
            [$cat]
        );
    
    }  elseif (isset($selectedCat)) {
        
        $styles = $app->myQuery(
            "SELECT * FROM fabrics WHERE category = ? AND fid != ?",
            "ss",
            [$selectedCat, $fid]
        );

    } else {

        $styles = $app->myQuery("SELECT * FROM fabrics");
    }

    $allCat = 'fabrics';
    $item = 'fabric';

    // Convert to array for easier handling in views
    if (isset($selectedCat)) {
        
        $myStyles = [];
        while ($row = $styles->fetch_assoc()) {

            $myStyles[] = $row;
        }

        $current_name = $selectedItem['name'];
        $tags = explode(',', $selectedItem['tags']);
        
        $current_tags = array_map('trim', explode(',', $selectedItem['tags']));
        
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

    $stmt = $app->myQuery("SELECT * FROM categories WHERE type = '1'");
    $categories = $stmt->fetch_all(MYSQLI_ASSOC);

    if(isset($_GET['order']) AND isset($_SESSION['selected_style'])) {

        $order = $_SESSION['selected_style'];
    }
?>

<link rel="stylesheet" href="<?=SITE_URL?>css/inspiration.css">


<!-- MAIN -->
<main class="py-5 my-1 my-md-5 <?=$section_padding?>">
    <div class="container-xl">

        <?php if(!isset($selectedCat)): ?>

            <div class="categories pt-3">
                
                <button class="btn btn-fade fs-7 rounded-5 <?= $active_all?>" data-filter-cat="all">All</button>
                <?php foreach ($categories as $cat_list):  ?>
                    <button class="btn btn-fade fs-7 rounded-5 text-capitalize" data-filter-cat="<?= $cat_name ?>"><?=$cat_list['name'] ?></button>
                <?php endforeach;?>
                    
            </div>

            <div class="small-banner mb-3 gap-2">
                
                <div>
                    <p class="fs-6 mb-0 fw-bold text-capitalize"> <?=$cat ?? ""; ?> </p>
                    <div class="d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined fs-9">info</span>
                        <p class="mb-0 fs-8">Have a specific <?=$item ?> in mind ?</p>
                    </div>
                </div>
                <a href="<?= SITE_URL ?>fabrics/?f=<?=$item ?> " class="btn btn-fade fade-r fs-8">Find Fabric</a>
            </div>

        <?php endif; ?>

        <div class="">

            <?php if(isset($selectedItem['fid'])) : ?>
                <div class="pin-detail-card site-radius p-4 p-md-5 mb-5">
                    <div class="row gap-4">
                        <!-- LEFT: Image -->
                        <div class="pin-image-box col-lg-6">
                            <img
                            src="<?= SITE_URL ?>img/<?= $allCat ?>/<?= $selectedItem['fabric_img'] ?>"
                            alt="<?= $selectedItem['name'] ?? '' ?>"
                            >
                        </div>
                        <!-- RIGHT: Details -->
                        <div class="pin-details col-lg-6">

                            <!-- Tailor profile -->
                            <a href="<?= SITE_URL . urlencode($t_user['username']) ?>" class="tailor-profile">
                                <div class="tailor-avatar"> <img src="<?= SITE_URL . "img/profile/" . $t_user['photo_url'] ?>" alt=""></div>
                                <div>
                                    <p class="tailor-name"><?= $t_user['username'] ?></p>
                                    <p class="tailor-sub"><?= $t_user['specialty'] ?></p>
                                </div>
                            </a>

                            <hr class="pin-divider">

                            <!-- Title + category -->
                            <div>
                            <h1 class="pin-title"><?= $selectedItem['name'] ?? "" ?></h1>
                            <span class="category-pill"><?= $selectedItem['category'] ?></span>
                            </div>

                            <!-- Description -->
                            <p class="pin-desc"><?= $selectedItem['description'] ?></p>

                            <!-- Tags -->
                            <div class="pin-tags">
                                <?php foreach ($tags as $tag): ?>
                                    <span class="pin-tag"><?= $tag ?></span>
                                <?php endforeach; ?>
                            </div>

                            <!-- CTA button -->
                            <div class="my-3">

                                <div class="position-relative pop-up-container">

                                    <div class="d-flex">

                                        <?php if(isset($order)): ?>

                                            <div onclick="addFab(this,'add-fab')" class="btn btn-primary rounded-2 monrope px-5 py-2">
                                                Continue with 
                                            </div>

                                        <?php endif; ?>
                                        
                                        <div onclick="popup(this,'add-fab')" class="btn btn-fade fade-r rounded-2 monrope px-5 py-2">
                                            <span class="material-symbols-outlined fs-6-plus me-2">texture</span>
                                            Add to Order <?=var_dump($_SESSION['selected_style']); ?>
                                        </div>
                                    </div>

                                    <input type="text" name="" class="myToggler" id="add-fab">
                                    <div class="pop-up2 rounded-4 p-4 overflow-auto">
                                        <button id="closePop" class="btn btn-light mb-4 title rounded-2 d-lg-none">Close</button>
                                        <div class="pb-3">
                                            
                                            <div class="w-100 fs-6 fw-bold mb-3">Yards</div>

                                            <div class="w-100 d-flex justify-content-between">

                                                <select id="selectSize" class="form-control mb-2" data-id="focusme">
                                                    
                                                    <option value="">Select</option>

                                                </select>
                                            </div>
                                            
                                            <a href="" class="btn btn-outline-primary fs-7">add new</a>
                                            <p class="errorMsg text-danger fs-7"></p>
                                        </div>
                                        
                                        <button class="btn btn-primary mt-5 mb-4 sort-btn" onclick="addItem('<?= $selectedItem['fid']; ?>')">Add Fabric</button>
                                    </div>
                                </div>
                    
                            </div>

                            <hr class="pin-divider">

                            <!-- Engagement: like, comment, share -->
                            <div class="engagement-row">

                                <button class="engage-btn" aria-label="Like (<?= $likeCount; ?> likes)">
                                    <div class="engage-icon-wrap">
                                    <span class="material-symbols-outlined">favorite</span>
                                    <span class="engage-count"><?= $likeCount; ?></span>
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
                                src="<?= SITE_URL ?>img/<?= $allCat ?>/<?= $item['fabric_img'] ?>"
                                alt="<?= $item['name'] ?: $item['category'] ?>"
                            >
    
                            <a href="<?= SITE_URL . $allCat ?>/<?=$item['fid']; ?>" class="overlay">
                                
                            </a>
    
                            <!-- Title + category overlay -->
                            <div class="card-title-overlay">
                                <div class="cat-pill"><?= $item['category'] ?></div>
                                <div><?= $item['name'] ?? '' ?></div>
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

                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="fs-3 fw-bold text-center mb-3">Select A Board</div>
                    <a onclick="addBoard('addBoard')" class="btn btn-fade fade-r">Add new</a>
                </div>

                <div id="addBoard" class="rounded-2 overflow-hidden" style="height: 0px; transition: .4s;">

                    <div class="p-2 mt-4 mb-5 bg-dark">

                        <input type="text" id="newBoardInput" class="form-control mb-3">
                        <div class="btn btn-fade w-100" onclick="addNewBoard()">Add Board</div>
                    </div>
                </div>

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
<script src="<?=SITE_URL?>js/placeorder.js"></script>
