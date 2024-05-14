<?php
ini_set('display_errors', '1');
include "./DBUtils.php";

$dbHelper = new DBUtils();
$categories  = $dbHelper->select("select * from categories");
var_dump($categories);