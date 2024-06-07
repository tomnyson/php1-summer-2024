<?php
include_once('./DBUtil.php');
$id = $_GET['id'];
var_dump($id);


$dbHelper = new DBUntil();

$categories = $dbHelper->delete("coupons", "id = $id");
header("Location: index.php");
