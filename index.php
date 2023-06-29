<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_URL);

$route = [
    "" => "config/database.php"
];

$render="";

ob_start();

if (!empty($route[$action])) {
    include $route[$action];
} else {
    include "404.php";
}

$render = ob_get_clean();

echo "$render";
