<?php require_once("./fileasset/header.php");

// --- Mock data (replace with real DB queries) ---
$pins = [
    [
        'id'      => 1,
        'name'    => 'Architectural Ankara Gown',
        'type'    => 'Ankara',
        'tags'    => ['Premium', 'Lagos', 'Hand-woven'],
        'img'     => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCjYmhWKZvtTLVaAuZQJZBVsSGuHMq6_RXt-QO-Xny-v3WXBGbV8kg4dAPCJWWgaecRt9m523-lNXo_Rn1wHN5Bm7EG9o9V17yn7YRWcAC8IemvP59UkaNZ6YQDJquuRT6jjiqV434DlWIUIZ2PKd928wrNGzytcH6SOgDzp1TtyfqMWrdhXiBK_u8oBQ6j20XYikJLy0ZGlkfFCFwgowv5hy5LV0ZawgDEXSE8JxiOY-8cEKVy2PXbiNLoOJHDvnJz8XmHhL27mIZK',
        'img_alt' => 'Architectural Ankara Gown',
    ],
    [
        'id'      => 2,
        'name'    => 'Vintage Indigo Adire',
        'type'    => 'Adire',
        'tags'    => ['Organic', 'Abeokuta', 'Limited'],
        'img'     => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCoXaRXWqMcS7H7JXjx4BQcndiehSyeuHuluOCjG5CdeDZpSzC6CSePpyuYHKD-wyloe9jxzReCvyxvlspbikAdGbpFC7JOlm5yRSfAXA_t2wnXChZbdcBKV_YHpHQtOQIcAk0JxoNfRSeotsNi8BC2rGobFOSdNLA3fTn2x6fVroGX6-pECtG4umgb5zwsHR5IlXZXs3iARTa8x1X59EUU8FrRxTi4mFiAstZEWGbSph-TXYazhaEt19aNTrIM7Gi-aQNu_v2wKI04',
        'img_alt' => 'Vintage Indigo Adire',
    ],
    [
        'id'      => 3,
        'name'    => 'Royal Cord Lace',
        'type'    => 'Lace',
        'tags'    => ['Floral', 'Embroidery', '5-Yard'],
        'img'     => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAxFwWso3JDtKwxD4Zc7WxIkCfcZbExBdfMdHY235GpeYTSeTDshS8kYSXXqQew7tY-lXinxwRh9MtdP8RJFaI-ls3EQnnaRPyLGP6DB3Zp745PKlG0jCgjuoz7MbBNzwmShYAJVT15nYsjD8o_2cMnsQarSwytSGeQt3zotW2T9ZhMIsBeiyvnjclxCCxAqnD9j0fNkRjyJHXoBDsXdFnR_ydFO_9sZ1aSsfa3yez12Oqs7xgvQOIp5qnzdHMcMzOZV_EDIoYBjZuG',
        'img_alt' => 'Royal Cord Lace',
    ],
    [
        'id'      => 4,
        'name'    => 'Metallic Aso-Oke Swatch',
        'type'    => 'Traditional',
        'tags'    => ['Metallic', 'Loom-woven', 'Lurex'],
        'img'     => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAk6T2j9AkI2OT_3k8Nns72HXNB-76OVj7DVsqN6YEnaEMWV1heJYyI5TG6ZxYrb7JrHzBexUZTASR0LufdReYEN0KzhFOdjGXsAjf1ugu5zgtx6FfuQu32RR86LlWJ6Uiizw1_WIIYw5Qsu0lEFyfnqw_lZabXMMLh8ChmeA7G-JdMJfe62AYclD8AAFr_-Gps5wBAIY9m-cq6dp5mLp7YlL6cYbMmVur9_SUCIGWIdhmTKkDK8cFwpM42sKe-Q59c_Znp1sgNDr0f',
        'img_alt' => 'Metallic Aso-Oke Swatch',
    ],
    [
        'id'      => 5,
        'name'    => 'Premium Silk Blend',
        'type'    => 'Silk',
        'tags'    => ['Corporate', 'Breathable', 'Lightweight'],
        'img'     => null,
        'img_alt' => 'Premium Silk Blend',
    ],
];

$fabric_filters = ['All Items', 'Ankara', 'Lace', 'Linen', 'Adire', 'Silk', 'Damask'];
$style_filters  = ['All Styles', 'Gowns', 'Suits', 'Traditional', 'Corporate', 'Kaftans', 'Outerwear'];
?>

<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/pin.css">

<?php require_once("./fileasset/sidebar.php"); ?>

<main class="py-5 my-5 ps-lg-4 pe-xl-2">
    <div class="w-100">

        <!-- ── Page header ── -->
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-4 gap-3">
            <div>
                <h2 class="page-title">My Pins</h2>
                <p class="page-subtitle">A curated collection of your favorite fabrics and bespoke styles.</p>
            </div>

            <!-- Fabrics / Styles toggle -->
            <div class="toggle-wrap" id="toggleWrap">
                <div class="toggle-indicator" id="toggleIndicator"></div>
                <button class="toggle-btn active" id="fabricToggle">Fabrics</button>
                <button class="toggle-btn" id="styleToggle">Styles</button>
            </div>
        </div>

        <!-- ── Contextual filters ── -->
        <div class="filter-scroll mb-4" id="filterContainer">
            <?php foreach ($fabric_filters as $i => $f): ?>
            <button class="btn btn-fade rounded-5 fs-7 <?= $i === 0 ? 'fade-r' : '' ?>">
                <?= $f ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- ── Pin list ── -->
        <div class="d-flex flex-column gap-3" id="pinList">
            <?php foreach ($pins as $pin): ?>
                <div class="pin-item rounded-6">

                    <!-- Thumbnail -->
                    <div class="pin-thumb rounded-5">
                        <?php if ($pin['img']): ?>
                            <img src="<?= $pin['img'] ?>" alt="<?= $pin['img_alt'] ?>"/>
                        <?php else: ?>
                            <span class="material-symbols-outlined placeholder-icon">texture</span>
                        <?php endif; ?>
                    </div>

                    <!-- Info -->
                    <div class="flex-grow-1 min-width-0">
                        <!-- Name + type badge -->
                        <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                            <h3 class="pin-name"><?= $pin['name'] ?></h3>
                            <span class="pin-type-badge"><?= $pin['type'] ?></span>
                        </div>

                        <!-- Tags -->
                        <div class="d-flex gap-2 mb-3 flex-wrap">
                            <?php foreach ($pin['tags'] as $tag): ?>
                            <span class="tag-chip"><?= $tag ?></span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex gap-3 flex-wrap">
                            <button class="pin-action">
                                <span class="material-symbols-outlined">notifications_active</span>
                                Set an Alarm
                            </button>
                            <button class="pin-action">
                                <span class="material-symbols-outlined">edit_note</span>
                                Note
                            </button>
                            <button class="pin-action danger">
                                <span class="material-symbols-outlined">delete_outline</span>
                                Delete
                            </button>
                        </div>
                    </div>

                    <!-- CTA -->
                    <button class="btn btn-primary fs-7 rounded-5 px-4">View Pin</button>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>
</div></div>

<script src="<?= SITE_URL ?>js/pin.js"></script>

<?php require_once './fileasset/footer.php'; ?>