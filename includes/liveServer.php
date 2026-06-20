<?php

declare(strict_types=1);
session_start();

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASSWORD", "");
define("DB", "stichng");

// Live Server Configuration
$liveServer = false; // Set to true if using Live Server

if($liveServer) {

    // Base URL path for LIVE App
    define("URL_PATH", "/");
    define("SITE_URL", "http://stichng.com/");
    
} else {

    define("URL_PATH", "/work/localproviders/");
    define("SITE_URL", "http://localhost/work/localproviders/");
}

$_SESSION['user_type'] = 1;
