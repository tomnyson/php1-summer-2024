<?php
include_once('../DBUtil.php');
$id = $_GET['id'];
ini_set('display_errors', '1');
$dbHelper = new DBUntil();

$categories = $dbHelper->delete("users", "id = $id");
header("Location: index.php");
