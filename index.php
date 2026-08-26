<?php
// Boot the router (all routes are defined inside config.php)
require_once __DIR__ . '/config/config.php';

// $app->setAlert("Entry made successfully", "danger");

$app->routing();