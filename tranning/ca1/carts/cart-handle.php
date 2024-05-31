<?php
ini_set('display_errors', '1');
require_once('./cart-services.php');
$carts = new Cart();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    if ($action == 'add') {
        echo "add cart";
        $carts->add(
            array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'img' => $_POST['img']
            )
        );
    } else if ($action == 'clear') {
        $carts->clear();
    }
    header('Location: cart.php');
}
