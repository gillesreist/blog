<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_URL);

$routes = [
    '' => 'app/controllers/homeController.php',
    'blogpost' => 'app/controllers/blogPostController.php',
    'blogpostCreate' => 'app/controllers/blogPostCreateController.php'
];

$render="";

ob_start();

if (!empty($routes[$action])) {
    require $routes[$action];
} else {
    header("HTTP/1.0 404 Not Found");
    require "ressources/views/errors/404.php";
}

$render = ob_get_clean();
echo "$render";
