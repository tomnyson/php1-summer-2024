<?php

ini_set('display_errors', '1');
$id = $_GET['id'];
if ($id) {
    $dbHelper = new DBUntil();

    $message = new Message();
    $message->setMessage("xóa thành công", "success");
    // Your code here
    $categories = $dbHelper->delete("categories", "id = $id");
    header("Location: master.php?view=category_list");
}
