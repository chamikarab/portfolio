<?php

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
// Allow admin routes to bypass maintenance mode so admins can always access login and dashboard
$requestUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$isAdminRoute = strpos($requestUri, '/admin') === 0 || $requestUri === '/login';

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php') && !$isAdminRoute) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
