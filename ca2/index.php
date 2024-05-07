<!DOCTYPE html>
<title>bai 1</title>
<link rel="stylesheet" href="./style.css">

<head></head>

<body>
    <?php
    // bat dau viet php
    /**
     * 1. cach khai bao bien;
     */
    $a = 5;
    $b = 5.5;
    $c = "LE HONG SON";
    $d = true;
    // cach xuat ra man hinh

    // toan tu so hoc
    $cong = $a + $b;
    echo "cong = $cong <br>";
    $tru = $a - $b;
    echo "tru = $tru <br>";
    $nhan = $a * $b;
    echo "nhan = $nhan <br>";
    $chia = $a / $b;
    echo "chia = $chia  ";
    $chialaydu = $a % $b;
    echo "chialaydu = $chialaydu ";


    // toan tu so sanh
    $lon = $a > $b;
    echo "lon = $lon <br>";

    $be = $a < $b;
    echo "be = $be <br>";

    $bangnhau = $a == $b;
    echo "bangnhau = $bangnhau <br>";

    $lonhonhoacbang = $a >= $b;
    echo "lonhonhoacbang = $lonhonhoacbang <br>";

    $behonhoacbang = $a <= $b;
    echo "behonhoacbang = $behonhoacbang <br>";
    // toan tu gan
    $tong += $a;
    echo "tong = $tong <br>";
    $tich *= $a;
    echo "tich = $tich <br>";
    $hieu -= $a;
    echo "hieu = $hieu <br>";
    $thuong /= $a;
    echo "thuong = $thuong <br>";
    $thuongdu %= $a;
    echo "thuongdu = $thuongdu <br>";

    // echo "gia tri a = $a <br/>";
    // echo "gia tri a = " . $a . "<br/>";
    // print_r("gia tri a = " . $a . "<br/>");
    // print "gia tri a = " . $a . "<br/>";
    // toan tu logic
    $and = $a && $b;
    echo "and = $and <br>";
    $or = $a || $b;
    echo "or = $or <br>";
    $sosanh = $a > $b;
    echo "$a not $b" . !$sosanh;
    define("PI", 3.14);
    // tinh dien tich hinh trong bang cach nhap vao ban kinh
    $r = 5;
    $dientich = PI * $r ^ 2;
    echo "dientich= $dientich  <br>";
    ?>
    <h1>PHP 1 class </h1>
</body>

</html>