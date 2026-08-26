<?php 
if(isset($_SESSION['selected_styles'])) {

    $item = $_SESSION['selected_styles'];
    
    $pid  = htmlentities($item ['pid']) ?? null;
    $img = $item['img'] ?? null;

    $savedTime = $item['saved_at'] ?? null;

    if ($savedTime !== null && (time() - $savedTime) < 10) {

        // Item was saved less than 10 seconds ago, show an alert
        $app->setAlert("Congrats!! <br> You Just completed the first step <br> Keep Going!","success");
    
    }
}

include './fileasset/header.php';
/**
 * Place Order — "How would you like to order?"
 * StitchNG selection screen: Ready-to-Wear vs Bespoke (Style + Fabric).
 */

$page_data = [
    'eyebrow'  => 'Selection process',
    'heading'  => 'How would you like to order?',

    'ready_to_wear' => [
        'badge'       => 'Instant Fulfillment',
        'title'       => 'Get Ready to Wear',
        'description' => 'Get ready to wear and special offers from tailors within your city.',
        'image'       => SITE_URL . 'img/inspiration/img4.webp',
        'href'        => '#ready-to-wear',
    ],

    'style' => [
        'title'                 => 'Pick a Style',
        'toggle_label'          => 'Do you already have a style? <br> find the closet match in our catalogue',
        'has_style'             => false, // toggle state — flip to true to pre-check "I already have a style"
    ],

    'fabric' => [
        'title'        => 'Now let\'s pick your fabric',
        'subtitle'     => 'Style selected',
        'toggle_label' => 'I already have a fabric'
    ],

    'order' => [
        'title'        => 'Order Summary',
        'subtitle'     => 'Style selected',
        'toggle_label' => 'I already have a fabric'
    ],
];


?>

<link rel="stylesheet" href="<?= SITE_URL ?>css/order.css">

<main class="<?= $section_padding ?> pt-5 mt-5 pb-5 mb-5">
    <div class="container-xl">

        <form action="<?= SITE_URL ?>checkout" method="GET" class="row g-4">

    
            <?php if(!isset($item)): ?>
                <!-- Heading -->
                <header class="mb-4 pb-md-4">
                    <span class="mb-3 fs-6 text-primary"><?= $page_data['eyebrow'] ?></span>
                    <h1 class="mb-3 <?= $section_title_bold ?> text-primary"><?= $page_data['heading'] ?></h1>
                </header>
            <?php endif; ?>
                        
            <?php if(isset($item)): ?>

                <div id="pickTailor" class="col-lg-6 <?php if($item['fabrics']['fid'] == ""){ echo "is-hidden"; } ?>">
    
                    <div id="checkOut" class="mb-3 <?php if($item['tailors']['uid'] == ""){ echo "is-hidden"; } ?>">
                        <div class="d-flex flex-column align-items-center gap-4 max-w-3xl mx-auto">
                    
                            <!-- checkout -->
                            <div class="option-card card-hover py-4 w-100">
        
                                <p class="fs-6-plus text-primary">Proceed to finish your order</p>
                                <button class="btn btn-fade fade-r px-5">Checkout</button>
        
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column align-items-center gap-4 max-w-3xl mx-auto">
                
                        <!-- Pick a Tailor -->
                        <div class="option-card card-hover py-4 w-100">

                            <p class="fs-6-plus text-primary">Proceed to pick a tailor</p>

                            <div class="toggle-row d-flex align-items-center pb-4">
                                <label class="label-bold mb-0 fs-7" for="tailor-toggle" style="cursor:pointer;">Let us pick the best tailor for you </label>
                                <span class="pill-toggle ms-3">
                                    <input type="checkbox" id="tailor-toggle" name="pick_tailor">
                                    <label class="toggle-bg" for="tailor-toggle"></label>
                                    <span class="toggle-dot"></span>
                                </span>
                            </div>

                            <div class="d-flex" id="tailor-box">
                                <?php if($item['tailors']['uid'] != ""): ?>

                                    <div class="mb-2 itemImg position-relative overflow-hidden rounded-3">
                                        <img src="<?= SITE_URL . $item['tailors']['photo_url']; ?>" 
                                            class="w-100 h-100" 
                                            style="object-fit: cover;">
                                    </div>
                                    <div>

                                        <a href="<?= SITE_URL ?>tailors" class="pm-add fs-7 px-3 py-3 ms-3">Change tailor</a>  
                                    </div>

                                    
                                <?php else: ?>
                                        
                                    <a href="<?= SITE_URL ?>tailors" class="btn btn-fade fade-r">Pick a tailor</a>  
                                <?php endif; ?>
                            </div>
                                
                            <input type="hidden" name="selected" value="true">
                            <input type="hidden" id="tailorId" value="<?= $item['tailors']['uid'] ?? "" ?>">

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
    
                    <div class="d-flex flex-column align-items-center gap-4 max-w-3xl mx-auto">
                

                        <!-- Pick a Style -->
                        <div class="option-card card-hover w-100 p-3" id="style-box">
            
                            <div class="">
                                <!-- Pick a Fabric -->
                                <div id="fabric-box">
                                    <div class="d-flex w-100">
            
                                        <?php if($item['fabrics']['fid'] == ""): ?>
                                            <div class="d-flex align-items-center gap-3 mb-4">
            
                                                <span class="icon-badge"><span class="material-symbols-outlined">texture</span></span>
                                                <div class="">
                                                    <span class="text-muted fs-7"> <?= htmlspecialchars($page_data['fabric']['subtitle']) ?> </span>
                                                    <h2 class="headline-sm mb-0">  <?= htmlspecialchars($page_data['fabric']['title']) ?>    </h2>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                        
                                        <div class="w-100">
                                            
                                            <div class="toggle-row d-flex align-items-center pb-4">
                                                <label class="label-bold mb-0 fs-7" for="fabric-toggle" style="cursor:pointer;"> <?= htmlspecialchars($page_data['fabric']['toggle_label']) ?> </label>
                                                <span class="pill-toggle ms-3">
                                                    <input type="checkbox" id="fabric-toggle" name="has_fabric">
                                                    <label class="toggle-bg" for="fabric-toggle"></label>
                                                    <span class="toggle-dot"></span>
                                                </span>
                                            </div>
                            
                                            <div id="img_box" class="d-block d-flex">
        
                                                <?php if($item['fabrics']['fid'] != ""): ?>
                    
                                                    <div class="">
                                                        <div class="mb-2 itemImg position-relative overflow-hidden rounded-3">
                                                            <img src="<?= SITE_URL ?>img/fabrics/<?= $item['fabrics']['fabric_img'] ?? "placeholder.webp" ?>" 
                                                                class="w-100 h-100" 
                                                                style="object-fit: cover;">
                                                        </div>
                                                    
                                                    </div>
            
                                                    <div class="ps-4 w-100">
        
                                                        <div class="d-sm-flex justify-content-between border-bottom py-2 w-100">
                                                            <div class="w-sm-50 fs-8 d-none d-sm-block">
                                                                <span class="fs-6 material-symbols-outlined">dresser</span>
                                                                Fabric: 
                                                            </div>
                                                            <span class="w-sm-50 fs-8"><?= $item['fabrics']['name']; ?></span>
                                                        </div>
        
                                                        <div class="d-sm-flex justify-content-between border-bottom py-2 w-100">
                                                            <div class="w-sm-50 fs-8 d-none d-sm-block">
                                                                <span class="fs-6 material-symbols-outlined">texture</span>
                                                                Left over:
                                                            </div>
                                                            <span class="w-sm-50 fs-8"><?= $item['fabrics']['yards_left'] ?> Yards Left</span>
                                                        </div>
                                                        <div class="d-sm-flex justify-content-between border-bottom py-2 w-100">
                                                            <div class="w-sm-50 fs-8 d-none d-sm-block">
                                                                <span class="fs-6 material-symbols-outlined">texture</span>
                                                                Total fabric:
                                                            </div>
                                                            <span class="w-sm-50 fs-8"><?= $item['fabrics']['total_yards'] ?> yards in total</span>
                                                        </div>
                                                        <div class="d-sm-flex justify-content-between border-bottom py-2 w-100">
                                                            <div class="w-sm-50 fs-8 d-none d-sm-block">
                                                                <span class="fs-6 material-symbols-outlined">texture</span>
                                                                Price:
                                                            </div>
                                                            <span class="w-sm-50 fs-8"><?= $item['fabrics']['price'] ?></span>
                                                        </div>
                                                        <div class="mt-2">
        
                                                            <a href="<?= SITE_URL ?>fabric_selection" class="pm-add fs-8 py-1" style="width: 100px;">
                                                                Change Fabric
                                                            </a>
        
                                                        </div>
                    
                                                    </div>
                                                <?php else: ?>
                                                        
                                                    <div class="d-flex">
                                                        <a href="<?= SITE_URL ?>fabric_selection" class="pm-add" style="width: 250px; height: 80px;">
                                                            <span class="material-symbols-outlined">add</span>
                                                            Add Fabric
                                                        </a>
                                                    </div>
                                                    
                                                <?php endif; ?>
                                                <input type="hidden" id="fabricId" value="<?= $item['fabrics']['fid'] ?? "" ?>">
                                            </div>
                                        </div>

                                    </div>
            
                                </div>
                            </div>

                            <div class="">
    
                                <div class="mb-3">
        
                                    <?php if(!isset($item)): ?>
                                        <div class="d-flex align-items-center gap-3 mb-4">
                                            <span class="icon-badge"><span class="material-symbols-outlined">style</span></span>
                                            <h2 class="headline-sm mb-0"><?= $page_data['style']['title'] ?></h2>
                                        </div>
                                        <a href="<?= SITE_URL ?>inspiration" class="monrope text-dark small-banner mb-0">
                                            <label class="label-bold mb-0 fs-7 fs-7" for="style-toggle" style="cursor:pointer;"><?= $page_data['style']['toggle_label']; ?></label>
                                            <span class="material-symbols-outlined text-white bg-dark rounded-5 p-2">chevron_forward</span>
                                        </a>
                                    <?php endif; ?>
        
                                </div>
        
                                <div class="selectedItem">
        
                                    <?php if(isset($item)): ?>
            
                                        <div class="d-flex">
                                            <div class="">
                                                <div class="itemImg position-relative overflow-hidden rounded-3">
                                                    <img src="<?= SITE_URL ?>img/inspiration/<?= $item['img'] ?>" 
                                                        class="w-100 h-100" 
                                                        style="object-fit: cover;">
                                                </div>
                                            </div>
                                        
                                            <div class="w-100 ps-4">
        
                                                <div class="d-sm-flex justify-content-between border-bottom py-2">
                                                    <div class="w-sm-50 fs-8 d-none d-sm-block">
                                                        <span class="fs-6 material-symbols-outlined">dresser</span>
                                                        Style: 
                                                    </div>
                                                    <span class="w-sm-50 fs-8"><?= $item['close_match']; ?></span>
                                                </div>
        
                                                <div class="d-sm-flex justify-content-between border-bottom py-2">
                                                    <div class="w-sm-50 fs-8 d-none d-sm-block">
                                                        <span class="fs-6 material-symbols-outlined">texture</span>
                                                        Fabric Required:
                                                    </div>
                                                    <span class="w-sm-50 fs-8"><?= $item['fabrics']['yards_required'] ?? '0' ?> Yard<?=($item['fab_num'] == 1 ? '' : 's');?></span>
                                                </div>
        
                                                <div class="d-sm-flex justify-content-between border-bottom py-2">
                                                    <div class="w-sm-50 fs-8 d-none d-sm-block">
                                                        <span class="fs-6 material-symbols-outlined">measuring_tape</span>
                                                        Size:
                                                    </div>
                                                    <span class="w-sm-50 fs-8"> <?= $item['size']; ?> </span>
                                                </div>
            
                                            </div>
                                        </div>    
            
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>

            <?php endif; ?>

            <?php if(!isset($item)): ?>
                <!-- Option 1: Ready to Wear -->
                <a href="<?= SITE_URL . 'offers' ?>" class="text-decoration-none" style="max-width: 430px;">
                    <div class="rtw-card card-hover w-100">
                        <img class="rtw-img" src="<?= htmlspecialchars($page_data['ready_to_wear']['image']) ?>" alt="<?= htmlspecialchars($page_data['ready_to_wear']['title']) ?>">
                        <div class="rtw-overlay"></div>
        
                        <div class="rtw-badge m-3 m-md-4 fs-8"><?= htmlspecialchars($page_data['ready_to_wear']['badge']) ?></div>
        
                        <div class="position-absolute bottom-0 start-0 w-100 p-3 p-md-4">
                            <div class="d-flex justify-content-between align-items-end">
                                <div>
                                    <h2 class="headline-sm fs-3 text-white mb-2"><?= htmlspecialchars($page_data['ready_to_wear']['title']) ?></h2>
                                    <p class="monrope text-white-50 mb-0 fs-6" style="max-width: 27rem;"><?= htmlspecialchars($page_data['ready_to_wear']['description']) ?></p>
                                </div>
                                <button type="button" class="rtw-arrow-btn flex-shrink-0">
                                    <span class="material-symbols-outlined fs-5">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endif; ?>
        </form>
    </div>
</main>

<script src="<?= SITE_URL ?>js/order.js"></script>

<?php include './fileasset/footer.php'; ?>