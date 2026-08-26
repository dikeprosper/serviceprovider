<?php
include 'config/config.php';
// header('Content-Type: application/json');

// for($i = 0; $i < 104; $i ++) {


//     // Update the yard required for each style
//     $query = $app->myQuery(
//        "UPDATE products SET compatible_fabrics = ? WHERE pid = ?",
//        "ss",
//        ["vintage,ankara,plain,linen", $i]
//     );
// }

if(isset($_SESSION['user'])) {

    $currentUser = $app->user->authCheck();
    $uid = $currentUser['uid'];
}

//Save Pin in DataBase
if (isset($_POST['save'])) {
    
    $pid = $app->post('save') ?? '';
    $username = $app->post('username') ?? '';
    $moodboard = $app->post('moodboard') ?? '';

    // Basic validation (you can expand this as needed)
    if (empty($pid) || empty($username) || empty($moodboard)) {

        echo json_encode(['status' => 'error', 'message' => 'Something went wrong please try again later.']);
        exit;
    }

    // Check if Pin already exist
    $stmt = $app->myQuery(
        "SELECT pid FROM pins WHERE pid = ? AND uid = ?",
        "ss",
        [$pid, $uid]
    );

    if($stmt->num_rows > 0) {

        // Update pin board
        $query = $app->myQuery(
            "UPDATE pins SET board = ? WHERE pid = ? AND uid = ?",
            "sss",
            [$moodboard, $pid, $uid]
        );

    } else {

        $query = $app->myQuery(
            "INSERT INTO pins (pid, uid, username, board) VALUES (?, ?, ?, ?)",
            "ssss",
            [$pid, $uid, $username, $moodboard]
        );
    }

    if ($app->affected_rows > 0) {

        $status = "success";
        $nextStep = "<button onclick=\"deletePin('$pid','$moodboard')\" class=\"btn btn-light text-underline py-1 px-2 text-primary ms-3\"> Undo </button>";
        $app->setAlert('PIN saved successfully!', $status);

    } else {

        $nextStep = "";
        $status = "danger";
        $app->setAlert('Failed to save PIN.', $status);
    }

    $result = $app->getAlert($nextStep);
    
    exit;
    // echo json_encode(['status' => $status, 'message' => "$result"]);
}

//Edit Pin in DataBase
if (isset($_POST['update'])) {
    
    $pid = $app->post('update') ?? '';
    $note = $app->post('note') ?? '';
    $moodboard = $app->post('moodboard') ?? '';

    // Basic validation (you can expand this as needed)
    if (empty($pid) || empty($moodboard)) {

        $app->setAlert($eror_msg, 'danger');
        exit;
    }

    // Update pin board
    $query = $app->myQuery(
        "UPDATE pins SET board = ?, note = ? WHERE pid = ? AND uid = ?",
        "ssss",
        [$moodboard, $note, $pid, $uid]
    );

    if ($app->affected_rows > 0) {

        $status = "success";
        $app->setAlert('PIN Updated!', $status);

    } else {

        $status = "success";
        $app->setAlert('No Changes Were Made.', $status);
    }

    exit;
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
                $nextStep = "<a href=\"\" class=\"btn btn-light text-underline py-1 px-2 text-primary ms-3\"> Refresh </a>";
        
            } else {
        
                $msg = 'Failed to save Board.';
                $nextStep = "";
            }
        }


        $app->setAlert($msg, $status);
    }


    $result = $app->getAlert($nextStep);
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
    $dellAll = $app->post('dellAll') ?? '';

    // Basic validation
    if (empty($delete) || empty($moodboard)) {

        echo json_encode(['status' => 'error', 'message' => 'Something went wrong please try again later.']);
        exit;
    }

    if(!empty($dellAll)){

        $query = $app->myQuery(
            "DELETE FROM pins WHERE pid = ? AND uid = ?",
            "ss",
            [$delete, $uid]
        );

    } else {

        $query = $app->myQuery(
            "DELETE FROM pins WHERE pid = ? AND board = ? AND uid = ?",
            "sss",
            [$delete, $moodboard, $uid]
        );
    }


    if ($app->affected_rows > 0) {

        $status = "success";
        $app->setAlert('PIN Removed', $status);

    } else {

        $status = "danger";
        $app->setAlert('Failed to remove PIN.', $status);

    }

    $result = $app->getAlert();
    
    echo json_encode(['status' => $status, 'message' => "$result"]);
}


exit;