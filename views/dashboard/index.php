<?php require_once("./fileasset/header.php");

// Profile


$measurement_sets = [
    [
        'key'   => 'my',
        'title' => 'My measurements',
        'icon'  => 'person',
        'items' => [
            ['label' => 'Chest',     'value' => '42', 'unit' => 'in'],
            ['label' => 'Waist',     'value' => '34', 'unit' => 'in'],
            ['label' => 'Hips',      'value' => '40', 'unit' => 'in'],
            ['label' => 'Shoulder',  'value' => '18', 'unit' => 'in'],
            ['label' => 'Sleeve',    'value' => '25', 'unit' => 'in'],
            ['label' => 'Inseam',    'value' => '30', 'unit' => 'in'],
            ['label' => 'Neck',      'value' => '15', 'unit' => 'in'],
            ['label' => 'Thigh',     'value' => '22', 'unit' => 'in'],
            ['label' => 'Knee',      'value' => '16', 'unit' => 'in'],
            ['label' => 'Ankle',     'value' => '13', 'unit' => 'in'],
            ['label' => 'Length',    'value' => '60', 'unit' => 'in'],
            ['label' => 'Back',      'value' => '17', 'unit' => 'in'],
        ],
    ],
    [
        'key'   => 'sera',
        'title' => 'Sera measurements',
        'icon'  => 'person_3',
        'items' => [
            ['label' => 'Chest',     'value' => '36', 'unit' => 'in'],
            ['label' => 'Waist',     'value' => '28', 'unit' => 'in'],
            ['label' => 'Hips',      'value' => '38', 'unit' => 'in'],
            ['label' => 'Shoulder',  'value' => '15', 'unit' => 'in'],
            ['label' => 'Sleeve',    'value' => '22', 'unit' => 'in'],
            ['label' => 'Inseam',    'value' => '28', 'unit' => 'in'],
            ['label' => 'Neck',      'value' => '13', 'unit' => 'in'],
            ['label' => 'Thigh',     'value' => '20', 'unit' => 'in'],
            ['label' => 'Knee',      'value' => '14', 'unit' => 'in'],
            ['label' => 'Ankle',     'value' => '11', 'unit' => 'in'],
            ['label' => 'Length',    'value' => '56', 'unit' => 'in'],
            ['label' => 'Back',      'value' => '15', 'unit' => 'in'],
        ],
    ],
];

// How many rows to show in the preview box before "View all"
$preview_count = 5;

// History
date_default_timezone_set("Africa/Lagos");
// normalize everything to midnight (very important)
$today = strtotime("today");
$tomorrow = strtotime("tomorrow");
$yesterday = strtotime("yesterday");
$history = [
    [
        'style'  => 'Math cross patterned ankara',
        'name'    => 'Jenkins',
        'status'  => 'cancelled',
        'date'    => strtotime("today -8 days"),
        'location'=> 'North Hill Site',
        'style'   => 'img5.webp',
    ],
    [
        'style'   => 'Mixed color vintage',
        'name'     => 'Thompson',
        'status'   => 'completed',
        'date'     => strtotime("today -5 days"),
        'location' => 'Virtual Session',
        'style'    => 'img12.webp',
    ],
    [
        'style'   => 'Mixed color vintage',
        'name'     => 'Thompson',
        'status'   => 'completed',
        'date'     => strtotime("today -1 days"),
        'location' => 'Virtual Session',
        'style'    => 'img12.webp',
    ],
]; 



?>

<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/overview.css">

<?php require_once("./fileasset/sidebar.php"); ?>

    <main class="py-5 my-5 ps-lg-4 pe-xl-2">

        <div class="pb-4 mb-md-2">
            <!-- ══ PROFILE CARD ══ -->
            <div class="profile-card site-radius shadow-md">

                <!-- Top row: avatar + info + action buttons -->
                <div class="d-flex align-items-center gap-3 flex-wrap">

                    <!-- Avatar -->
                    <img
                        src="<?= SITE_URL . "img/profile/" . $user['photo_url'] ?>"
                        alt="<?= $user['name'] ?>"
                        class="profile-avatar"
                    />

                    <!-- Name / username / meta -->
                    <div class="flex-grow-1">
                        <p class="profile-username"><?= $user['username'] ?></p>
                        <p class="profile-name"><?= $user['name'] ?></p>
                        <div class="profile-meta">
                            <span class="profile-meta-item">
                                <span class="ms">mail</span>
                                <?= $user['email'] ?>
                            </span>
                            <span class="profile-meta-item">
                                <span class="ms">phone</span>
                                <?= $user['phone'] ?>
                            </span>
                            <span class="profile-meta-item">
                                <span class="ms">location_on</span>
                                <?= $user['location_area'] ?>
                            </span>
                        </div>
                    </div>

                    <!-- Action buttons -->
                    <div class="d-flex gap-2 flex-shrink-0 flex-wrap">

                        <button class="btn btn-fade fs-7">
                            <span class="ms fs-7">grid_view</span> View portfolio
                        </button>

                        <button class="btn btn-fade fade-r fs-7">
                            <span class="ms fs-7">edit</span> Edit information
                        </button>

                    </div>

                </div>

                <hr class="profile-divider"/>

                <div>

                    <!-- ══ MEASUREMENTS SECTION ══ -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <p class="meas-section-label">
                            <span class="ms">straighten</span> My measurements
                        </p>
                    </div>

                    <div class="row g-3">
                        <?php foreach ($measurement_sets as $set): ?>
                        <div class="col-12 col-md-6">
                            <div class="meas-box">

                                <!-- Box title -->
                                <div class="meas-box-title">
                                    <span class="ms filled"><?= htmlspecialchars($set['icon']) ?></span>
                                    <?= htmlspecialchars($set['title']) ?>
                                </div>

                                <!-- Preview rows -->
                                <?php foreach (array_slice($set['items'], 0, $preview_count) as $item): ?>
                                <div class="meas-row">
                                    <span class="meas-row-label"><?= htmlspecialchars($item['label']) ?></span>
                                    <span class="meas-row-value">
                                        <?= htmlspecialchars($item['value']) ?>
                                        <span class="meas-row-unit"><?= htmlspecialchars($item['unit']) ?></span>
                                    </span>
                                </div>
                                <?php endforeach; ?>

                                <!-- View all button -->
                                <button
                                    class="btn-view-all"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modal-<?= htmlspecialchars($set['key']) ?>"
                                >
                                    View all <span class="ms">arrow_forward</span>
                                </button>

                            </div>
                        </div>

                        <!-- ── Modal for this measurement set ── -->
                        <div
                            class="modal fade"
                            id="modal-<?= htmlspecialchars($set['key']) ?>"
                            tabindex="-1"
                            aria-labelledby="modal-label-<?= htmlspecialchars($set['key']) ?>"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 460px;">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-label-<?= htmlspecialchars($set['key']) ?>">
                                            <span class="ms filled me-2" style="color:var(--primary-color); font-size:1rem;"><?= htmlspecialchars($set['icon']) ?></span>
                                            <?= htmlspecialchars($set['title']) ?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row g-2">
                                            <?php foreach ($set['items'] as $item): ?>
                                            <div class="col-6">
                                                <div class="modal-meas-card">
                                                    <div>
                                                        <div class="modal-meas-label"><?= htmlspecialchars($item['label']) ?></div>
                                                        <div>
                                                            <span class="modal-meas-value"><?= htmlspecialchars($item['value']) ?></span>
                                                            <span class="modal-meas-unit"><?= htmlspecialchars($item['unit']) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-meas-icon">
                                                        <span class="ms filled">straighten</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn-done" data-bs-dismiss="modal">
                                            <span class="ms">check</span> Done
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- /measurements section -->
                </div>

            </div><!-- /profile-card -->
        </div>

        <!-- ══ MEASUREMENTS MODAL ══ -->
        <div class="modal fade" id="measurementsModal" tabindex="-1" aria-labelledby="measurementsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 480px;">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="measurementsModalLabel">
                            <span class="ms me-2" style="color:var(--primary); font-size:1.1rem; vertical-align:middle;">straighten</span>
                            My measurements
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-2">
                            <?php foreach ($measurements_full as $m): ?>
                            <div class="col-6">
                                <div class="meas-modal-card">
                                    <div>
                                        <div class="meas-modal-label"><?= htmlspecialchars($m['label']) ?></div>
                                        <div>
                                            <span class="meas-modal-value"><?= htmlspecialchars($m['value']) ?></span>
                                            <span class="meas-modal-unit"><?= htmlspecialchars($m['unit']) ?></span>
                                        </div>
                                    </div>
                                    <div class="meas-modal-icon">
                                        <span class="ms filled">straighten</span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn-primary-custom w-100 justify-content-center"
                            data-bs-dismiss="modal"
                        >
                            <span class="ms" style="font-size:15px;">check</span> Done
                        </button>
                    </div>

                </div>
            </div>
        </div>


        <div class="pb-4 mb-md-2">

            <h2 class="fs-5 fw-bolder mb-3">Quick Stats</h2>
            <div class="row g-3">
                <div class="col-6 col-md-4">
                    <a href="" class="shadow-md anchorBox box1 rounded-4 p-3 bg-white d-flex align-items-center">
                        <div class="icon rounded-3 p-3">
                            <span class="material-symbols-outlined fs-4">event_available</span>
                        </div>
                        <div class="txt ps-2">
                            <div class="head fs-9">
                                ACTIVE ORDERS
                            </div>
                            <div class="count fs-5">
                                03
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4">
                    <a href="" class="shadow-md anchorBox box2 rounded-4 p-3 bg-white d-flex align-items-center">
                        <div class="icon rounded-3 p-3">
                            <span class="material-symbols-outlined fs-4" style="transform: rotate(25deg)">keep</span>
                        </div>
                        <div class="txt ps-2">
                            <div class="head fs-9">
                                SAVED PIN
                            </div>
                            <div class="count fs-5">
                                14
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="" class="shadow-md anchorBox box3 rounded-4 p-3 bg-white d-flex align-items-center">
                        <div class="icon rounded-3 p-3">
                            <span class="material-symbols-outlined fs-4">payments</span>
                        </div>
                        <div class="txt ps-2">
                            <div class="head fs-9">
                                WALLET / CREDITS
                            </div>
                            <div class="count fs-5">
                                ₦100,240
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <div class="history pb-4 mb-md-2">

            <div class="d-flex justify-content-between">
                <h2 class="fs-5 fw-bolder mb-3">Order History</h2>
                <a href="" class="text-primary fs-6">View all</a>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Style</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php foreach($history as $item):?>
                            <tr>
                                <td>
                                    <div class="img">
                                        <img src="<?= SITE_URL . "img/inspiration/" . $item['style'] ?>" alt="">
                                    </div>
                                    <div class="fs-7">
                                        Tailor: <?= $item['name'] ?>
                                    </div>
                                </td>

                                <td>
                                    <?php
                                        $time = $item['date'];
                                        $today = strtotime("today");
                                        $target = strtotime(date("Y-m-d", $time));
                                        $days = (int)(($target - $today) / 86400);

                                        if ($days == -1) {

                                            echo "Yesterday";

                                        } elseif ($days > 1) {

                                            echo $days . " days left";

                                        } else {

                                            echo abs($days) . " days ago";

                                        }
                                    ?>
                                 </td>
                                <td> <span class="status <?= $item['status'] ?>"><?= $item['status'] ?></span> </td>
                                <td>
                                    <a href="" class="text-primary btn btn-light fw-bolder py-1 px-3 rounded-5 fs-7">invoice</a> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                
                    </tbody>
                </table>
            </div>
        </div>

        <div class="recommended pb-4 mb-md-2">

            <div class="d-flex justify-content-between">
                <h2 class="fs-5 fw-bolder mb-3">Recommended for you</h2>
            </div>
        </div>
    </main>
</div>
</div>

<?php require_once './fileasset/footer.php'; ?>