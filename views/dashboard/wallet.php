<?php require_once("./fileasset/header.php");

// --- Mock data (replace with real DB queries) ---
$stats = [
    [
        'label' => 'Total Spent',
        'value' => '42850',
        'note'  => '+12.5% from last month',
        'icon'  => 'trending_up',
        'style' => 'hero',
    ],
    [
        'label' => 'Active Escrow',
        'value' => '15000',
        'note'  => '2 orders in progress',
        'icon'  => 'lock',
        'style' => 'warning',
    ],
    [
        'label' => 'Wallet Credits',
        'value' => '2500',
        'note'  => 'Referral & bonus credits',
        'icon'  => 'redeem',
        'style' => 'muted',
    ],
];

$payment_methods = [
    [
        'type'    => 'card',
        'icon'    => 'credit_card',
        'filled'  => true,
        'label'   => 'PAYSTACK CARD',
        'sub'     => 'Visa, Mastercard, Verve',
        'default' => true,
        'logo'    => null,
        'logo_alt'=> null,
    ],
    [
        'type'    => 'bank',
        'icon'    => 'account_balance',
        'filled'  => false,
        'label'   => 'PAYSTACK BANK TRANSFER',
        'sub'     => 'Direct bank transfer',
        'default' => false,
        'logo'    => null,
        'logo_alt'=> null,
    ],
    [
        'type'    => 'ussd',
        'icon'    => 'dialpad',
        'filled'  => false,
        'label'   => 'PAYSTACK USSD',
        'sub'     => 'GTB, UBA, Zenith & more',
        'default' => false,
        'logo'    => null,
        'logo_alt'=> null,
    ],
    [
        'type'    => 'mobile_money',
        'icon'    => 'smartphone',
        'filled'  => false,
        'label'   => 'PAYSTACK MOBILE MONEY',
        'sub'     => 'MTN, Airtel, Glo, 9mobile',
        'default' => false,
        'logo'    => null,
        'logo_alt'=> null,
    ],
    [
        'type'    => 'qr',
        'icon'    => 'qr_code_scanner',
        'filled'  => false,
        'label'   => 'PAYSTACK QR',
        'sub'     => 'Scan to pay instantly',
        'default' => false,
        'logo'    => null,
        'logo_alt'=> null,
    ],
];

$transactions = [
    [
        'date'     => 'Oct 24, 2023',
        'provider' => 'ArchiStudio Global',
        'service'  => '3D Rendering - Phase 1',
        'amount'   => '125000',
        'status'   => 'paid',
        'action'   => 'download',
        'avatar'   => 'three.webp',
        'initials' => null,
    ],
    [
        'date'     => 'Oct 22, 2023',
        'provider' => 'DevCore Systems',
        'service'  => 'API Integration',
        'amount'   => '80000',
        'status'   => 'pending',
        'action'   => 'pay',
        'avatar'   => 'twelve.webp',
        'initials' => null,
    ],
    [
        'date'     => 'Oct 18, 2023',
        'provider' => 'Bright Path Media',
        'service'  => 'Social Strategy',
        'amount'   => '240000',
        'status'   => 'paid',
        'action'   => 'download',
        'avatar'   => 'twenty.webp',
        'initials' => null,
    ],
    [
        'date'     => 'Oct 15, 2023',
        'provider' => 'Legal Lens LLC',
        'service'  => 'Contract Review',
        'amount'   => '45000',
        'status'   => 'paid',
        'action'   => 'download',
        'avatar'   => null,
        'initials' => 'LL',
    ],
];
?>

<link rel="stylesheet" href="<?= SITE_URL ?>css/dashboard/wallet.css">

<?php require_once("./fileasset/sidebar.php"); ?>

<main class="py-5 my-5 ps-lg-4 pe-xl-2">

    <!-- ── Section 1: Financial Overview ── -->
    <section class="section-gap">
        <div class="row g-4 mb-4">
            <?php foreach ($stats as $s): ?>
            <div class="col-12 col-md-6 col-lg-4">
                <?php
                $cardClass  = $s['style'] === 'hero' ? 'hero-box' : ($s['style'] === 'warning' ? 'plain' : 'light');
                $labelClass = $s['style'] === 'hero' ? 'on-hero' : 'on-card';
                $valueClass = $s['style'] === 'hero' ? 'on-hero' : ($s['style'] === 'muted' ? 'primary' : 'on-card');
                $noteClass  = $s['style'] === 'hero' ? 'on-hero' : ($s['style'] === 'warning' ? 'warning' : 'secondary');
                ?>
                <div class="stat-card <?= $cardClass ?>">
                    <div>
                        <p class="stat-label <?= $labelClass ?>"><?= $s['label'] ?></p>
                        <div class="stat-value <?= $valueClass ?>"><?= $app->naira($s['value']) ?></div>
                    </div>
                    <div class="stat-note <?= $noteClass ?>">
                        <span class="material-symbols-outlined"><?= $s['icon'] ?></span>
                        <span><?= $s['note'] ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Bottom strip: quick-glance info pills -->
        <div class="d-flex flex-wrap gap-3">
            <a href="" class="info-pill">
                <span class="material-symbols-outlined">verified</span>
                <span><strong>3</strong> completed orders this month</span>
            </a>
            <a href="" class="info-pill">
                <span class="material-symbols-outlined">history</span>
                <span>Last payment <strong>2 days ago</strong></span>
            </a>
            <a href="" class="info-pill success">
                <span class="material-symbols-outlined">savings</span>
                <span>You saved <strong>₦1,200</strong> with promo codes</span>
            </a>
            <a href="" class="info-pill warning">
                <span class="material-symbols-outlined">schedule</span>
                <span><strong>1</strong> escrow release pending tailor confirmation</span>
            </a>
        </div>
    </section>

    <!-- ── Section 2: Payment Methods ── -->
    <section class="section-gap">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="section-heading mb-0">Payment Methods</h4>
            <button class="btn-link-primary">
                <span class="material-symbols-outlined">add_circle</span>
                Add New Method
            </button>
        </div>

        <div class="row g-4">
            <?php foreach ($payment_methods as $pm): ?>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="pm-card">
                    <div class="pm-card-top">
                        <span class="material-symbols-outlined icon-lg <?= $pm['filled'] ? 'icon-filled primary' : 'secondary' ?>">
                            <?= $pm['icon'] ?>
                        </span>
                        <?php if ($pm['default']): ?>
                        <span class="pm-card-default">Default</span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <p class="pm-card-label"><?= $pm['label'] ?></p>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="pm-card-sub"><?= $pm['sub'] ?></span>
                            <?php if ($pm['logo']): ?>
                            <img src="<?= $pm['logo'] ?>"
                                 alt="<?= $pm['logo_alt'] ?>"
                                 class="pm-card-logo"/>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- Add new -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="pm-add">
                    <span class="material-symbols-outlined">add</span>
                    Add Payment Method
                </div>
            </div>
        </div>
    </section>

    <!-- ── Section 3: Invoices & Transactions ── -->
    <section>
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h4 class="section-heading mb-0">Invoices &amp; Transactions</h4>
            <div class="d-flex gap-2">
                <button class="btn-chip">
                    <span class="material-symbols-outlined">filter_list</span> Filter
                </button>
                <button class="btn-chip">
                    <span class="material-symbols-outlined">download</span> Export CSV
                </button>
            </div>
        </div>

        <div class="tx-table-wrap">
            <div class="table-responsive">
                <table class="tx-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Provider</th>
                            <th>Service</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $tx): ?>
                        <tr>
                            <td><span class="tx-date"><?= $tx['date'] ?></span></td>

                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="provider-avatar">
                                        <?php if ($tx['avatar']): ?>
                                        <img src="<?= SITE_URL . "img/profile/" . $tx['avatar'] ?>" alt="<?= $tx['provider'] ?>"/>
                                        <?php else: ?>
                                        <?= $tx['initials'] ?>
                                        <?php endif; ?>
                                    </div>
                                    <span class="tx-name"><?= $tx['provider'] ?></span>
                                </div>
                            </td>

                            <td><span class="tx-svc"><?= $tx['service'] ?></span></td>

                            <td><span class="tx-amount"><?= $app->naira($tx['amount']) ?></span></td>

                            <td>
                                <?php
                                $badgeClass = $tx['status'] === 'paid' ? 'status-paid' : 'status-pending';
                                $badgeLabel = ucfirst($tx['status']);
                                ?>
                                <span class="status-badge <?= $badgeClass ?>"><?= $badgeLabel ?></span>
                            </td>

                            <td class="text-end">
                                <?php if ($tx['action'] === 'download'): ?>
                                <button class="tx-action-dl ms-auto">
                                    <span class="material-symbols-outlined">download</span>
                                </button>
                                <?php else: ?>
                                <button class="tx-action-pay">Pay Now</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</main>

</div>
</div>

<?php require_once './fileasset/footer.php'; ?>