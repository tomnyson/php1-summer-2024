<?php
// index.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Autoload classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require_once $class . '.php';
});

// Load config
$config = require 'config/config.php';

// Get the requested path and language
$request = $_SERVER['REQUEST_URI'];
$lang = $_GET['lang'] ?? $config['default_language'];

// Simple routing
if ($request == '/' || $request == '/index') {
    $controller = new Controllers\HomeController();
    $controller->index($translations);
} else {
    http_response_code(404);
    echo "Page not found";
}
