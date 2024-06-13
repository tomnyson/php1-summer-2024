<?php
session_start();
include_once('./DBUtil.php');
include_once('./cart.php');
ini_set('display_errors', '1');

use MailService\MailService as MailService;

require_once('./MailService.php');

$carts =  new Cart();
$dbHelper = new DBUntil();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    if ($action == 'add') {

        $id = $_GET['id'];
        $detail = $dbHelper->select("select * from products where id = :id", ['id' => $id]);
        if (count($detail) > 0) {
            $carts->add(array(
                'id' => $detail[0]['id'],
                'name' => $detail[0]['name'],
                'price' => $detail[0]['price'],
                'quantity' => 1,
            ));
            header('Location: index.php?view=cart');
        }
    } elseif ($action == 'remove') {
        $id = $_GET['id'];
        var_dump($_GET);
        $carts->remove($id);
        header('Location: index.php?view=cart');
    } elseif ($action == 'save_order') {
        /**
         * step 1: lưu bảng order
         
         
         
         * step 2: lưu bảng order_details
         */
        $isCreate = $dbHelper->insert('orders', array(
            'userId' => $_POST['1'],
            'note' => $_POST['note'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'total' => $cart->getTotal(),
            'status' => $_POST['status'],
            'createdAt' => date('Y-m-d H:i:s'),

        ));
        var_dump($isCreate);
        header('Location: index.php?view=cart');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    $action = $_POST['action'];
    if ($action == 'save_order') {
        /**
         * step 1: lưu bảng order
         
         
         
         * step 2: lưu bảng order_details
         */
        $isCreate = $dbHelper->insert('orders', array(
            'userId' => 1,
            'note' => $_POST['note'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'total' => $carts->getTotal(),
            'status' => 0,
            'createdAt' => date('Y-m-d H:i:s'),

        ));
        foreach ($carts->getCart() as $item) {
            $dbHelper->insert('order_details', array(
                'orderId' => $isCreate,
                'productId' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ));
        }
        $total = $carts->getTotal();
        $itemRender = "";
        foreach ($carts->getCart() as $item) {
            $itemRender .= "<li>$item[name] price: $item[price] quantity: $item[quantity]/</li>";
        }
        $html = "
            <h1>Order Details</h1>
            <h2>Total: $total</h2>
            <h2>address: $_POST[address]</h2>
            <h2>phone: $_POST[phone]</h2>
            <h2>note: $_POST[note]</h2>
            <h2>order items</h2>
            <ul>
                 $itemRender
            <ul>
        ";

        MailService::send(
            'tabletkindfire@gmail.com',
            'tabletkindfire@gmail.com',
            'order list ',
            $html
        );
        // $carts->clearCart();
        header('Location: index.php?view=thankyou');
    }
}
