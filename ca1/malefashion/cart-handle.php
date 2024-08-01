<?php
session_start();
ini_set('display_errors', '1');
require_once('./config.php');
require_once('./cart-services.php');
include_once('./DBUtil.php');
$carts = new Cart();
$dbHelper = new DBUntil();
var_dump($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    // var_dump($action);
    // die();
    if ($action == 'add') {
        $carts->add(
            array(
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'img' => $_POST['img']
            )
        );
        // var_dump($carts->getCart());
        // die();
    } else if ($action == 'remove') {
        $carts->remove($_POST['id']);
        // var_dump($carts->getCart());
        // die();
    } else if ($action == 'clear') {
        $carts->clear();
    } else if ($action == "save_order") {
        // save order 
        $dbHelper = new DBUntil();
        $isCreatedOrder = $dbHelper->insert(
            'orders',
            /**
             * status: 0: pending, 1: active, 2: delivery, 3: compelete, -1: destroy
             */
            array(
                'userId' => 22, // cái này lấy từ session đăng nhập
                'total' => $carts->getTotal(),
                'status' => 0,
                'createdAt' => date('Y-m-d H:i:s'),
                'note' =>  "demo note",
                'phone' =>  "1234567890 "
            )
        );
        // var_dump($isCreatedOrder);
        // die();
        foreach ($carts->getCart() as $item) {
            echo "cart item";
            $dbHelper->insert('order_details', array(
                'orderId' => $isCreatedOrder,
                'productId' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],

            ));
        }


        if (isset($_POST['payment']) && $_POST['payment'] == 'vnpay') {

            include_once("./payment-handle.php");
            return PaymentService::createUrlPayment($isCreatedOrder, $carts->getTotal());
            /**
             *  b1: tạo thanh toán url
             */
        }
        $carts->clear();
        // lấy id tự sinh của order
        // lặp cart hiện tại và lưu vào bảng order detail
    }
    header('Location: index.php?view=cart');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    $hashData = "";
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    unset($inputData['vnp_SecureHashType']);
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);

    foreach ($inputData as $key => $value) {
        $hashData .= urlencode($key) . '=' . urlencode($value) . '&';
    }
    $hashData = rtrim($hashData, '&');
    $secureHash = hash_hmac('sha512', $hashData, VNPAY_HASH_SECRET);

    if ($secureHash == $vnp_SecureHash) {
        if ($_GET['vnp_ResponseCode'] == '00') {
            $orderId =  (int)$_GET['vnp_TxnRef'];
            // update status
            $dbHelper->update(
                'orders',
                array('status' => 1),
                "id=$orderId"
            );
            $carts->clear();
            header('Location: index.php?view=order_success');
        } else {
            // Payment failed
            echo "failed";
        }
    } else {
        // Invalid hash
        echo "invalid hash";
    }
}
