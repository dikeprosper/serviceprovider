<?php
include 'includes/liveServer.php';
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
        // $this->query = new Myquery($this->db);
        include 'includes/global_classes.php';

        // Make this app instance available to the Router
        Router::setApp($this);

    }

    public function myQuery($stmt) {

       return $this->db->query($stmt);
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
}

$app = new app();
$currentUser = $_SESSION['user'] ?? null;