<?php
include 'config/config.php';
// header('Content-Type: application/json');

if(isset($_SESSION['user'])) {

    $currentUser = $app->user->authCheck();
    $uid = $currentUser['uid'];
}

//Save Pin in DataBase
if (isset($_POST['moodboard'])) {
    
    $pid = $app->post('pid') ?? '';
    $username = $app->post('username') ?? '';
    $moodboard = $app->post('moodboard') ?? '';

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


    if ($app->affected_rows > 0) {

        $status = "success";
        $nextStep = "<button onclick=\"deletePin('$pid','$moodboard')\" class=\"btn btn-light text-underline py-1 px-2 text-primary ms-3\"> Undo </button>";
        $app->setAlert('PIN saved successfully!', $status);

    } else {

        $nextStep = "";
        $status = "danger";
        $app->setAlert('Failed to save PIN.', $status);
    }

    $result = $app->getAlert('Pin Notification', $nextStep);
    
    exit;
    // echo json_encode(['status' => $status, 'message' => "$result"]);
}

//Add new Moodboard
if(isset($currentUser) AND isset($_POST['newBoard'])) {
    
    $boardName = $app->post('newBoard') ?? '';
    $slug = str_replace(' ', '_', $boardName);

    $nextStep = "";
    $status = "danger";

    // Basic validation (you can expand this as needed)
    if (empty($boardName) || strlen($boardName) < 4) {

        $app->setAlert('Minimum of four characters!', $status);
  
    } else {

        // Check if Board already exist
        $stmt = $app->myQuery(
            "SELECT uid FROM pin_boards WHERE board_slug = ? AND uid = ?",
            "ss",
            [$slug, $uid]
        );

        if($stmt->num_rows > 0) {

            $msg = 'Board already exist';

        } else {

            $query = $app->myQuery(
                "INSERT INTO pin_boards (uid, board_name, board_slug) VALUES (?, ?, ?)",
                "sss",
                [$uid, $boardName, $slug]
            );
        
        
            if ($app->affected_rows > 0) {
        
                $status = "success";
                $msg = 'Board saved successfully!';
        
            } else {
        
                $msg = 'Failed to save Board.';
            }
        }


        $app->setAlert($msg, $status);
    }


    $result = $app->getAlert('Board Notification');
    exit;
}

// Display MoodBoard
if (isset($_POST['showboard'])) {
    
    $id = $app->post('id');
    $app->showMoodBoard($id);
}

if (isset($_POST['delete'])) {
    
    $delete = $app->post('delete') ?? '';
    $moodboard = $app->post('board') ?? '';

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


    if ($app->affected_rows > 0) {

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