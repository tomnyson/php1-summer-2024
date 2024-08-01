<?php
ini_set('display_errors', '1');
define('ROOTPATH', __DIR__);

define("VNPAY_TMN_CODE", "ZSZIOE9N");
define("VNPAY_HASH_SECRET", "JOFUVFLCWAIJCIHEBVPVWOGVESWVVVBW");
define("VNPAY_URL", "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html");
define("VNPAY_RETURN_URL", "http://localhost/php1-summer-2024/ca1/malefashion/cart-handle.php");
function asset_url($path)
{
    $root = str_replace($_SERVER['DOCUMENT_ROOT'], '', ROOTPATH);
    return $root . '/' . $path;
}
