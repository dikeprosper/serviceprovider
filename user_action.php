<?php
include 'config/config.php';
header('Content-Type: application/json');


// Check if this is an AJAX request with filter data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['validateUser'])) {

        $email = htmlspecialchars($_POST['email']) ?? '';
    
        // Fetch users from the database
        $query = "SELECT * FROM user WHERE email = ?";
        $result = $app->myQuery($query, "s", [$email]);
    
        if ($result && $result->num_rows > 0) {
            
            $msg = "Email already exist";
            $error = 1;
    
        } else {
    
            $msg = "Looks good";
            $error = 0;
        }
    
        // Return JSON response
        echo json_encode(['msg' => $msg, 'errorNum' => $error]);
        exit;

    }

    if(isset($_POST['username'])) {

        $username = htmlspecialchars($_POST['username']) ?? '';
    
        // Replace empty space with underscore
        $username = str_replace(' ', '_', $username);
        
        // Fetch users from the database
        $query = "SELECT * FROM user WHERE username = ?";
        $result = $app->myQuery($query, "s", [$username]);
    
        if ($result && $result->num_rows > 0) {
            
            $msg = "Username already exist";
            $error = 1;
    
        } else {
    
            $msg = "Looks good";
            $error = 0;
        }
    
        // Return JSON response
        echo json_encode(['msg' => $msg, 'errorNum' => $error]);
        exit;

    }
    
    if(isset($_POST['reg_username'])) {

        $app->csrfVerify();

        $register = $app->user->register();
        
        if($_SESSION['user']) {

            header('Location: ' . SITE_URL . 'dashboard');
        } else {

            header('Location: ' . SITE_URL . 'register');
        }
        
    }

    if(isset($_POST['login'])) {

        $app->csrfVerify();

        $login = $app->user->login();

        if($_SESSION['user']) {

            header('Location: ' . SITE_URL . 'dashboard');
        } else {

            header('Location: ' . SITE_URL . 'login');
        }
    }

}


exit;
