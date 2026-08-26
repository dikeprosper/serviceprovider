<?php 
include_once './fileasset/header.php';

// clean incoming values — digits only
$s = isset($_GET['s']) ? preg_replace('/[^0-9]/', '', $_GET['s']) : null;
$f = isset($_GET['f']) ? preg_replace('/[^0-9]/', '', $_GET['f']) : null;

$validStyle  = false;
$validFabric = false;

if ($s) {
    $query  = "SELECT pid FROM products WHERE pid = ? AND p_type = '0' AND active_inspr = '1'";
    $result = $app->myQuery($query, "s", [$s]);
    $validStyle = $result && $result->num_rows > 0;
}

if ($f) {
    $query  = "SELECT pid FROM products WHERE pid = ? AND p_type = '1'";
    $result = $app->myQuery($query, "s", [$f]);
    $validFabric = $result && $result->num_rows > 0;
}

// treat invalid values same as not provided
if (!$validStyle)  $s = null;
if (!$validFabric) $f = null;

$allowAccess  = $s && $f;
$showNoStyle  = $f && !$s;
$showNoFabric = $s && !$f;
$showBoth     = !$s && !$f;
?>

<link rel="stylesheet" href="./css/providers.css">

<main class="container-xl py-3">

    <div class="py-5 my-0 my-lg-4 px-2 px-sm-4 px-md-5 px-xl-0">
        
        <div class="bg-white w-100 pt-3 pb-2 filter">

            <div class="row">

                <div class="mb-3 col-md-6 col-lg-4">
                    <input type="text" class="form-control" placeholder="Search for a tailor" id="searchInput" oninput="filterProviders()">
                </div>

                <div class="col-md-6 col-lg-4 mb-3">
    
                    <div class="position-relative pop-up-container">
                
                        <Button onclick="popup(this,'provider-toggle')" class="form-select rounded-2 px-5 py-2 fs-7 mb-0 mb-lg-3 d-flex align-items-center">
                            
                            <div class="filter-title filterIcon">
                                <span class="material-symbols-outlined">filter_list</span>
                                Filters
                            </div>
                        </button>
                    
                        <input type="text" name="" class="myToggler" id="provider-toggle">
                        <div class="pop-up2 rounded-4 p-4 overflow-auto">
                            <button id="closePop" class="btn btn-light mb-4 title rounded-2 d-lg-none">Close</button>
        
                            <div class="d-flex flex-wrap gap-3 align-items-center border-bottom pb-3">
                                
                                <div class="w-100 fs-6 fw-bold mb-3">Rating</div>
        
                                <button class="btn btn-fade rounded-3 px-3 fs-7" data-id="rating" data-value="top">Top Rated</button>
                                <button class="btn btn-fade rounded-3 px-3 fs-7" data-id="rating" data-value="new">New Providers</button>
                                <button class="btn btn-secondary rounded-3 px-3 fs-7 btn-clear" data-group="rating">Clear</button>
                            </div>
        
                            <button class="btn btn-primary mt-5 mb-4 sort-btn">Sort</button>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="row g-3" id="providers-container">

        </div>

        <!-- PAGINATION -->
        <div class="mt-5 d-flex justify-content-center gap-2 pagination-container">
            <!-- Pagination buttons will be generated dynamically by JavaScript -->
        </div>
    </div>
</main>


<?php if (!$allowAccess): ?>
    <!-- <div class="ls-overlay" id="ls-popup">
        <div class="ls-box rounded-5">

            <?php if ($showBoth): ?>
                <p class="fs-3 fw-bold">Before you select a tailor</p>
                <p class="ls-sub">Please tell us where you are with your style and fabric.</p>
                <a href="<?=SITE_URL ?>style_check" class="btn btn-fade fade-r">I have a style, but no fabric</a>
                <a href="<?=SITE_URL ?>fabrics?s=<?= $s ?>" class="btn btn-fade fade-r">I have a fabric, but no style</a>
                <a href="<?=SITE_URL ?>inspiration?s=select&f=user_provided" class="btn btn-fade fade-r" onclick="removePopup('style_check')">I already have both</a>

            <?php elseif ($showNoStyle): ?>
                <p class="fs-3 fw-bol">Almost there</p>
                <p class="ls-sub">You've selected a fabric but you're yet to pick a style.</p>
                <a href="<?=SITE_URL ?>inspiration?f=<?= $f ?>" class="btn btn-fade fade-r mb-3">Pick a style</a>

                <p class="ls-sub">Do you already have a style?. <br> Find your style category to continue.</p>
                <a href="<?=SITE_URL ?>inspiration?s=select&f=<?= $f ?>" class="btn btn-fade fade-r" onclick="removePopup('style_check')">I'll provide one</a>

            <?php elseif ($showNoFabric): ?>
                <p class="fs-3 fw-bol">Almost there</p>
                <p class="ls-sub">You've selected a style but you're yet to pick a fabric.</p>
                <a href="<?=SITE_URL ?>fabrics?s=<?= $s ?>" class="btn btn-fade fade-r">Pick a fabric</a>
                <a href="<?=SITE_URL ?>fabrics?s=<?= $s ?>&f=user_provided" class="btn btn-fade fade-r" onclick="removePopup()">I'll provide one</a>

            <?php endif; ?>

        </div>
    </div> -->
<?php endif; ?>


<?php include_once './fileasset/footer.php'; ?>

<script src="<?= SITE_URL?>/js/order.js"></script>
<script src="<?= SITE_URL?>/js/tailors.js"></script>