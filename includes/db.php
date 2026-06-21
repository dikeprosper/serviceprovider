<?php

declare(strict_types=1);
session_start();

// Live Server Configuration — auto-detected from the request hostname
$localHosts = ['localhost', '127.0.0.1', '::1'];
$liveServer = !in_array($_SERVER['HTTP_HOST'] ?? '', $localHosts);

if($liveServer) {

    // ── LIVE DATABASE (placeholder — replace before deploying) ──
    define("DBHOST", "localhost");
    define("DBUSER", "admin_user");
    define("DBPASSWORD", "open_1234");
    define("DB", "stichng");

    // Base URL path for LIVE App
    define("URL_PATH", "/");
    define("SITE_URL", "http://stichng.com/");
    
} else {

    // ── LOCAL DATABASE ──
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DB", "stichng");

    define("URL_PATH", "/work/localproviders/");
    define("SITE_URL", "http://localhost/work/localproviders/");
}

$_SESSION['user_type'] = 1;