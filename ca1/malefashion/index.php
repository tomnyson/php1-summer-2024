<?php
session_start();
ob_start();
include_once('./DBUtil.php');
require_once('./cart-services.php');
$carts = new Cart();
include_once('./includes/header.php');
include_once('./includes/menu.php');




?>
<div class="col-md-12">
    <?php


    $view = isset($_GET['view']) ? $_GET['view'] : 'index';
    switch ($view) {
        case 'shop_list':
            include_once('./shop/list.php');
            break;
        case 'shop_detail':
            include_once('./shop/detail.php');
            break;
        case "cart":
            include_once('./shopping-cart.php');
            break;
        case "checkout":
            include_once('./checkout.php');
            break;
        case "login":
            include_once('./auth/login.php');
            break;
        case "order_success":
            include_once('./order_success.php');
            break;
        case "user_profile":
            include_once('./order_profile.php');
    }
    ?>

</div>
<?php include_once('./includes/footer.php');
ob_flush();
?>