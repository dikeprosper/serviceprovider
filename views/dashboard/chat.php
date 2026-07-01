<?php require_once("./fileasset/header.php");

//•
// --- Mock data (replace with real DB queries) ---
$active_chat = [
    'name'    => 'Sarah Mitchell',
    'role'    => 'Ankara Specialist',
    'status'  => 'Active Now',
    'online'  => true,
    'avatar'  => SITE_URL . 'img/profile/four.webp',
];

$chat_list = [
    [
        'name'    => 'Sarah Mitchell',
        'preview' => "I've attached the revised floor plans for the master suite...",
        'time'    => 'Active Now',
        'active'  => true,
        'online'  => true,
        'avatar'  => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCyq1G54fz1iUqvaVAlsGBnn_bCVmCH30C0ouIFjLV9YqZDJaHpUwe4YKT2VMmGTkBtWed9-JGpIPJwFxOzKGu5GCCQw3_8lK0k9sX3qQrcz_G4cCYOYmZd-sRShlez5N9ahNzisrFadhXVCINaRnyxCDxLvp3xR8vrOWkA7Doiw1jIRDyBAAgaCH4ok4h666HVOGbEcr9JjoGWsTGj4X-98FmdGNDelDwT5GcygopDvkul2rBWAnbmo608E4S8TgTULbBNv_qmnHC4',
    ],
    [
        'name'    => 'David Chen',
        'preview' => 'The electrical rough-in is scheduled for Tuesday morning.',
        'time'    => '12:45 PM',
        'active'  => false,
        'online'  => false,
        'avatar'  => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCIW-7sTqYcRZX1fRmO0mQn-Z5CMiEKzvhGQN3VZ43B2Zm2j1fgCrgEVrAlwoaYbj0dtx-VVi2zLtnPP6UlpJnT6FEU3onyWpyo-9wWv9J95R-pEzNPzMSr_nZSZo3zV8dSB4AF6P6xpupVpA8acJU3UEWXIgVyikc8eDY-tjCn60Go2j2mO8boV1mgsy7Zxe2WLyePx_UrJMXFAVdSsFbtzoHyP1EgAM0kjGf-Vn_p9dSmmKktRaA6jLLu304Bdo_n7B2i3q7QnOtY',
    ],
    [
        'name'    => 'Elena Rodriguez',
        'preview' => 'How do you feel about the walnut finishes for the kitchen island?',
        'time'    => 'Yesterday',
        'active'  => false,
        'online'  => false,
        'avatar'  => 'https://lh3.googleusercontent.com/aida-public/AB6AXuD5uMLqvkmhJju3IQk6rpq6_GKPaEIEyPTh4xqX_JrQrikQOu31Ce7svE4dbkhNXCXGqwpKmUA5mFf9ul6Vwu7djg8HjzLcsiyk9A8yIpJuO2VRHWgZ25UUPV5YoTWy-AgStAotU5qdK2Qoliyn_kGVcZXTSYiBMQODQfxn70iGXqzOdtFKOZsywf84d0yJ7xNlbUf28iXUNl_eCn7zYvlmC_U5uIFRlrzwTQECZ9zRjgeyQMUBj85Ythnb2CI3TqJ_5eMEG9bK_ylV',
    ],
    [
        'name'    => 'Marcus Wright',
        'preview' => 'The drainage plan was approved by the city council this morning.',
        'time'    => '2 days ago',
        'active'  => false,
        'online'  => false,
        'avatar'  => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDcGoUhhzdJvyOUexf5Y6UayINU_Ll65MCI7AfQydxVDEBqhTrdHF-bUbo5yblnLO79vePWGo5qGMvI-L9YXGge1UlwXqLRRw6iOKfIroW2CKtX8zGsHWD3E0CR7x0RZb7WRbuEqL8y2WWduJsDOR8wuLx6g0TpNG0uTzX5JuuSg4lSDvJEtLBczoVvBm5z675QI2XaGLPLuy_hqGJT3r5DtWLj9v43Ce3qcoIBmWcrBGmuWfLUUh8aVkWitiZ7RI4kPBOZ-v8no6ep',
    ],
];

$messages = [
    ['type' => 'date',      'text' => 'Tuesday, Oct 24'],
    [
        'type'   => 'received',
        'text'   => 'Good morning! I\'ve finalized the preliminary sketches for the open-concept living area. Would you like to review them now or during our call later today?',
        'time'   => '9:15 AM',
        'avatar' => SITE_URL . 'img/profile/four.webp',
    ],
    [
        'type'   => 'sent',
        'text'   => "I'd love to take a look now. If you can send them over, I'll have some notes ready for our 2 PM sync.",
        'time'   => '9:22 AM • Read',
    ],
    [
        'type'    => 'received',
        'text'    => 'Perfect. Here are the three variations we discussed. Option B includes the extended skylight feature.',
        'time'    => '9:25 AM',
        'avatar'  => SITE_URL . 'img/profile/four.webp',
        'images'  => [
            SITE_URL . 'img/inspiration/img11.webp',
            SITE_URL . 'img/fabrics/fab8.webp',
        ],
    ],
    [
        'type' => 'sent',
        'text' => 'These look incredible, Sarah. Option B is definitely closer to what I had in mind for the natural light.',
        'time' => '9:40 AM • Read',
    ],
];

$timeline = [
    [
        'icon'   => 'check_circle',
        'filled' => true,
        'dark'   => true,
        'title'  => 'Project Milestone Reached',
        'detail' => 'Foundation phase completed and signed off.',
        'time'   => '2 hours ago',
        'link'   => null,
    ],
    [
        'icon'   => 'description',
        'filled' => true,
        'dark'   => false,
        'title'  => 'New Quote Received',
        'detail' => 'Lumber supply quote updated for Q4 pricing.',
        'time'   => '5 hours ago',
        'link'   => ['href' => '#', 'label' => 'Review Quote'],
    ],
    [
        'icon'   => 'local_shipping',
        'filled' => true,
        'dark'   => false,
        'title'  => 'Provider On The Way',
        'detail' => 'David Chen is arriving for site inspection.',
        'time'   => 'Just Now',
        'link'   => null,
    ],
]; ?>

<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/chat.css">

<?php require_once("./fileasset/sidebar.php"); ?>

<main class="msg-shell ps-lg-4 pe-xl-2">

    <!-- ════════════════════════════════
         LEFT: Chat list
    ════════════════════════════════ -->
    <section class="chat-list-col">
        <div class="chat-list-header">
            <div class="chat-filter-scroll">
                <button class="chat-filter-pill active">All Messages</button>
                <button class="chat-filter-pill">Unread</button>
                <button class="chat-filter-pill">Active Projects</button>
            </div>
        </div>

        <div class="chat-list-body">
            <?php foreach ($chat_list as $c): ?>
            <div class="chat-item <?= $c['active'] ? 'active' : (!$c['online'] && !$c['active'] ? 'muted' : '') ?>">
                <div class="chat-avatar-wrap">
                    <img src="<?= htmlspecialchars($c['avatar']) ?>"
                         alt="<?= htmlspecialchars($c['name']) ?>"
                         class="chat-avatar"/>
                    <?php if ($c['online']): ?>
                    <div class="online-dot"></div>
                    <?php endif; ?>
                </div>
                <div class="flex-grow-1 min-width-0" style="overflow:hidden;">
                    <div class="d-flex justify-content-between align-items-baseline mb-1 gap-1">
                        <span class="chat-name"><?= htmlspecialchars($c['name']) ?></span>
                        <span class="chat-time <?= $c['active'] ? 'active-time' : 'muted-time' ?> flex-shrink-0">
                            <?= htmlspecialchars($c['time']) ?>
                        </span>
                    </div>
                    <p class="chat-preview <?= $c['active'] ? 'active-preview' : '' ?>">
                        <?= htmlspecialchars($c['preview']) ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- ════════════════════════════════
         CENTER: Active chat window
    ════════════════════════════════ -->
    <section class="chat-window-col top-0 position-sticky">

        <!-- Header -->
        <div class="chat-header">
            <div class="d-flex align-items-center gap-3">
                <img src="<?= htmlspecialchars($active_chat['avatar']) ?>"
                     alt="<?= htmlspecialchars($active_chat['name']) ?>"
                     class="chat-header-avatar"/>
                <div>
                    <p class="chat-header-name"><?= $active_chat['name'] ?></p>
                    <p class="chat-header-role"><?= $active_chat['role'] ?></p>
                </div>
            </div>
            <div class="d-flex gap-1">
                <button class="icon-btn-round"><span class="material-symbols-outlined">more_vert</span></button>
            </div>
        </div>

        <!-- Messages -->
        <div class="message-area">
            <?php foreach ($messages as $msg):
                if ($msg['type'] === 'date'): ?>
                <div class="msg-date-divider">
                    <span><?= htmlspecialchars($msg['text']) ?></span>
                </div>

                <?php elseif ($msg['type'] === 'received'): ?>
                <div class="msg-received">
                    <img src="<?= htmlspecialchars($msg['avatar']) ?>" alt="avatar" class="msg-bubble-avatar"/>
                    <div>
                        <div class="bubble-received"><?= htmlspecialchars($msg['text']) ?></div>
                        <?php if (!empty($msg['images'])): ?>
                        <div class="bubble-img-grid">
                            <?php foreach ($msg['images'] as $imgSrc): ?>
                            <img src="<?= htmlspecialchars($imgSrc) ?>" alt="Attachment"/>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <span class="msg-time"><?= htmlspecialchars($msg['time']) ?></span>
                    </div>
                </div>

                <?php elseif ($msg['type'] === 'sent'): ?>
                <div class="msg-sent">
                    <div class="msg-sent-inner">
                        <div class="bubble-sent"><?= htmlspecialchars($msg['text']) ?></div>
                        <span class="msg-time"><?= htmlspecialchars($msg['time']) ?></span>
                    </div>
                </div>

            <?php endif; endforeach; ?>
        </div>

        <!-- Input bar -->
        <div class="chat-input-bar pb-5 mb-5 mb-lg-0 pb-lg-0">
            <div class="chat-input-wrap">
                <div class="chat-input-inner">
                    <input type="text" class="chat-input" placeholder="Type your message..."/>
                    <div class="chat-input-icons">
                        <button><span class="material-symbols-outlined" style="font-size:1.2rem;">image</span></button>
                        <button><span class="material-symbols-outlined" style="font-size:1.2rem;">location_on</span></button>
                        <button><span class="material-symbols-outlined" style="font-size:1.2rem;">attach_file</span></button>
                    </div>
                </div>
                <button class="btn-send">
                    <span class="material-symbols-outlined icon-filled" style="font-size:1.2rem;">send</span>
                </button>
            </div>
        </div>

    </section>

    <!-- ════════════════════════════════
         RIGHT: Project timeline panel
    ════════════════════════════════ -->
    <aside class="timeline-col">
        <h2 class="timeline-heading">Project Timeline</h2>

        <div class="timeline-list">
            <?php foreach ($timeline as $item): ?>
            <div class="timeline-item">
                <div class="timeline-dot <?= $item['dark'] ? 'dark' : '' ?>">
                    <span class="material-symbols-outlined"><?= $item['icon'] ?></span>
                </div>
                <h4 class="timeline-title"><?= htmlspecialchars($item['title']) ?></h4>
                <p class="timeline-detail"><?= htmlspecialchars($item['detail']) ?></p>
                <?php if ($item['link']): ?>
                <a href="<?= htmlspecialchars($item['link']['href']) ?>" class="timeline-link">
                    <?= htmlspecialchars($item['link']['label']) ?>
                </a>
                <?php endif; ?>
                <span class="timeline-time"><?= htmlspecialchars($item['time']) ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Insurance card -->
        <div class="insurance-card">
            <h4>Project Insurance</h4>
            <p>Your project is fully covered up to $2.5M. View policy details.</p>
            <a href="#" class="manage-link">
                Manage Protection
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </aside>

</main>
</div></div>


<script>
    /* Filter pill active state */
    document.querySelectorAll('.chat-filter-pill').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.chat-filter-pill').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    /* Chat item selection */
    document.querySelectorAll('.chat-item').forEach(item => {
        item.addEventListener('click', () => {
            document.querySelectorAll('.chat-item').forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });

    /* Send on Enter */
    const input = document.querySelector('.chat-input');
    input?.addEventListener('keydown', e => {
        if (e.key === 'Enter' && input.value.trim()) {
            // wire to your PHP backend / AJAX here
            input.value = '';
        }
    });
</script>

<?php require_once './fileasset/footer.php'; ?>