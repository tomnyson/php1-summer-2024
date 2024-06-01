<?php
session_start();
include_once('../DBUtil.php');
include_once('../Message.php');
ini_set('display_errors', '1');
$id = $_GET['id'];

$dbHelper = new DBUntil();
$categories = $dbHelper->delete("categories", "id = $id");
header("Location: ../category.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$message = new Message();
$message->setMessage("xóa thành công", "success");
