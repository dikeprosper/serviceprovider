<?php

class User {

    use traits;

    public function __construct($myapp) {

        $this->app = $myapp;
    }

    public function login() {

        if ($this->app->isRateLimited('login')) {

            $this->setAlert('Too many login attempts. Please try again in a few minutes.', 'danger');
            return;
        }

        $login = $this->app->post("login");
        $password = $this->app->post("password");

        if (!$login || !$password) {

            $this->setAlert('All fields are required', 'danger');
            return;
        }

       
        $stmt = $this->app->myQuery(
            "SELECT * FROM user WHERE email = ? OR username = ?",
            "ss",
            [$login, $login]
        );

        if($stmt->num_rows < 1) {

            $this->app->recordAttempt('login');
            $this->setAlert('Invalid credentials', 'danger');
            return;
        }

        $row = $stmt->fetch_assoc();

        $password_hash = $row['password'];

        // Verify the password
        if (password_verify($password, $password_hash)) {

            // Password is correct! Log the user in
            $this->app->clearAttempts('login');

            $_SESSION['user'] = [
                        'email' => $row['email'],
                        'username'  => $row['username'],
                        'photo_url'  => $row['photo_url'],
                        'tailor'  => $row['provider']
                        ];


            $this->setAlert('Login successful', 'success');
            return;

        } else {

            // Invalid password
            $this->app->recordAttempt('login');
            $this->setAlert('Invalid credentials', 'danger');
            return;
            
        }
    }

    public function register() {

        if ($this->app->isRateLimited('register', 5, 600)) {

            $this->setAlert('Too many registration attempts. Please try again later.', 'danger');
            return;
        }

        $this->app->recordAttempt('register');

        $email = $this->app->post("email");
        $password = $this->app->post("password");
        $username = $this->app->post("reg_username");

        if (!$email || !$password || !$username) {

            $this->setAlert('All fields are required', 'danger');
            return;
        }

        // Replace empty space with underscore
        $username = str_replace(' ', '_', $username);

        // Check if email already exist
        $stmt = $this->app->myQuery(
            "SELECT uid FROM user WHERE email = ?",
            "s",
            [$email]
        );

        if($stmt->num_rows > 0) {

            $this->setAlert('Email already exist', 'danger');
            return;
        }

        // Hash password
        $hash = password_hash($password,PASSWORD_DEFAULT);

        // Insert user
        $insertOk = $this->app->myQuery(
            "INSERT INTO user (username,email,password) VALUES (?,?,?)",
            "sss",
            [$username, $email, $hash]
        );

        if ($this->app->affected_rows > 0) {

            $this->app->clearAttempts('register');
            $this->setAlert('Registration Successful', 'success');

            // Regenerate session ID for security
            session_regenerate_id(true);
            
            $_SESSION['user'] = [
                'email' => $email,
                'username'  => $username,
                'photo_url'  => "placeholder.webp",
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

        $stmt = $this->app->myQuery(
            "SELECT * FROM user WHERE email = ? AND username = ?",
            "ss",
            [$email, $username]
        );

        if($stmt->num_rows < 1) {

            session_destroy();
            $this->setAlert('User Error', 'danger');
            $this->app->router->redirect(SITE_URL . 'login');
            exit;
        }

        return $stmt->fetch_assoc();
    }
    
}