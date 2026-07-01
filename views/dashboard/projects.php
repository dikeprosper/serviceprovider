
<?php require_once("./fileasset/header.php");

// Sample data — replace with your DB queries
$active_count = 3;
$bookings = [
    [
        'name'    => 'Sarah Jenkins',
        'fabric'    => 'Math cross patterned ankara',
        'status'  => 'on_the_way',
        'date'    => date("Y-M-d", strtotime("+4 days")),
        'location' => 'North Hill Site',
        'style'  => 'img5.webp',
    ],
    [
        'name'    => 'Mark Thompson',
        'fabric'    => 'Mixed color vintage',
        'status'  => 'in_progress',
        'date'    => date("Y-M-d", strtotime("+6 days")),
        'location' => 'Virtual Session',
        'style'  => 'img12.webp',
    ],
    [
        'name'    => 'Elena Rodriguez',
        'fabric'    => 'Tie die linen and lace',
        'status'  => 'confirmed',
        'date'    => date("Y-M-d", strtotime("+1 days")),
        'location' => 'Studio 4B',
        'style'  => 'img20.webp',
    ],
];

// Status badge helper
function status_badge(string $status): string {
    return match($status) {
        'on_the_way'  => '<span class="badge-status badge-onway"><i class="bi bi-car-front-fill me-1"></i>On the way</span>',
        'in_progress' => '<span class="badge-status badge-inprog"><i class="bi bi-arrow-repeat me-1"></i>In progress</span>',
        'confirmed'   => '<span class="badge-status badge-confirmed"><i class="bi bi-check-circle-fill me-1"></i>Confirmed</span>',
        default       => '',
    };
}


// HISTORY SECTION 
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

<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/projects.css">
<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/overview.css">

<?php require_once("./fileasset/sidebar.php"); ?>

    <main class="py-5 my-5 ps-lg-4 pe-xl-2">

        <section class="projects pb-5 mb-md-3">
            <!-- header -->
            <div class="mb-5 d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
                <div>
                    <p class="page-label mb-0">Projects</p>
                    <h1 class="page-title mb-0">Current ongoing jobs</h1>
                </div>
                <div>
                    <span class="active-pill">
                        <span class="dot"></span>
                        <?= $active_count ?> Active Projects
                    </span>
                </div>
            </div>

            <!-- Booking cards -->
            <div class="d-flex flex-column gap-4">
                <?php foreach ($bookings as $b): ?>
                <div class="booking-card">
                    <div class="d-flex flex-column flex-md-row gap-4 align-items-start align-items-md-center">

                        <!-- Status badge (top-right on md+, inline on mobile) -->
                        <div class="d-md-none mb-1">
                            <?= status_badge($b['status']) ?>
                        </div>

                        <!-- Avatar -->
                        <div class="style-wrap">
                            <img src="<?= SITE_URL . "img/inspiration/" . $b['style'] ?>"
                                alt="<?= $b['name'] ?>">
                            <div class="avatar-verified">
                                <i class="bi bi-check"></i>
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="flex-grow-1">
                            <!-- Badge on desktop -->
                            <div class="d-none d-md-flex justify-content-end mb-n4">
                                <?= status_badge($b['status']) ?>
                            </div>

                            <h3 class="fw-bold fs-5 mb-1">Dress by: <?= $b['name'] ?></h3>
                            <p class="mb-2" style="font-size:13px; color:var(--on-surface-var);">
                                Fabric: <?= $b['fabric'] ?>
                            </p>

                            <div class="d-flex flex-wrap gap-3">
                                <span class="meta-item">
                                    <span class="material-symbols-outlined me-1">Nest_Clock_Farsight_Analog</span> <?= $b['date'] ?>
                                </span>

                                <span class="meta-item">
                                    <span class="material-symbols-outlined me-1">location_on</span>Pick up: <?= $b['location'] ?>
                                </span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex flex-row flex-md-column gap-2 flex-wrap">
                            <a href="" class="btn btn-fade">
                                <span class="material-symbols-outlined">chat</span> Chat with Tailor
                            </a>
                            <a href="" class="btn btn-fade fade-r">
                                <span class="material-symbols-outlined">Assistant_Navigation</span> Track Progress
                            </a>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="history pb-4 mb-md-2">

            <!-- header -->
            <div class="mb-5 d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
                <div>
                    <p class="page-label mb-0">Projects</p>
                    <h1 class="page-title mb-0">Job History</h1>
                </div>
                <div>
                    <a href="" class="text-primary fs-6">View all</a>
                </div>
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
        </section>

    </main>
</div>
</div>

<?php require_once './fileasset/footer.php'; ?>