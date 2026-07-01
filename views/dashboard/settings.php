<?php require_once("./fileasset/header.php"); 

    $saved_addresses = [
        [
            'id'      => 1,
            'label'   => 'Primary Residence',
            'icon'    => 'home',
            'address' => '12B Admiralty Way, Lekki Phase 1, Lagos, Nigeria',
            'default' => true,
        ],
    ];

    $saved_measurements = [
        [
            'id'      => 1,
            'label'   => 'Sarah\'s Measurement',
            'icon'    => 'measuring_tape',
            'address' => 'SIZE: XL',
            'default' => false,
        ],
        [
            'id'      => 1,
            'label'   => 'My Measurments',
            'icon'    => 'measuring_tape',
            'address' => 'SIZE: L',
            'default' => false,
        ],
    ];

    $measurements = [
        ['label' => 'Chest',       'value' => '42',  'unit' => 'in'],
        ['label' => 'Waist',       'value' => '34',  'unit' => 'in'],
        ['label' => 'Hips',        'value' => '40',  'unit' => 'in'],
        ['label' => 'Shoulder',    'value' => '18',  'unit' => 'in'],
        ['label' => 'Sleeve',      'value' => '25',  'unit' => 'in'],
        ['label' => 'Inseam',      'value' => '30',  'unit' => 'in'],
        ['label' => 'Neck',        'value' => '15',  'unit' => 'in'],
        ['label' => 'Thigh',       'value' => '22',  'unit' => 'in'],
    ];

    $notifications = [
        ['key' => 'order_updates',  'label' => 'Order Updates',     'icon' => 'checkroom',          'desc' => 'Status changes on your orders',           'push' => true,  'sms' => true,  'email' => true],
        ['key' => 'messages',       'label' => 'New Messages',       'icon' => 'chat',               'desc' => 'When a tailor sends you a message',        'push' => true,  'sms' => true,  'email' => false],
        ['key' => 'escrow',         'label' => 'Escrow Activity',    'icon' => 'lock',               'desc' => 'Payments held, released or refunded',      'push' => true,  'sms' => false, 'email' => true],
        ['key' => 'promotions',     'label' => 'Promos & Offers',    'icon' => 'redeem',             'desc' => 'Deals, credits and seasonal discounts',    'push' => false, 'sms' => false, 'email' => false],
    ];

    $paystack_channels = [
        ['key' => 'card',          'icon' => 'credit_card',        'label' => 'Card',           'desc' => 'Visa, Mastercard, Verve'],
        ['key' => 'bank_transfer', 'icon' => 'account_balance',    'label' => 'Bank Transfer',  'desc' => 'Direct bank transfer'],
        ['key' => 'ussd',          'icon' => 'dialpad',            'label' => 'USSD',           'desc' => 'GTB, UBA, Zenith & more'],
        ['key' => 'mobile_money',  'icon' => 'smartphone',         'label' => 'Mobile Money',   'desc' => 'MTN, Airtel, Glo, 9mobile'],
    ];

    $preferred_channel = 'card'; // from DB

    $refund_account = [
        'bank'    => 'First Bank',
        'number'  => '3012 **** **78',
        'name'    => 'Alexander Mitchell',
    ];

    $nav_sections = [
        ['id' => 'profile',      'icon' => 'person',              'label' => 'Profile'],
        ['id' => 'measurements', 'icon' => 'straighten',          'label' => 'Measurements'],
        ['id' => 'notifications','icon' => 'notifications',       'label' => 'Notifications'],
        ['id' => 'payment',      'icon' => 'account_balance_wallet','label' => 'Payment'],
        ['id' => 'security',     'icon' => 'shield',              'label' => 'Security'],
        ['id' => 'referral',     'icon' => 'redeem',              'label' => 'Referral'],
    ];

?>


<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/settings.css">

<?php require_once("./fileasset/sidebar.php"); ?>


<main class="py-5 my-5 ps-lg-4 pe-xl-2">
        <!-- Page heading -->
    <div class="mb-4">
        <h1 style="font-size:1.5rem; font-weight:800; margin:0;">Settings</h1>
        <p style="font-size:.82rem; color:var(--on-surface-variant); margin:.25rem 0 0;">Manage your account, preferences and security</p>
    </div>

    <!-- ════════ MAIN CONTENT ════════ -->
    <div class="w-100">

        <!-- ══ 1. PROFILE ══ -->
        <section class="settings-section" id="profile">
            <div class="section-card">
                <div class="section-header">
                    <div class="section-header-icon">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div>
                        <p class="section-title">Profile</p>
                        <p class="section-subtitle">Your name, photo and contact details</p>
                    </div>
                </div>
                <div class="section-body">
                    <!-- Avatar -->
                    <div class="d-flex align-items-center gap-4 mb-4">
                        <div class="avatar-wrap">
                            <img src="<?= SITE_URL ."img/profile/" . $user['profile']; ?>" alt="Profile photo"/>
                            <div class="avatar-overlay">
                                <span class="material-symbols-outlined">photo_camera</span>
                            </div>
                        </div>
                        <div>
                            <button class="btn-outline-primary" style="padding:.45rem 1.1rem; font-size:.75rem;">
                                Change Photo
                            </button>
                            <p style="font-size:.62rem; color:var(--on-surface-variant); margin:.4rem 0 0; text-transform:uppercase; letter-spacing:.08em; font-weight:700;">
                                Max 5MB · JPG or PNG
                            </p>
                        </div>
                    </div>

                    <!-- Fields -->
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="field-label">Full Name</label>
                            <input type="text" class="field-input" value="<?= htmlspecialchars($user['name']) ?>"/>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="field-label">Email Address</label>
                            <input type="email" class="field-input" value="<?= htmlspecialchars($user['email']) ?>"/>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="field-label">Phone Number</label>
                            <input type="tel" class="field-input" value="<?= htmlspecialchars($user['phone']) ?>"/>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="field-label">Gender</label>
                            <select class="field-input">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Prefer not to say</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn-save">Save Changes</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══ Addresses Card ══ -->
        <section class="settings-section addresses-card">

            <!-- Header -->
            <div class="addresses-card-header">
                <h4 class="addresses-card-title">Saved Addresses</h4>
                <button class="btn-add-new">Add New</button>
            </div>

            <!-- Address list -->
            <div>
                <?php foreach ($saved_addresses as $addr): ?>
                <div class="address-row">

                    <!-- Icon -->
                    <span class="material-symbols-outlined address-icon">
                        <?= htmlspecialchars($addr['icon']) ?>
                    </span>

                    <!-- Info -->
                    <div class="address-body">
                        <div class="address-meta">
                            <p class="address-label"><?= htmlspecialchars($addr['label']) ?></p>
                            <?php if ($addr['default']): ?>
                                <span class="badge-default">Default</span>
                            <?php endif; ?>
                        </div>
                        <p class="address-text"><?= htmlspecialchars($addr['address']) ?></p>
                    </div>

                    <!-- Delete -->
                    <button class="btn-delete" title="Remove address">
                        <span class="material-symbols-outlined">delete</span>
                    </button>

                </div>
                <?php endforeach; ?>
            </div>

        </section>

        <!-- ══ 2. MEASUREMENTS ══ -->
        <section class="settings-section" id="measurements">
            <div class="section-card">
                <div>
                    <div class="section-header">
                        
                        <div class="section-header-icon">
                            <span class="material-symbols-outlined">straighten</span>
                        </div>
                        <div>
                            <p class="section-title">Body Measurements</p>
                            <p class="section-subtitle">Saved once, shared with every tailor you work with</p>
                        </div>
                    </div>
                    
                    <div class="section-header w-100">

                        <div class="w-100">
                            <!-- Header -->
                            <div class="addresses-card-header">
                                <h4 class="addresses-card-title">Saved Measurments</h4>
                                <button class="btn-add-new">Add New</button>
                            </div>

                            <!-- Address list -->
                            <div>
                                <?php foreach ($saved_measurements as $measur): ?>
                                <div class="address-row">

                                    <!-- Icon -->
                                    <span class="material-symbols-outlined address-icon">
                                        <?= htmlspecialchars($measur['icon']) ?>
                                    </span>

                                    <!-- Info -->
                                    <div class="address-body">
                                        <div class="address-meta">
                                            <p class="address-label"><?= htmlspecialchars($measur['label']) ?></p>
                                            <?php if ($measur['default']): ?>
                                                <span class="badge-default">Default</span>
                                            <?php endif; ?>
                                        </div>
                                        <p class="address-text"><?= htmlspecialchars($measur['address']) ?></p>
                                    </div>

                                    <!-- Delete -->
                                    <button class="btn-delete" title="Remove address">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>

                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-body">
                    <div class="measure-note mb-4">
                        <span class="material-symbols-outlined">info</span>
                        <span>Your measurements are shared with tailors when you place an order. Keep them updated for the best fit.</span>
                    </div>
                    <div class="row g-3">
                        <?php foreach ($measurements as $m): ?>
                        <div class="col-6 col-md-3">
                            <div class="measure-field">
                                <label><?= htmlspecialchars($m['label']) ?></label>
                                <div class="d-flex align-items-baseline gap-1">
                                    <input type="number" value="<?= htmlspecialchars($m['value']) ?>" min="0"/>
                                    <span class="unit"><?= htmlspecialchars($m['unit']) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button class="btn-save">Save Measurements</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══ 3. NOTIFICATIONS ══ -->
        <section class="settings-section" id="notifications">
            <div class="section-card">
                <div class="section-header">
                    <div class="section-header-icon">
                        <span class="material-symbols-outlined">notifications</span>
                    </div>
                    <div>
                        <p class="section-title">Notifications</p>
                        <p class="section-subtitle">Choose how we reach you for each alert type</p>
                    </div>
                </div>
                <div class="section-body">
                    <!-- Column headers -->
                    <div class="d-flex justify-content-end gap-3 mb-1 pe-1" style="padding-right:calc(1.25rem + 2px);">
                        <span style="font-size:.6rem; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--on-surface-variant); width:2.2rem; text-align:center;">Push</span>
                        <span style="font-size:.6rem; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--on-surface-variant); width:2.2rem; text-align:center;">SMS</span>
                        <span style="font-size:.6rem; font-weight:700; text-transform:uppercase; letter-spacing:.06em; color:var(--on-surface-variant); width:2.2rem; text-align:center;">Email</span>
                    </div>

                    <?php foreach ($notifications as $n): ?>
                    <div class="notif-row justify-content-between">
                        <div class="d-md-flex gap-3">
                            <div class="notif-icon mb-3 mb-lg-0">
                                <span class="material-symbols-outlined"><?= $n['icon'] ?></span>
                            </div>
                            <div class="notif-info">
                                <p class="notif-label"><?= htmlspecialchars($n['label']) ?></p>
                                <p class="notif-desc"><?= htmlspecialchars($n['desc']) ?></p>
                            </div>
                        </div>
                        <div class="notif-toggles">
                            <?php foreach (['push','sms','email'] as $ch): ?>
                            <div style="width:2.1rem; display:flex; justify-content:center;">
                                <div class="form-check form-switch m-0 p-0" style="min-height:auto;">
                                    <input class="form-check-input m-0" type="checkbox"
                                        <?= $n[$ch] ? 'checked' : '' ?>
                                        style="cursor:pointer; width:2rem; height:1.1rem;"/>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ══ 4. PAYMENT PREFERENCES ══ -->
        <section class="settings-section" id="payment">
            <div class="section-card">
                <div class="section-header">
                    <div class="section-header-icon">
                        <span class="material-symbols-outlined">account_balance_wallet</span>
                    </div>
                    <div>
                        <p class="section-title">Payment Preferences</p>
                        <p class="section-subtitle">Default payment channel and refund account</p>
                    </div>
                </div>
                <div class="section-body">

                    <!-- Preferred channel -->
                    <p class="field-label mb-3">Default Payment Channel</p>
                    <div class="row g-2 mb-4">
                        <?php foreach ($paystack_channels as $ch): ?>
                        <div class="col-12 col-sm-6">
                            <label class="channel-option <?= $ch['key'] === $preferred_channel ? 'selected' : '' ?>">
                                <input type="radio" name="preferred_channel"
                                    value="<?= $ch['key'] ?>"
                                    <?= $ch['key'] === $preferred_channel ? 'checked' : '' ?>/>
                                <div class="channel-icon">
                                    <span class="material-symbols-outlined"><?= $ch['icon'] ?></span>
                                </div>
                                <div>
                                    <p class="channel-label"><?= htmlspecialchars($ch['label']) ?></p>
                                    <p class="channel-desc"><?= htmlspecialchars($ch['desc']) ?></p>
                                </div>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Divider -->
                    <hr style="border-color:var(--outline-variant); margin:1.5rem 0;"/>

                    <!-- Refund account -->
                    <p class="field-label mb-3">Refund Account</p>
                    <p style="font-size:.75rem; color:var(--on-surface-variant); margin-bottom:1rem;">
                        Money refunded from disputed or cancelled orders will be sent here.
                    </p>
                    <div class="refund-account-card mb-3">
                        <div class="bank-icon">
                            <span class="material-symbols-outlined">account_balance</span>
                        </div>
                        <div class="flex-grow-1">
                            <p class="bank-name"><?= htmlspecialchars($refund_account['bank']) ?></p>
                            <p class="bank-detail">
                                <?= htmlspecialchars($refund_account['number']) ?> &nbsp;·&nbsp;
                                <?= htmlspecialchars($refund_account['name']) ?>
                            </p>
                        </div>
                        <button class="btn-edit-sm">Change</button>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn-save">Save Preferences</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══ 5. SECURITY ══ -->
        <section class="settings-section" id="security">
            <div class="section-card">
                <div class="section-header">
                    <div class="section-header-icon">
                        <span class="material-symbols-outlined">shield</span>
                    </div>
                    <div>
                        <p class="section-title">Password &amp; Security</p>
                        <p class="section-subtitle">Keep your account safe</p>
                    </div>
                </div>
                <div class="section-body">

                    <div class="security-row">
                        <div>
                            <p class="security-label">Password</p>
                            <p class="security-desc">Last changed 3 months ago</p>
                        </div>
                        <button class="btn-outline-primary" style="padding:.5rem 1.1rem; font-size:.75rem;">
                            Change Password
                        </button>
                    </div>

                    <div class="security-row">
                        <div>
                            <p class="security-label">Two-Factor Authentication</p>
                            <p class="security-desc">Add an extra layer of login protection via SMS</p>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge-disabled">Off</span>
                            <button class="btn-outline-primary" style="padding:.5rem 1.1rem; font-size:.75rem;">Enable</button>
                        </div>
                    </div>

                    <div class="security-row">
                        <div>
                            <p class="security-label">Active Sessions</p>
                            <p class="security-desc">You are logged in on 2 devices</p>
                        </div>
                        <button class="btn-outline-primary" style="padding:.5rem 1.1rem; font-size:.75rem;">
                            View Sessions
                        </button>
                    </div>

                    <div class="security-row" style="border-bottom:none; padding-bottom:0;">
                        <div style="width:100%;">
                            <p class="security-label" style="color:var(--error);">Danger Zone</p>
                            <p class="security-desc">These actions are permanent and cannot be undone</p>
                            <div class="row g-2 mt-2">
                                <div class="col-12 col-sm-6">
                                    <button class="btn-danger-soft" style="margin-top:0;">
                                        <span class="material-symbols-outlined" style="font-size:1rem;">logout</span>
                                        Sign out all devices
                                    </button>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <button class="btn-danger-soft" style="margin-top:0;">
                                        <span class="material-symbols-outlined" style="font-size:1rem;">person_remove</span>
                                        Delete Account
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ══ 6. REFERRAL ══ -->
        <section class="settings-section" id="referral">
            <div class="section-card">
                <div class="section-header">
                    <div class="section-header-icon">
                        <span class="material-symbols-outlined">redeem</span>
                    </div>
                    <div>
                        <p class="section-title">Referral</p>
                        <p class="section-subtitle">Invite friends and earn wallet credits</p>
                    </div>
                </div>
                <div class="section-body">

                    <!-- Stats row -->
                    <div class="row g-3 mb-4">
                        <div class="col-4">
                            <div class="referral-stat">
                                <div class="rs-value">7</div>
                                <div class="rs-label">Friends Invited</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="referral-stat">
                                <div class="rs-value">3</div>
                                <div class="rs-label">Converted</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="referral-stat">
                                <div class="rs-value">₦15k</div>
                                <div class="rs-label">Credits Earned</div>
                            </div>
                        </div>
                    </div>

                    <!-- Banner -->
                    <div class="referral-banner">
                        <h4>Invite a friend, both of you get ₦5,000</h4>
                        <p class="mb-3">When they complete their first order on WalletBeach, the credit lands in both wallets automatically.</p>

                        <div class="copy-box mb-3">
                            <code><?= SITE_URL . "rf=" . $user['username'] ?></code>
                            <button class="copy-btn" onclick="copyCode(this)">
                                <span class="material-symbols-outlined" style="font-size:.9rem;">content_copy</span>
                                Copy
                            </button>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <span style="font-size:.68rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:rgba(255,255,255,.55);">Share via</span>
                            <div class="share-btns">
                                <button class="share-btn"><span class="material-symbols-outlined">alternate_email</span></button>
                                <button class="share-btn"><span class="material-symbols-outlined">chat</span></button>
                                <button class="share-btn"><span class="material-symbols-outlined">share</span></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div><!-- end main content -->
</main>
</div></div>

<script src="<?=SITE_URL?>js/dashboard/settings.js"></script>

<?php require_once './fileasset/footer.php'; ?>