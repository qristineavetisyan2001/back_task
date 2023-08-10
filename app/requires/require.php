<?php
    require "app/config/config.php";
    require "app/liberies/Controller.php";
    require "app/liberies/Route.php";
    require "app/liberies/Database.php";
    require "app/helpers/functions.php";

    $route = new Route;
// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods (e.g., GET, POST, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Allow specific HTTP headers (e.g., Content-Type, Authorization, etc.)
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Allow cookies and credentials in the request (if needed)
header("Access-Control-Allow-Credentials: true");

// Handle preflight requests for complex HTTP methods (e.g., PUT, DELETE) and
// set the Access-Control-Max-Age header to the number of seconds the results
// can be cached, which helps in reducing the number of preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Max-Age: 3600");
    exit();
}

// Your regular PHP code here to handle the login request
// ...















?>
