<?php
session_start();
ini_set('display_errors', '1');

require_once('./cart-services.php');
include_once('./DBUtil.php');
$carts = new Cart();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        // lấy id tự sinh của order
        // lặp cart hiện tại và lưu vào bảng order detail
    }
    header('Location: index.php?view=cart');
}