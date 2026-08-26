<?php include './fileasset/header.php'; ?>
<?php include './includes/insp_info.php'; ?>

<link rel="stylesheet" href="<?=SITE_URL?>css/inspiration.css">


<!-- MAIN -->
<main class="py-5 my-1 my-md-5 <?=$section_padding?>">
    <div class="container-xl">

        <?php if(!isset($selectedCat)): ?>

            <div class="categories pt-3">
                
                <a class="btn btn-fade fs-7 rounded-5 <?= $active_all?>" href="<?= SITE_URL . $allCat ?>">All</a>
                <?php foreach ($categories as $cat_list):  ?>
                    <a class="btn btn-fade fs-7 rounded-5 text-capitalize <?php if (isset($cat) AND $cat == $cat_list['name']){ echo "active"; } ?>" href="<?=SITE_URL ?>inspiration/<?=$cat_list['name'] ?>"><?=$cat_list['name'] ?></a>
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
                <a href="<?= SITE_URL ?>inspiration/?f=<?=$item ?> " class="btn btn-fade fade-r fs-8">Find style</a>
            </div>

        <?php endif; ?>

        <div class="">

            <?php if(isset($selectedItem['pid'])) : ?>
                <div class="pin-detail-card site-radius p-0 py-4 p-md-4 p-md-5 mb-5">

                    <div class="row gap-4">

                        <!-- LEFT: Image -->
                        <div class="d-block d-lg-none">
                            <span class="category-pill mb-1"><?= $selectedItem['category'] ?></span>
                            <h1 class="pin-title"><?= $selectedItem['name'] ?? "" ?></h1>
                        </div>

                        <div class="pin-image-box col-lg-6">
                            <img
                            src="<?= SITE_URL ?>img/<?= $allCat ?>/<?= $selectedItem['img'] ?>"
                            alt="<?= $selectedItem['name'] ?? '' ?>"
                            >
                        </div>

                        <!-- RIGHT: Details -->
                        <div class="pin-details col-lg-6">

                            <div class="">
                                <div class="d-none d-lg-block">
                                    <span class="category-pill mb-1"><?= $selectedItem['category'] ?></span>
                                    <h1 class="pin-title"><?= $selectedItem['name'] ?? "" ?></h1>
                                </div>
                                <p class="pin-desc"><?= $selectedItem['description'] ?></p>

                                <!-- Stats -->
                                <div class="stats-box rounded-4 px-1">
                                    <div class="row g-3">
                                        <div class="col-4 stat-col">
                                        <div class="stat-icon" style="background:var(--icon-green-bg);">
                                            <span class="material-symbols-outlined" style="color:var(--icon-green);">payments</span>
                                        </div>
                                        <div class="stat-label">Sewing Cost</div>
                                        <div class="stat-value"><?= $app->naira($selectedItem['price']) ?></div>
                                        <div class="stat-sub">(Fabric cost Not included)</div>
                                        </div>
                                        <div class="col-4 stat-col">
                                        <div class="stat-icon" style="background:var(--icon-blue-bg);">
                                            <span class="material-symbols-outlined" style="color:var(--icon-blue);">design_services</span>
                                        </div>
                                        <div class="stat-label">Fabric Cost</div>
                                        <div class="stat-value">Varies</div>
                                        <div class="stat-sub">(Not included)</div>
                                        </div>
                                        <div class="col-4 stat-col">
                                        <div class="stat-icon" style="background:var(--icon-purple-bg);">
                                            <span class="material-symbols-outlined" style="color:var(--icon-purple);">texture</span>
                                        </div>
                                        <div class="stat-label">Fabric Required</div>
                                        <div class="stat-value"><?= $firstValue ?> - <?= $lastValue ?> Yard's</div>
                                        <div class="stat-sub">(Varies based on size)</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Compatible fabrics -->
                                <div class="section-heading">Compatible Fabrics</div>
                                <div>
                                <?php $compatible = explode(",",$selectedItem['compatible_fabrics']); ?>
                                <?php foreach ($compatible as $fabric): ?>
                                    <span class="fabric-pill"><?= $fabric ?></span>
                                <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- CTA button -->
                            <div class="my-3">

                                <div class="position-relative pop-up-container">

                                    <div onclick="popup(this,'size-toggle')" class="btn btn-primary rounded-2 monrope px-5 py-2">
                                        <span class="material-symbols-outlined fs-6-plus me-2">content_cut</span>
                                        Use this <?= $item; ?>
                                    </div>

                                    <input type="text" name="" class="myToggler" id="size-toggle">

                                    <div class="pop-up2 rounded-4 p-4 overflow-auto">
                                        <button id="closePop" class="btn btn-light mb-4 title rounded-2 d-lg-none">Close</button>
                                        <?php if(isset($user)): ?>

                                            <div class="pb-3">
                                                
                                                
                                                <div class="w-100">
                                                    
                                                    <?php if($selectedItem['standard_sizing'] > 0){ ?>
                                                    
                                                        <div id="standard-measurement" class="measurements mb-3">
                                                            <div class="w-100 fs-6 fw-bold mb-2">Standard Measurments</div>
                                                            <select class="selectSize form-control mb-3" data-id="focusme">
                                                                <option value="">Select</option>
                                                                <?php foreach (json_decode($selectedItem['sizes_available'], true) as $key => $value): ?>
                                                                    <option> <?= $key ?> </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    <?php }?>

                                                    <div id="measurement-box" class="measurements mb-3 <?php if($selectedItem['standard_sizing'] > 0){ echo 'd-none'; } ?>">
                                                        <div class="w-100 fs-6 fw-bold mb-2">Select Measurments</div>

                                                        <select class="selectSize form-control mb-2" data-id="focusme">
                                                            <option value="">Select</option>
                                                            <?php while($m = $measurementQuery->fetch_assoc()): ?>
                                                                <option> <?= $m['label']; ?> </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                        <a href="" class="btn btn-outline-primary fs-7">add new</a>
                                                    </div>

                                                    <?php if($selectedItem['standard_sizing'] > 0){ ?>
                                                        <div class="toggle-row d-flex align-items-center pb-4">
                                                            <label class="label-bold mb-0" for="measurement-toggle" style="cursor:pointer;"> Use your measurements </label>
                                                            <span class="pill-toggle ms-3">
                                                                <input type="checkbox" id="measurement-toggle" name="has_fabric" data-id="focusme">
                                                                <label class="toggle-bg" for="measurement-toggle"></label>
                                                                <span class="toggle-dot"></span>
                                                            </span>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                                
                                                <p class="errorMsg text-danger fs-7"></p>
                                            </div>
                                            
                                            <button class="btn btn-primary mt-4 mb-4 sort-btn" onclick="addItem('<?= $selectedItem['pid']; ?>')">Change Fabric</button>
                                            <button class="btn btn-primary mt-3 sort-btn" onclick="addItem('<?= $selectedItem['pid']; ?>')">Continue With Curent Fabric</button>

                                        <?php else: ?>
                                        
                                            <div class="py-3 h-100 d-flex flex-column justify-content-center">
                                                
                                                <?php
                                                    if($selectedItem['standard_sizing'] > 0){ ?>

                                                        <div id="standard-measurement" class="measurements mb-3">
                                                            <div class="w-100 fs-6 fw-bold mb-3"> This style uses standard sizing </div>
                                                            <select class="selectSize form-control mb-2">
                                                                <option value="">Select Size</option>
                                                                <?php foreach (json_decode($selectedItem['sizes_available'], true) as $key => $value): ?>
                                                                    <option> <?= $key; ?> </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <?=$error_p; ?> <button class="btn btn-fade fade-r mt-5 mb-4 sort-btn" onclick="addItem('<?= $selectedItem['pid'] ?>')"> Continue </button>
                                                        
                                                <?php  } else { ?>

                                                    <div class="w-100 fs-6 fw-bold mb-3 text-center"> This style requires your precise measurements for a perfect fit <br> <?=$upload_m ?> </div>
                                                        
                                                <?php  } ?>

                                            </div>

                                        <?php endif; ?>

                                    </div>
                                    
                                </div>
                                <input type="hidden" id="standard" value="<?= $selectedItem['standard_sizing'] ?>">
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

                                <button class="engage-btn ms-2" aria-label="Pin (<?= $pinCount; ?> pins)">
                                    <div class="engage-icon-wrap">
                                    <span class="material-symbols-outlined" onclick="openModal('<?= $selectedItem['pid'] ?>','<?= $selectedItem['username'] ?>')" style="transform: rotate(35deg);">keep</span>
                                    <span class="engage-count"><?= $pinCount; ?></span>
                                    </div>
                                    <span class="engage-label">Pin</span>
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
                            <img src="<?= SITE_URL ?>img/<?= $allCat ?>/<?= $item['img'] ?>" alt="<?= $item['name'] ?: $item['category'] ?>">
                            <a href="<?= SITE_URL . $allCat ?>/<?=$item['pid']; ?>" class="overlay">
                            </a>
                            <!-- Pin button -->
                            <div class="pin-btn">
                                <div onclick="openModal('<?= $item['pid'] ?>','<?= $item['username'] ?>')" class="btn btn-primary">
                                    <span class="material-symbols-outlined" style="font-size:18px;">keep</span>
                                </div>
                            </div>
                            <!-- Title + category overlay -->
                            <div class="card-title-overlay">
                                <div class="fs-6"><?= $item['name'] ?? '' ?></div>
                                <div class="cat-pill fs-9 mt-1 text-light fw-lighter"><?= $app->priceRange($item['price'], $item['compatible_fabrics']) ?></div>
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