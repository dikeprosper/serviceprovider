<?php
$user = $app->user->authCheck();
require_once './fileasset/page_info.php'; ?>


<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/sidebar.css">
<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/dashboard.css">

<div class="<?php if ($page !== "chat"){ echo $section_padding; } ?>" id="dashboard">
    <div class="container-xxl d-flex">
        
        <!-- SIDEBAR -->
        <aside id="sidebar">

            <div class="sidebar-brand ps-xl-5">
                <div class="title"><?=$user['username']; ?></div>
                <div class="subtitle">
                    <a href="<?=SITE_URL ?>switch" class="btn btn-fade fade-r fs-7">Switch to <?php if ($user['role'] == "customer") { echo "buying"; } else { echo "selling"; } ?> </a>
                </div>
            </div>

            <nav class="sidebar-nav">
                <?php foreach ($dash_nav_items as $item): ?>
                    <a href="<?= $item['href'] ?>" class="sidebar-link ps-xl-5 <?php if (SITE_URL . "dashboard/$page" == $item['href'] ) { echo "active"; } ?>">
                        <span class="material-symbols-outlined"><?= $item['icon'] ?></span>
                        <?= $item['label'] ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- <div class="sidebar-cta-wrap">
                <button class="sidebar-cta">
                    <span class="material-symbols-outlined">add</span> Post a New Project
                </button>
            </div> -->

        </aside>