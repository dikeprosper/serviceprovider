<?php require_once (__DIR__ . '/config/config.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST'){

    header("location: " . SITE_URL . "login");
    exit;
}

