<?php
// khai bao hang
define("HOST", "localhost");
define("DB_NAME", "php1-spring-2024");
define("USERNAME", "root");
define("PASSWORD", "");
$conn = NULL;
try {
    $url = "mysql:host=" . HOST . ";dbname=" . DB_NAME . "";
    $conn = new PDO($url, USERNAME, PASSWORD);
    echo "Connection successful";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
