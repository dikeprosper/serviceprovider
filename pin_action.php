<?php
include 'config/config.php';
// header('Content-Type: application/json');
$uid = "2";

//Save Pin in DataBase
if (isset($_POST['moodboard'])) {

    $app->csrfVerify();
    
    $pid = htmlspecialchars($_POST['pid']) ?? '';
    $username = htmlspecialchars($_POST['username']) ?? '';
    $moodboard = htmlspecialchars($_POST['moodboard']) ?? '';

    // Basic validation (you can expand this as needed)
    if (empty($pid) || empty($username) || empty($moodboard)) {

        echo json_encode(['status' => 'error', 'message' => 'Something went wrong please try again later.']);
        exit;
    }
    $query = $app->myQuery(
        "INSERT INTO pins (pid, uid, username, board) VALUES (?, ?, ?, ?)",
        "ssss",
        [$pid, $uid, $username, $moodboard]
    );


    if ($app->db->affected_rows > 0) {

        $status = "success";
        $nextStep = "<button onclick=\"deletePin('$pid','$moodboard')\" class=\"btn btn-light text-underline py-1 px-2 text-primary ms-3\"> Undo </button>";
        $app->setAlert('PIN saved successfully!', $status);

    } else {

        $status = "danger";
        $app->setAlert('Failed to save PIN.', $status);

    }

    $result = $app->getAlert('Pin Notification', $nextStep);
    
    echo json_encode(['status' => $status, 'message' => "$result"]);
}

// Display MoodBoard
if (isset($_POST['showboard'])) {
    
    $id = htmlspecialchars($_POST['id'] ?? '');
    $app->showMoodBoard($id);
}


if (isset($_POST['delete'])) {

    $app->csrfVerify();
    
    $delete = htmlspecialchars($_POST['delete']) ?? '';
    $moodboard = htmlspecialchars($_POST['board']) ?? '';

    // Basic validation
    if (empty($delete) || empty($moodboard)) {

        echo json_encode(['status' => 'error', 'message' => 'Something went wrong please try again later.']);
        exit;
    }

    $query = $app->myQuery(
        "DELETE FROM pins WHERE pid = ? AND board = ? AND uid = ?",
        "sss",
        [$delete, $moodboard, $uid]
    );


    if ($app->db->affected_rows > 0) {

        $status = "success";
        $app->setAlert('PIN Removed', $status);

    } else {

        $status = "danger";
        $app->setAlert('Failed to remove PIN.', $status);

    }

    $result = $app->getAlert('Pin Notification');
    
    echo json_encode(['status' => $status, 'message' => "$result"]);
}

exit;