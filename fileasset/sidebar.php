<?php

$stats = [
    ['label' => 'Active Projects',  'value' => '7',    'sub' => '↑ 2 from last month'],
    ['label' => 'Total Spent',      'value' => '₦2.4M','sub' => 'Across all projects'],
    ['label' => 'Pending Reviews',  'value' => '3',    'sub' => 'Awaiting your input'],
];
 

require_once './fileasset/page_info.php'; ?>


<link rel="stylesheet" href="<?=SITE_URL?>css/sidebar.css">

<!-- SIDEBAR -->

<aside id="sidebar">

    <div class="sidebar-brand">
        <div class="title"><?=htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></div>
        <div class="subtitle">
            <a href="<?=SITE_URL ?>switch" class="btn btn-fade fade-r fs-7">Switch to <?php if ($user['provider'] == 1) { echo "buying"; } else { echo "selling"; } ?> </a>
        </div>
    </div>

    <nav class="sidebar-nav">
        <?php foreach ($dash_nav_items as $item): ?>
            <a href="<?= $item['href'] ?>" class="sidebar-link <?php if ("./$page" == $item['href'] ) { echo "active"; } ?>">
                <span class="material-symbols-outlined"><?= $item['icon'] ?></span>
                <?= htmlspecialchars($item['label']) ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <!-- <div class="sidebar-cta-wrap">
        <button class="sidebar-cta">
            <span class="material-symbols-outlined">add</span> Post a New Project
        </button>
    </div> -->

</aside>