<?php require_once("./fileasset/header.php");

// Pin data
// Get pins for the currently logged-in user

$userId = $user['uid'];

$productQuery = "SELECT * FROM products WHERE pid = ? and active_inspr = '1'";
$all = "fade-r";

if(isset($pageInfo['query']) AND $pageInfo['query'] != NULL) {

    $pinData = $app->getPinData($user,$productQuery,$pageInfo['query']);

    if($pageInfo['term'] != "all_items") {
        $all = "";
    }

} else {

    $pinData = $app->getPinData($user,$productQuery);
}

?>

<link rel="stylesheet" href="<?=SITE_URL?>css/dashboard/pin.css">

<?php require_once("./fileasset/sidebar.php"); ?>

<main class="py-5 my-5 ps-lg-4 pe-xl-2">
    <div class="w-100">

        <!-- ── Page header ── -->
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-4 gap-3">
            <div>
                <h2 class="page-title">
                    My Pins - <span class="d-inline btn btn-fade rounded-5 fs-7"> <?= str_replace('_', ' ', $pageInfo['term'] ?? 'all items'); ?> </span>
                </h2>
                <p class="page-subtitle">A curated collection of your favorite fabrics and bespoke styles.</p>
            </div>

        </div>

        <!-- ── Contextual filters ── -->
        <div class="d-flex justify-content-between">

            <div class="filter-scroll mb-4 col-9" id="filterContainer">
                
                <div>

                    <a href="<?= SITE_URL ?>dashboard/pin/all_items" class="btn btn-fade rounded-5 fs-7 <?= $all ?> boardsBtn py-2" id="all_items">
                        All
                    </a>
                </div>
                
                <?php

                    $boards = $app->boards($userId);
                    while ($b = $boards->fetch_assoc()): ?>
                    <div>

                        <a href="<?= SITE_URL ?>dashboard/pin/<?= $b['board_slug'] ?>" class="btn btn-fade rounded-5 fs-7 boardsBtn py-2 <?php if(isset($pageInfo['term']) AND $pageInfo['term'] == $b['board_slug']) { echo "fade-r"; } ?>" id="<?= $b['board_slug'] ?>">
                            <?= $b['board_name'] ?>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="col-3 ps-2">
                <button class="btn btn-fade rounded-5 fs-7 py-2 px-3 boardsBtn" onclick="openModal()">
                    New
                </button>
            </div>
        </div>

        <!-- ── Pin list ── -->
        <div class="row" id="pinList">
            <?php $i = 0;
            foreach ($pinData as $pin):
                $i += 1;

                $pid = $pin['pid'];
                $pin_count = $app->myQuery("SELECT * FROM pins WHERE pid = '$pid'");?>
                
                <div class="col-sm-6 col-xl-4 mb-4">

                    <!-- PIN EDITOR COMPONENT -->
                    <div class="editor-cover" onclick="editor(this)">
    
                        <div class="pin-editor">

                            <!-- Style preview header -->
                            <div class="pin-preview">
                                <!-- swap src for real image -->
                                <div style="width:100%;height:100%;background:linear-gradient(135deg,#C5EEE2,#9FD9C8);display:flex;align-items:center;justify-content:center;">
                                    <img src="<?=SITE_URL . 'img/' . "inspiration/" . $pin['image']; ?>" alt="">
                                </div>
                                <div class="pin-preview-overlay"></div>
                                <div class="pin-preview-meta">
                                    <div>
                                        <p class="pin-style-name"> <?=$pin['name']; ?> </p>
                                        <p class="pin-style-cat"> <?=$pin['category']; ?> </p>
                                    </div>
                                    <div class="pin-saves">
                                        <i class="material-symbols-outlined">keep</i>
                                        <?= $pin_count->num_rows; ?> pins
                                    </div>
                                </div>
                                <span class="btn-close-editor" onclick="closeEditor(event)">
                                    <i class="material-symbols-outlined">close</i>
                                </span>
                            </div>
        
                            <!-- Body -->
                            <div class="pin-body">
        
                                <!-- Board selector -->
                                <div class="board-wrap">
                                    <p class="section-label">Saved to board</p>
                                    <select name="board" class="board-select" id="boardSelect<?= $i; ?>">

                                        <option value="<?= $pin['board'] ?>">
                                            <?= $pin['board'] ?>
                                        </option>
                                        <?php
                                        $boards = $app->boards($userId);
                                        while ($b = $boards->fetch_assoc()): ?>
                    
                                            <option value="<?= $b['board_slug']; ?>">
                                                <?= $b['board_name'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                       
                                    </select>
                                </div>
        
                                <div class="pin-divider"></div>
        
                                <!-- Note -->
                                <div class="note-wrap">
                                    <p class="section-label">Your note</p>
                                    <textarea
                                        name="note"
                                        class="note-field"
                                        id="noteField<?= $i; ?>"
                                        placeholder="e.g. I want this in burgundy lace with longer sleeves…"
                                        maxlength="300"
                                        oninput="updateCharCount()"
                                    > <?=$pin['note'];?> </textarea>
                                    <div class="note-footer">
                                        <span class="note-hint">This note will be shared with your tailor</span>
                                        <span class="char-count" id="charCount">0 / 300</span>
                                    </div>
                                </div>
        
                                <div class="pin-divider"></div>
        
                                <!-- Alarm -->
                                <div class="alarm-wrap">
                                    <p class="section-label">WhatsApp reminder - <span class="text-muted">COMING SOON</span> </p>
        
                                    <!-- existing alarm badge (show when alarm is already set) -->
                                    <div class="alarm-existing mb-3" id="existingAlarm">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-alarm-fill"></i>
                                            <span id="existingAlarmText">Reminder set for 15 Mar 2026</span>
                                        </div>
                                        <span class="btn-remove-alarm" onclick="removeAlarm()">
                                            <span class="material-symbols-outlined fs-7">close</span> Remove
                                        </span>
                                    </div>
        
                                    <!-- toggle row -->
                                    <div class="alarm-toggle-row">
                                        <div class="alarm-toggle-info">
                                            <h6>Set a reminder</h6>
                                            <p>We'll send you a WhatsApp message on your chosen date</p>
                                        </div>
                                        <label class="toggle-switch">
                                            <input type="checkbox" id="alarmToggle" onchange="toggleAlarm(this)">
                                            <div class="toggle-track">
                                                <div class="toggle-thumb"></div>
                                            </div>
                                        </label>
                                    </div>
        
                                    <!-- alarm fields (shown when toggle is on) -->
                                    <div class="alarm-fields inVisible" id="alarmFields">
        
                                        <div class="field-group">
                                            <label for="eventName">Event name</label>
                                            <input
                                                type="text"
                                                class="pin-input"
                                                id="eventName"
                                                placeholder="e.g. Chisom's wedding, My graduation"
                                            >
                                        </div>
        
                                        <div class="field-row">
                                            <div class="field-group">
                                                <label for="reminderDate">Remind me on <span>(date)</span></label>
                                                <input
                                                    type="date"
                                                    class="pin-input"
                                                    id="reminderDate"
                                                >
                                            </div>
                                            <div class="field-group">
                                                <label for="eventDate">Event date <span>(optional)</span></label>
                                                <input
                                                    type="date"
                                                    class="pin-input"
                                                    id="eventDate"
                                                >
                                            </div>
                                        </div>
        
                                        <!-- whatsapp notice -->
                                        <div class="whatsapp-notice">
                                            <span>Your reminder will be sent via WhatsApp to your registered phone number on the date you choose.</span>
                                        </div>
        
                                    </div>
                                </div>
        
                            </div>
        
                            <!-- Footer actions -->
                            <div class="pin-footer">
                                <div class="btn-unpin" onclick="deletePin('<?=$pid; ?>','<?=$userId; ?>','deleteItem','refresh')">
                                    <i class="material-symbols-outlined">keep</i> Unpin
                                </div>
                                <button class="btn btn-fade fade-r w-100 rounded-5 fs-6" onclick="updatePin('<?=$pid; ?>','boardSelect<?= $i; ?>','noteField<?= $i; ?>')">
                                    <i class="material-symbols-outlined">check</i> Save changes
                                </button>
                            </div>
                        </div>
    
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>
</div></div>

<!-- MODAL -->
<div class="modal-overlay" id="modal">
    <div class="modal-box rounded-5">

        <div class="step active" id="step1">

            <div id="addBoard" class="rounded-2 overflow-hidden">

                <div class="p-2 mt-4 mb-5 bg-dark">

                    <input type="text" id="newBoardInput" class="form-control mb-3">
                    <div class="btn btn-fade w-100" onclick="addNewBoard('skip')">Add Board</div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?= SITE_URL ?>js/pin.js"></script>
<script src="<?= SITE_URL ?>js/inspiration.js"></script>

<?php require_once './fileasset/footer.php'; ?>