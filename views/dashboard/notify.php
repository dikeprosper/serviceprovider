<?php require_once("./fileasset/header.php"); ?>


<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/notify.css">

<?php require_once("./fileasset/sidebar.php"); ?>


<?php
// --- Mock data (replace with real DB queries) ---

$notification_groups = [
    [
        'label' => 'Today',
        'items' => [
            [
                'id'      => 1,
                'type'    => 'escrow',
                'icon'    => 'lock',
                'title'   => 'Escrow Released',
                'body'    => 'Your payment of ₦12,500 for the Ankara Senator order has been released to Tailor Emeka.',
                'time'    => '9:14 AM',
                'read'    => false,
                'action'  => ['label' => 'View Order', 'href' => '#'],
            ],
            [
                'id'      => 2,
                'type'    => 'message',
                'icon'    => 'chat',
                'title'   => 'New Message from Tailor Amaka',
                'body'    => 'Your fabric has arrived. I\'ll start cutting tomorrow morning. Please confirm your sleeve length.',
                'time'    => '8:02 AM',
                'read'    => false,
                'action'  => ['label' => 'Reply', 'href' => '#'],
            ],
            [
                'id'      => 3,
                'type'    => 'order',
                'icon'    => 'checkroom',
                'title'   => 'Order Status Updated',
                'body'    => 'Your Lace Gown order is now in progress. Expected delivery: Nov 12.',
                'time'    => '7:30 AM',
                'read'    => false,
                'action'  => ['label' => 'Track Order', 'href' => '#'],
            ],
        ],
    ],
    [
        'label' => 'Yesterday',
        'items' => [
            [
                'id'      => 4,
                'type'    => 'referral',
                'icon'    => 'redeem',
                'title'   => 'Referral Reward Earned',
                'body'    => 'Chisom signed up with your code and completed her first order. ₦5,000 has been added to your wallet.',
                'time'    => '3:45 PM',
                'read'    => true,
                'action'  => ['label' => 'View Wallet', 'href' => '#'],
            ],
            [
                'id'      => 5,
                'type'    => 'escrow',
                'icon'    => 'lock_open',
                'title'   => 'Funds Held in Escrow',
                'body'    => '₦8,000 is now held in escrow for your Adire Kaftan order with Tailor Bayo. Funds release on delivery confirmation.',
                'time'    => '11:20 AM',
                'read'    => true,
                'action'  => null,
            ],
            [
                'id'      => 6,
                'type'    => 'message',
                'icon'    => 'chat',
                'title'   => 'New Message from Tailor Bayo',
                'body'    => 'Good afternoon! Just checking in — do you want the tie-dye pattern on the sleeves as well?',
                'time'    => '10:05 AM',
                'read'    => true,
                'action'  => ['label' => 'Reply', 'href' => '#'],
            ],
        ],
    ],
    [
        'label' => 'Earlier',
        'items' => [
            [
                'id'      => 7,
                'type'    => 'system',
                'icon'    => 'verified',
                'title'   => 'Profile Verified',
                'body'    => 'Your account has been verified. You can now place orders and access all platform features.',
                'time'    => 'Oct 24',
                'read'    => true,
                'action'  => null,
            ],
            [
                'id'      => 8,
                'type'    => 'promo',
                'icon'    => 'local_offer',
                'title'   => 'Limited Time Offer',
                'body'    => 'Get 10% off your next order this weekend. Use code WEEKEND10 at checkout. Expires Sunday.',
                'time'    => 'Oct 23',
                'read'    => true,
                'action'  => ['label' => 'Shop Now', 'href' => '#'],
            ],
            [
                'id'      => 9,
                'type'    => 'order',
                'icon'    => 'task_alt',
                'title'   => 'Order Completed',
                'body'    => 'Your Metallic Aso-Oke order has been delivered and confirmed. Please leave a review for Tailor Ngozi.',
                'time'    => 'Oct 21',
                'read'    => true,
                'action'  => ['label' => 'Leave a Review', 'href' => '#'],
            ],
        ],
    ],
];

// type → color style mapping
$type_styles = [
    'escrow'  => ['bg' => 'rgba(0,23,92,.08)',      'color' => '#00175c'],
    'message' => ['bg' => '#e0f2fe',                'color' => '#0369a1'],
    'order'   => ['bg' => '#dcfce7',                'color' => '#15803d'],
    'referral'=> ['bg' => '#fef9c3',                'color' => '#854d0e'],
    'system'  => ['bg' => 'var(--surface-container-high)', 'color' => 'var(--on-surface-variant)'],
    'promo'   => ['bg' => '#fce7f3',                'color' => '#9d174d'],
];

$unread_count = 0;
foreach ($notification_groups as $group)
    foreach ($group['items'] as $item)
        if (!$item['read']) $unread_count++;

$filters = ['All', 'Unread', 'Orders', 'Messages', 'Escrow', 'Promos'];
?>

<main class="py-5 my-5 ps-lg-4 pe-xl-2">

    <!-- ── Page header ── -->
    <div class="page-header">
        <div>
            <h1 class="page-title">
                Notifications
                <?php if ($unread_count > 0): ?>
                <span class="unread-badge"><?= $unread_count ?></span>
                <?php endif; ?>
            </h1>
            <p class="page-subtitle">
                <?php if ($unread_count > 0): ?>
                    You have <?= $unread_count ?> unread notification<?= $unread_count > 1 ? 's' : '' ?>
                <?php else: ?>
                    You're all caught up
                <?php endif; ?>
            </p>
        </div>
        <button class="btn-mark-all" id="markAllBtn">
            <span class="material-symbols-outlined">done_all</span>
            Mark all as read
        </button>
    </div>

    <!-- ── Filter chips ── -->
    <div class="filter-scroll" id="filterChips">
        <?php foreach ($filters as $i => $f): ?>
        <button class="filter-chip <?= $i === 0 ? 'active' : '' ?>"
                data-filter="<?= strtolower($f) ?>">
            <?= htmlspecialchars($f) ?>
        </button>
        <?php endforeach; ?>
    </div>

    <!-- ── Notification groups ── -->
    <div id="notifList">
        <?php foreach ($notification_groups as $group): ?>
        <div class="notif-group">
            <p class="group-label"><?= htmlspecialchars($group['label']) ?></p>

            <?php foreach ($group['items'] as $item):
                $style = $type_styles[$item['type']] ?? $type_styles['system'];
            ?>
            <div class="notif-card <?= !$item['read'] ? 'unread' : '' ?>"
                 data-type="<?= $item['type'] ?>"
                 data-read="<?= $item['read'] ? '1' : '0' ?>"
                 data-id="<?= $item['id'] ?>">

                <!-- Icon -->
                <div class="notif-icon-wrap"
                     style="background:<?= $style['bg'] ?>;">
                    <span class="material-symbols-outlined icon-filled"
                          style="color:<?= $style['color'] ?>;"><?= $item['icon'] ?></span>
                </div>

                <!-- Content -->
                <div class="notif-content">
                    <p class="notif-title"><?= htmlspecialchars($item['title']) ?></p>
                    <p class="notif-body"><?= htmlspecialchars($item['body']) ?></p>
                    <div class="notif-footer">
                        <span class="notif-time"><?= htmlspecialchars($item['time']) ?></span>
                        <?php if ($item['action']): ?>
                        <a href="<?= htmlspecialchars($item['action']['href']) ?>"
                           class="notif-action"
                           onclick="event.stopPropagation();">
                            <?= htmlspecialchars($item['action']['label']) ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right -->
                <div class="notif-right">
                    <?php if (!$item['read']): ?>
                    <div class="unread-dot"></div>
                    <?php endif; ?>
                    <button class="btn-dismiss"
                            title="Dismiss"
                            onclick="dismissNotif(this, event)">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- ── Empty state (shown when all dismissed or filtered to 0) ── -->
    <div class="empty-state" id="emptyState">
        <div class="empty-icon">
            <span class="material-symbols-outlined">notifications_off</span>
        </div>
        <h3>Nothing here</h3>
        <p>No notifications match this filter.</p>
    </div>

</main>
</div></div>

<script src="<?=SITE_URL?>js/dashboard/notify.js"></script>

<?php require_once './fileasset/footer.php'; ?>