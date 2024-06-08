<?php
// If the request is for a file that exists, serve it as is
if (file_exists(__DIR__ . $_SERVER['REQUEST_URI'])) {
    return false;
}
var_dump($_SERVER['REQUEST_URI']);
// Otherwise, route the request to index.php
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
