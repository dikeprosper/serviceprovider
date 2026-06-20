<?php

class User {

    use traits;

    public function __construct($myapp) {

        $this->app = $myapp;
    }

    public function login() {

        $login = $this->app->post("login");
        $password = $this->app->post("password");

        if (!$login || !$password) {

            $this->setAlert('All fields are required', 'danger');
            return;
        }

       
        $stmt = $this->app->myQuery("SELECT * FROM user WHERE email = '$login' OR username = '$login'");

        if($stmt->num_rows < 1) {

            $this->setAlert('Invalid credentials', 'danger');
            return;
        }

        $row = $stmt->fetch_assoc();

        $password_hash = $row['password'];

        // Verify the password
        if (password_verify($password, $password_hash)) {

            // Password is correct! Log the user in
            $_SESSION['user'] = [
                        'email' => $row['email'],
                        'username'  => $row['username'],
                        'profile'  => $row['profile'],
                        'tailor'  => $row['provider']
                        ];


            $this->setAlert('Login successful', 'success');
            return;

        } else {

            // Invalid password
            $this->setAlert('Invalid credentials', 'danger');
            return;
            
        }
    }

    public function register() {

        echo "inside here mother fucker";
        $email = $this->app->post("email");
        $password = $this->app->post("password");
        $username = $this->app->post("reg_username");

        if (!$email || !$password || !$username) {

            $this->setAlert('All fields are required', 'danger');
            return;
        }

        // Check if email already exist
        $stmt = $this->app->myQuery("SELECT uid FROM user WHERE email = '$email'");

        if($stmt->num_rows > 0) {

            $this->setAlert('Email already exist', 'danger');
            return;
        }

        // Hash password
        $hash = password_hash($password,PASSWORD_DEFAULT);

        // Insert user
        $stmt = $this->app->myQuery("INSERT INTO user (username,email,password,name,provider,address,bio,specialty) VALUES ('$username','$email','$hash','','','','','')");

        if ($this->app->db->affected_rows > 0) {

            $this->setAlert('Registration Successful', 'success');

            // Regenerate session ID for security
            session_regenerate_id(true);
            
            $_SESSION['user'] = [
                'email' => $email,
                'username'  => $username,
                'profile'  => "placeholder.webp",
                'tailor'  => 0
            ];
            return;
        }

        $this->setAlert('Registration Failed', 'danger');
        return;
        
    }

    public function authCheck() {
    
        if (!isset($_SESSION['user'])) {

            $this->app->setAlert('Please log in to continue', 'danger');
            $this->app->router->redirect(SITE_URL . 'login');
            exit;
        }


        $email = trim($_SESSION['user']['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        
        $username = trim($_SESSION['user']['username']);
        $username = strip_tags($username);
        $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');

        $profile = trim($_SESSION['user']['profile']);
        $profile = strip_tags($profile);
        $profile = htmlspecialchars($profile, ENT_QUOTES, 'UTF-8');

        $stmt = $this->app->myQuery("SELECT * FROM user WHERE email = '$email' AND username = '$username'");

        if($stmt->num_rows < 1) {

            session_destroy();
            $this->setAlert('User Error', 'danger');
            $this->app->router->redirect(SITE_URL . 'login');
            exit;
        }

        return $stmt->fetch_assoc();
    }
}