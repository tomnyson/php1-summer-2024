<?php
include_once('../DBUtil.php');
ini_set('display_errors', '1');
$id = $_GET['id'];

$dbHelper = new DBUntil();
$categories = $dbHelper->delete("categories", "id = $id");
header("Location: ../category.php");
