<?php
include 'includes/db.php';
include 'includes/traits.php';


class app{

    use traits;

    public $my_directory = '';
    public $db;
    
    public function __construct(){


        // Store the directory path in the class
        $my_directory = realpath(__DIR__ . '/../') . '/';
        $this->my_directory = $my_directory;

        
        // Database Connection
        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DB);
        if ($this->db->connect_error) {
            die("Database Connection Failed:". $this->db->connect_error);
        }
        $this->db->set_charset('utf8mb4');
        

        // Autoloading Classes
        spl_autoload_register(function ($class){
            
            $file = $this->my_directory."globalclasses/$class.php";
            
            if(file_exists($file)){
                
                require_once $file;
            }
        });


        //including my global classes
        include 'includes/global_classes.php';

        // Make this app instance available to the Router
        Router::setApp($this);

    }

    public function myQuery(string $sql, string $types = '', array $params = []) {

        $stmt = $this->db->prepare($sql);

        if ($stmt === false) {
            die("Query prepare failed: " . $this->db->error);
        }

        if ($types !== '') {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        return $stmt->get_result();
    }

    // Sanitize POST input
    public function post($key,$default = null) {

        if(!isset($_POST[$key])){
            return $default;
        }

        $value = trim($_POST[$key]);
        $value = strip_tags($value);

        return $value;
    }

    // -----------------------------------------------
    // CSRF protection
    // -----------------------------------------------

    // Get (or create) the token for this session
    public function csrfToken(): string {

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    // Render a hidden input ready to drop into any <form>
    public function csrfField(): string {

        $token = htmlspecialchars($this->csrfToken(), ENT_QUOTES, 'UTF-8');
        return '<input type="hidden" name="csrf_token" value="' . $token . '">';
    }

    // Verify the token submitted with a POST request.
    // Call this at the top of any script that handles a POST form.
    public function csrfVerify(): bool {

        $submitted = $_POST['csrf_token'] ?? '';
        $expected  = $_SESSION['csrf_token'] ?? '';

        if ($expected === '' || !hash_equals($expected, $submitted)) {

            http_response_code(403);
            $this->setAlert('Your session expired, please try again.', 'danger');
            die('Invalid or expired form submission.');
        }

        return true;
    }

    // -----------------------------------------------
    // Basic rate limiting (per session, per action)
    // -----------------------------------------------

    // Returns true if the action is currently blocked
    public function isRateLimited(string $action, int $maxAttempts = 5, int $lockoutSeconds = 300): bool {

        $bucket = $_SESSION['rate_limit'][$action] ?? null;

        if (!$bucket) {
            return false;
        }

        // Lockout window has passed — reset
        if (time() - $bucket['first_attempt'] > $lockoutSeconds) {
            unset($_SESSION['rate_limit'][$action]);
            return false;
        }

        return $bucket['count'] >= $maxAttempts;
    }

    // Call this every time the action is attempted (success or fail)
    public function recordAttempt(string $action): void {

        if (!isset($_SESSION['rate_limit'][$action])) {
            $_SESSION['rate_limit'][$action] = [
                'count' => 0,
                'first_attempt' => time(),
            ];
        }

        $_SESSION['rate_limit'][$action]['count']++;
    }

    // Call this on a successful login/register to clear the counter
    public function clearAttempts(string $action): void {

        unset($_SESSION['rate_limit'][$action]);
    }
}

$app = new app();
$currentUser = $_SESSION['user'] ?? null;