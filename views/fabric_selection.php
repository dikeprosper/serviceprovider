<?php include './fileasset/header.php'; 

    // Bouncer
    if (!isset($_SESSION['selected_styles'])){

        $app->setAlart('ERROR: No style selected', 'danger');
    }

    // Orders Array
    $selected           = $_SESSION['selected_styles'];
    $compatible         = array_filter(array_map('trim', explode(',', $selected['compatible'])));
    $yardsRequired      = $selected['fabrics']['yards_required'] ?? 0;


    $firstFits = [];
    $otherFits = [];

    if (empty($compatible)) {
        
        $fabrics = [];
    } else {
        // build one "?" placeholder per category
        $placeholders = implode(',', array_fill(0, count($compatible), '?'));
        $types        = str_repeat('s', count($compatible));

        $query = "SELECT * FROM fabrics WHERE category IN ($placeholders)";
        $fabrics = $app->myQuery($query, $types, $compatible);
    }

    foreach ($fabrics as $item) {

        $storeOwned             = $item['store_owned'];
        $quantity               = $item['quantity'];
        $yardsPerSale           = $item['yards_persale'];
        $pricePerSale           = $item['price_persale'];

        $ownsEnough             = $storeOwned == "true" && $quantity >= $yardsRequired; // Checks if fabric belongs to the company and if the quantity is enough
        $saleFits               = $yardsPerSale == 3 && $yardsRequired <= $yardsPerSale; // Checks if the fabric required is less than 3 yards
        
        // Setting Fabric price based on the individual yards
        if($ownsEnough || $saleFits) {

            $fabric_price = $yardsRequired * $item['price_per_yard'];
        }


        // Checks if The fabric that will remain is less than a yard
        $minimalWasteFit    = false;
        $multiple           = $yardsPerSale;
        
        // echo $multiple. "_" . $yardsRequired . "<br>";
        if ($yardsPerSale < $yardsRequired) {
            
            $fabric_price         = $pricePerSale;

            while ($yardsPerSale < $yardsRequired) {

                $multiple         += $yardsPerSale;
                $fabric_price     += $pricePerSale;
            }

        }

        $difference = $multiple - $yardsRequired;

        if ($difference <= 1) {
            $minimalWasteFit = true;
        }
            
        $item['total_yards']  = $multiple;
        $item['fab_price']    = $fabric_price;

        if ($ownsEnough || $saleFits || $minimalWasteFit) {

            $item['yards_left'] = 0;
            $firstFits[] = $item;

        } else {

            $item['yards_left'] = $difference;
            $otherFits[] = $item;
        }
    }

    // category order JS will sort by — pulled from the $compatible list built earlier
    $categoryOrder = array_values($compatible);
?>

<link rel="stylesheet" href="<?=SITE_URL?>css/inspiration.css">

<script>
    // so JS knows the intended category order without re-deriving it
    const categoryOrder = <?= json_encode($categoryOrder) ?>;
</script>


<!-- MAIN -->
<main class="py-5 my-1 my-md-5 <?=$section_padding?>">
    <div class="container-xl">

        <div class="categories pt-3">
            
            <button class="active btn btn-fade fs-7 rounded-5 text-capitalize filter-btn" data-filter-cat="all">All</button>
            <?php foreach ($compatible as $cat_list):  ?>
                <button class="btn btn-fade fs-7 rounded-5 text-capitalize filter-btn" data-filter-cat="<?=$cat_list ?>"><?=$cat_list ?></button>
            <?php endforeach;?>
                
        </div>

        <div class="">

            <?php if (!empty($firstFits)): ?>

                <h4 class="font-headline mb-3">First Fits</h4>
                <div class="">
                    <?php $app->renderFabricGrid($firstFits, 'first-fits-grid'); ?>
                </div>
                <div class="pagination-controls" id="first-fits-pagination"></div>

            <?php endif; ?>

            <br><br>

            <?php if (!empty($otherFits)): ?>

                <h4 class="font-headline" style="width: 300px">These fabrics come in bulk</h4>
                <div class="fs-6 text-muted mb-3">Extra yards are yours after your outfit is made</div>
                <div class="">
                    <?php $app->renderFabricGrid($otherFits, 'other-fits-grid'); ?>
                </div>
                <div class="pagination-controls" id="other-fits-pagination"></div>
            <?php endif; ?>

            <br><br>
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
<script src="<?=SITE_URL?>js/inspiration.js"></script>
<script src="<?=SITE_URL?>js/order.js"></script>
<script src="<?=SITE_URL?>js/fabric_selection.js"></script>
