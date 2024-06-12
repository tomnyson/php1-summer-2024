<?php
define("VNPAY_TMN_CODE", "ZSZIOE9N");
define("VNPAY_HASH_SECRET", "JOFUVFLCWAIJCIHEBVPVWOGVESWVVVBW");
define("VNPAY_URL", "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html");
define("VNPAY_RETURN_URL", "http://localhost/php1-summer-2024/ca1/malefashion/index.php?view=shop_list");

class PaymentService
{
    static public function createUrlPayment($orderId, $total)
    {
        $vnp_TmnCode = VNPAY_TMN_CODE;
        $vnp_HashSecret = VNPAY_HASH_SECRET;
        $vnp_Url = VNPAY_URL;
        $vnp_Returnurl = VNPAY_RETURN_URL;

        $vnp_TxnRef = $orderId; // Mã đơn hàng
        $vnp_OrderInfo = 'Thanh toan don hang test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100; // Số tiền thanh toán
        $vnp_Locale = 'vn';
        $vnp_IpAddr =  $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        echo $vnp_Url;
        die;
        // die;
        header('Location: ' . $vnp_Url);
    }
}