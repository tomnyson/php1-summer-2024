<!DOCTYPE html>
<title>bai 2</title>
<link rel="stylesheet" href="./style.css">

<head></head>

<body>
    <h1>PHP 1 class </h1>
    <?php
    // nhap vao x tim show so chan hay so le
    $x = 10;
    if ($x % 2 == 0) {
        echo "$x la so chan";
    } else {
        echo "$x la so le";
    }
    //vd 2: so x co chia het cho 2 va 5 ko?
    if ($x % 2 == 0 && $x % 5 == 0) {
        echo "$x chia het cho ca 2 va 5";
    } else {
        echo "$x khong chia het cho ca 2 va 5";
    }
    // v3 so x co chia het cho 2 or 3 ko?
    if ($x % 2 == 0 || $x % 3 == 0) {
        echo "$x chia het cho 2 hoac 3";
    } else {
        echo "$x khong chia het cho 2 hoac 3";
    }
    // b3 đưa ra xếp loại điểm tb yếu, tb, khá , giỏi , xuất sắc
    echo "<h1>Bai 3 <h1/>";
    $dtb = 100;

    // dk diem [0 -> 10]
    // diem phai la so
    if (is_numeric($dtb) && $dtb >= 0 && $dtb <= 10) {
        if ($dtb >= 9) {
            echo "$dtb Xep loai xuat sac";
        } else if ($dtb >= 8) {
            echo "$dtb Xep loai gioi";
        } else if ($dtb >= 7) {
            echo "$dtb Xep loai kha";
        } else if ($dtb >= 5) {
            echo "$dtb Xep loai trung binh";
        } else {
            echo "$dtb Xep loai yeu";
        }
    } else {
        echo "giá trị ko hợp lê <br/>";
    }
    // switch  case
    /**
     * case 1:
     * case 2:
     * case 5:
     * echo "31 ngay";
     * break;
     */
    $thang = 2;
    $nam = 2004;
    /**
     * nhuan => x%400 || x%4 && !x%100
     * 
     */
    // switch ($thang) {
    //     case 1:
    //         echo "31 ngay";
    //         break;
    //     case 2:
    //         echo "28 or 29 ngay";
    //         break;
    //     case 3:
    //         echo "31 ngay";
    //         break;
    //     case 4:
    //         echo "30 ngay";
    //         break;
    //     case 5:
    //         echo "31 ngay";
    //         break;
    //     case 6:
    //         echo "30 ngay";
    //         break;
    //     case 7:
    //         echo "31 ngay";
    //         break;
    //     case 8:
    //         echo "31 ngay";
    //         break;
    //     case 9:
    //         echo "30 ngay";
    //         break;
    //     case 10:
    //         echo "31 ngay";
    //         break;
    //     case 11:
    //         echo "30 ngay";
    //         break;
    //     case 12:
    //         echo "31 ngay";
    //         break;
    //     default:
    //         echo "thang ko hop le";
    // }
    switch ($thang) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            echo "31 ngay";
            break;
        case 2:
            if ($nam % 400 == 0 || ($nam % 4 == 0 && $nam % 100 != 0)) {
                echo "năm nhuận";
            } else {
                echo "không phải năm nhuận";
            }

            break;
        case 4:
        case 9:
        case 11:
            echo "30 ngay";
            break;
        default:
            echo " thang $thang khong hop le";
    }

    /**
     * Yêu cầu: Viết chương trình PHP để xác định mùa dựa trên tháng nhập vào (1-12).
     * > xuân ->1-4, hạ 4-, thu , đông
     * Mùa xuân bắt đầu từ tháng 3 – và kết thúc tháng 5
     * Mùa hè hay còn gọi là mùa hạ bắt đầu từ tháng 6 –  kết thúc tháng 8
     * Mùa thu sẽ bặt đầu từ tháng 9 – kết thúc tháng 11
     * Mùa đông sẽ bắt đầu từ tháng 12 – kết thúc tháng 2
     */
    switch ($thang) {
        case 3:
        case 4:
        case 5:
            echo "mua xuan";
            break;
        case 6:
        case 7:
        case 8:
            echo "mua he";
            break;
        case 9:
        case 10:
        case 11:
            echo "mua thu";
            break;
        case 12:
        case 1:
        case 2:
            echo "mua dong";
            break;
        default:
            echo " thang $thang khong hop le";
    }
    /*8. Tính thuế thu nhập cá nhân
    Yêu cầu: Viết chương trình PHP để tính thuế thu nhập cá nhân.
    Thu nhập dưới 5,000$ không chịu thuế, từ 5,000$ đến 10,000$ chịu thuế 10%,
    và trên 10,000$ chịu thuế 20%.
    */
    echo "<h1>bai 1</h1><br/>";
    $thunhap = 5000;
    $thue;
    if ($thunhap < 5000) {
        $thue = 5 / 100 * $thunhap;
    } else if ($thunhap < 10000) {
        $thue = 10 / 100 * $thunhap;
    } else {
        $thue = 20 / 100 * $thunhap;
    }
    echo "thue la = $thue <br>";


    /*2. Phân loại điểm số
    Yêu cầu: Viết chương trình PHP để phân loại điểm số của học sinh:
     A (>=90), 
     B (>=80),
      C (>=70), 
      D (>=60), 
      F (<60).
    Sử dụng if-else.
    */
    $dtb = 75;
    if ($dtb >= 90) {
        echo " $dtb Phan loai A";
    } else if ($dtb >= 80) {
        echo " $dtb Phan loai B";
    } else if ($dtb >= 70) {
        echo "$dtb Phan loai C";
    } else if ($dtb >= 60) {
        echo "$dtb Phan loai D";
    } else {
        echo "$dtb Phan loai F";
    }
    ?>

</body>

</html>