<?php require_once("./fileasset/header.php");

// ─── Token / Config
$provider_reward = 1500;   // ₦ flat, one-time on first job
$customer_reward = 1500;   // ₦ flat, one-time on first booking

// ─── Summary Stats
$stats = [
    'total_earnings'   => 452500.00,
    'pending_rewards'  => 18000.00,
    'paid_rewards'     => 434500.00,
    'payout_days'      => 3,
];

// ─── Referred Providers
$referred_providers = [
    [
        'name'       => 'Engr. Kolawole Ade',
        'specialty'  => 'Structural Design',
        'avatar'     => 'three.webp',
        'status'     => 'Active',       // Active | Pending | Near Cap
        'rewarded'   => true,           // true = ₦1,500 already paid out
        'first_job'  => true,
    ],
    [
        'name'       => 'Sara Ibrahim',
        'specialty'  => 'Interior Architecture',
        'avatar'     => 'seven.webp',
        'status'     => 'Active',
        'rewarded'   => true,
        'first_job'  => true,
    ],
    [
        'name'       => 'Chioma Uzor',
        'specialty'  => 'Landscape Designer',
        'avatar'     => 'nine.webp',
        'status'     => 'Pending',
        'rewarded'   => false,
        'first_job'  => false,
    ],
];

// ─── Referred Customers
$referred_customers = [
    [
        'name'          => 'John Doe',
        'spent'         => 3200,
        'threshold'     => 5000,
        'rewarded'      => false,
        'first_booking' => false,
    ],
];

function status_badge(string $status): string {
    $map = [
        'Active'  => ['bg-success bg-opacity-10 text-success',   'Active'],
        'Pending' => ['bg-warning bg-opacity-10 text-warning',   'Pending'],
        'Near Cap'=> ['bg-danger  bg-opacity-10 text-danger',    'Near Cap'],
    ];
    [$cls, $label] = $map[$status] ?? ['bg-secondary bg-opacity-10 text-secondary', $status];
    return "<span class=\"badge rounded-pill fw-bold $cls\">$label</span>";
}
?>


<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/referrals.css">

<?php require_once("./fileasset/sidebar.php"); ?>


<!-- ════════════════════════════════════════════════════
     MAIN CONTENT  (ml-72 equivalent via ms-auto + sidebar assumed)
═════════════════════════════════════════════════════ -->
<main class="py-5 my-5 ps-lg-4 pe-xl-2">
<div class="d-flex flex-column gap-5" style="max-width:1100px;">

    <!-- ── Financial Summary -->
    <section>
        <div class="row g-4">

            <!-- Total Earnings -->
            <div class="col-12 col-md-4">
                <div class="stat-card">
                    <p class="stat-label d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings:'FILL' 1;font-size:1rem;">account_balance_wallet</span>
                        Total Earnings
                    </p>
                    <p class="stat-value"><?= $app->naira($stats['total_earnings']) ?></p>
                    <span class="stat-badge">+12% this month</span>
                </div>
            </div>

            <!-- Pending Rewards -->
            <div class="col-12 col-md-4">
                <div class="stat-card">
                    <p class="stat-label d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;font-size:1rem;color:#611e00;">pending</span>
                        Pending Rewards
                    </p>
                    <p class="stat-value"><?= $app->naira($stats['pending_rewards']) ?></p>
                    <p class="mt-3 mb-0" style="font-size:.8rem;color:var(--clr-muted);">
                        Next payout in <?= $stats['payout_days'] ?> days
                    </p>
                </div>
            </div>

            <!-- Paid Rewards -->
            <div class="col-12 col-md-4">
                <div class="stat-card">
                    <p class="stat-label d-flex align-items-center gap-2">
                        <span class="material-symbols-outlined text-success" style="font-variation-settings:'FILL' 1;font-size:1rem;">check_circle</span>
                        Paid Rewards
                    </p>
                    <p class="stat-value"><?= $app->naira($stats['paid_rewards']) ?></p>
                    <button class="btn btn-link p-0 mt-3 fw-bold" style="font-size:.8rem;color:var(--clr-primary);">View History</button>
                </div>
            </div>

        </div>
    </section>

    <!-- ── Referral Tabs───── -->
    <section>
        <!-- ══ PROVIDERS TAB ══ -->
        <div id="panel-providers" class="d-flex flex-column gap-4">

            <!-- Hero banner -->
            <div class="referral-hero">
                <span class="material-symbols-outlined hero-icon-bg" style="font-variation-settings:'wght' 700;">monetization_on</span>
                <div class="row align-items-center g-4 position-relative" style="z-index:1;">
                    <div class="col-12 col-lg-8">
                        <h4 class="font-headline fw-bold mb-3" style="font-size:1.4rem;">
                            Earn <?= $app->naira($provider_reward) ?> When Your Referred Provider Completes Their First Job
                        </h4>
                        <p style="margin-bottom:1.5rem;max-width:500px;font-size:.95rem;">
                            Help professional architects, designers, and builders join the platform.
                            You earn a flat <?= $app->naira($provider_reward) ?> — one time — as soon as they wrap up their first job.
                        </p>
                        <div class="copy-box">
                            <code><?= SITE_URL . $user['username']; ?></code>
                            <button class="copy-btn" onclick="copyLink(this, '<?= $referral_base . $referral_code ?>')">
                                <span class="material-symbols-outlined" style="font-size:.9rem;">content_copy</span>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Providers table -->
            <div class="data-card">
                <div class="d-flex justify-content-between align-items-center px-4 py-3"
                     style="border-bottom:1px solid rgba(196,197,213,.15);">
                    <h5 class="mb-0 fw-bold">
                        Referred Users
                        <span class="badge rounded-pill ms-2 fw-bold"
                              style="background:var(--clr-primary-light);color:var(--clr-primary);font-size:.75rem;">
                            <?= count($referred_providers) ?>
                        </span>
                    </h5>
                    <div class="d-flex align-items-center gap-1 px-3 py-1 rounded-pill fw-bold"
                         style="font-size:.75rem;background:var(--clr-surface-low);color:var(--clr-muted);">
                        <span class="material-symbols-outlined" style="font-size:.9rem;">info</span>
                        <?= $app->naira($provider_reward) ?> reward per refferal
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0 data-card">
                        <thead>
                            <tr>
                                <th>Provider</th>
                                <th class="text-end">First Job</th>
                                <th class="text-center">Your Reward</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($referred_providers as $p): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="<?= SITE_URL . "img/profile/" . $p['avatar'] ?>"
                                             alt="<?= $p['name'] ?>"
                                             class="rounded-circle object-fit-cover"
                                             width="36" height="36"/>
                                        <div>
                                            <p class="mb-0 fw-bold"><?= $p['name'] ?></p>
                                            <p class="mb-0" style="font-size:.78rem;color:var(--clr-muted);"><?= $p['specialty'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end fw-semibold" style="color:var(--clr-secondary-text);">
                                    <?= $p['first_job'] ? '<span class="text-success fw-bold">Completed</span>' : '<span style="color:var(--clr-muted);">Not yet</span>' ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['rewarded']): ?>
                                        <span class="reward-pill earned">
                                            <span class="material-symbols-outlined" style="font-size:.85rem;font-variation-settings:'FILL' 1;">check_circle</span>
                                            <?= $app->naira($provider_reward) ?> Earned
                                        </span>
                                    <?php else: ?>
                                        <span class="reward-pill pending">
                                            <span class="material-symbols-outlined" style="font-size:.85rem;">hourglass_top</span>
                                            Awaiting 1st Job
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?= status_badge($p['status']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /providers panel -->

        <!-- ══ CUSTOMERS TAB ══ -->
        <div id="panel-customers" class="d-flex flex-column gap-4" style="display:none!important;">

            <!-- Hero banner -->
            <div class="referral-hero">
                <span class="material-symbols-outlined hero-icon-bg" style="font-variation-settings:'wght' 700;">group</span>
                <div class="row align-items-center g-4 position-relative" style="z-index:1;">
                    <div class="col-12 col-lg-8">
                        <h4 class="font-headline fw-bold mb-3" style="font-size:1.4rem;">
                            Earn <?= $app->naira($customer_reward) ?> When Your Referred Customer Completes Their First Booking
                        </h4>
                        <p style="color:rgba(255,255,255,.8);margin-bottom:1.5rem;max-width:500px;font-size:.95rem;">
                            Refer a homeowner or business. They get <?= $app->naira(1000) ?> off their first booking,
                            and you earn a flat <?= $app->naira($customer_reward) ?> as soon as their first booking is complete.
                        </p>
                        <div class="copy-box">
                            <code><?= $referral_base . $referral_code ?></code>
                            <button class="copy-btn" onclick="copyLink(this, '<?= $referral_base . $referral_code ?>')">
                                <span class="material-symbols-outlined" style="font-size:.9rem;">content_copy</span>
                                Copy Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customers table / progress -->
            <div class="data-card">
                <div class="px-4 py-3" style="border-bottom:1px solid rgba(196,197,213,.15);">
                    <h5 class="mb-0 fw-bold">
                        Referred Customers
                        <span class="badge rounded-pill ms-2 fw-bold"
                              style="background:var(--clr-primary-light);color:var(--clr-primary);font-size:.75rem;">
                            <?= count($referred_customers) ?>
                        </span>
                    </h5>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0 data-card">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th class="text-end">First Booking</th>
                                <th class="text-center">Your Reward</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($referred_customers as $c):
                                $pct = min(100, round(($c['spent'] / $c['threshold']) * 100));
                            ?>
                            <tr>
                                <td>
                                    <p class="mb-1 fw-bold"><?= $c['name'] ?></p>
                                    <div class="d-flex justify-content-between mb-1" style="font-size:.78rem;">
                                        <span style="color:var(--clr-muted);">Booking progress</span>
                                        <span class="fw-bold" style="color:var(--clr-primary);">
                                            <?= $app->naira($c['spent']) ?> / <?= $app->naira($c['threshold']) ?>
                                        </span>
                                    </div>
                                    <div class="progress-thin">
                                        <div class="progress-bar" style="width:<?= $pct ?>%;"></div>
                                    </div>
                                </td>
                                <td class="text-end fw-semibold" style="color:var(--clr-secondary-text);">
                                    <?= $c['first_booking'] ? '<span class="text-success fw-bold">Completed</span>' : '<span style="color:var(--clr-muted);">In progress</span>' ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($c['rewarded']): ?>
                                        <span class="reward-pill earned">
                                            <span class="material-symbols-outlined" style="font-size:.85rem;font-variation-settings:'FILL' 1;">check_circle</span>
                                            <?= $app->naira($customer_reward) ?> Earned
                                        </span>
                                    <?php else: ?>
                                        <span class="reward-pill pending">
                                            <span class="material-symbols-outlined" style="font-size:.85rem;">hourglass_top</span>
                                            Awaiting 1st Booking
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div><!-- /customers panel -->

    </section>

    <!-- ── Bottom Panels───── -->
    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <div class="bottom-panel">
                <h5 class="fw-bold font-headline mb-3 d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined" style="color:var(--clr-primary);">redeem</span>
                    How Your Rewards Work
                </h5>
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background:var(--clr-surface-low);">
                            <p class="fw-bold mb-1 d-flex align-items-center gap-2" style="font-size:.9rem;">
                                <span class="material-symbols-outlined text-primary" style="font-size:1rem;font-variation-settings:'FILL' 1;">engineering</span>
                                Provider Referral
                            </p>
                            <p class="mb-0" style="font-size:.85rem;color:var(--clr-secondary-text);">
                                Refer a provider → they complete their first job → you earn
                                <strong><?= $app->naira($provider_reward) ?></strong>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="p-3 rounded-3" style="background:var(--clr-surface-low);">
                            <p class="fw-bold mb-1 d-flex align-items-center gap-2" style="font-size:.9rem;">
                                <span class="material-symbols-outlined text-primary" style="font-size:1rem;font-variation-settings:'FILL' 1;">person_add</span>
                                Customer Referral
                            </p>
                            <p class="mb-0" style="font-size:.85rem;color:var(--clr-secondary-text);">
                                Refer a customer → they complete their first booking → you earn
                                <strong><?= $app->naira($customer_reward) ?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="help-panel h-100 d-flex flex-column justify-content-between">
                <div>
                    <h5 class="fw-bold font-headline mb-2">Need help?</h5>
                    <p style="font-size:.875rem;color:var(--clr-secondary-text);">
                        Learn more about referral terms and conditions to make sure your rewards pay out on time.
                    </p>
                </div>
                <a href="#" class="link-arrow mt-3">
                    Read Referral Guide
                    <span class="material-symbols-outlined" style="font-size:1rem;">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>

</div><!-- /.d-flex -->
</main>
</div></div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ── Tab switching
function switchTab(tab) {
    ['providers','customers'].forEach(t => {
        document.getElementById('panel-' + t).style.display   = t === tab ? 'flex'  : 'none';
        document.getElementById('tab-'   + t).classList.toggle('active', t === tab);
    });
}

// ── Copy link────
function copyLink(btn, text) {
    navigator.clipboard.writeText('https://' + text).then(() => {
        const orig = btn.innerHTML;
        btn.innerHTML = '<span class="material-symbols-outlined" style="font-size:.9rem;">check</span> Copied!';
        setTimeout(() => btn.innerHTML = orig, 2000);
    });
}

<?php require_once './fileasset/footer.php'; ?>