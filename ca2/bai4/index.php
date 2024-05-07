<!DOCTYPE html>
<title>bai 2</title>
<link rel="stylesheet" href="./style.css">

<head></head>

<body>
    <h1>bai 4 array </h1>
    <?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    /**
     * mang => array
     */
    $mang_sinhvien = array("pk001", "pk002", "pk003", "pk004", "pk005", "pk006");
    // in mang debug
    echo "<pre>";
    var_dump($mang_sinhvien);
    echo "</pre>";
    // truy xuat bien $mang[0]
    echo "$mang_sinhvien[2]";
    // gan bien $mang[0] = xxx;
    $mang_sinhvien[3] = "pk03886";
    echo "<pre>";
    var_dump($mang_sinhvien);
    echo "</pre>";
    // duyet mang 
    // count => do dai cua mang
    for ($i = 0; $i < count($mang_sinhvien); $i++) {
        echo $mang_sinhvien[$i] . "<br>";
    }
    foreach ($mang_sinhvien as $sv) {
        echo $sv . "<br>";
    }
    $array_songuyen = array(0, 2, 5, 1, 2, 7, 8, 9, 16, 1, 6);
    /**
     * 1. in ra gia tri chan cua mang
     * 2. tim gia tri lon nhat của mang
     * 4. tim vi tri nho nhat cua mang
     * 3  tim gia tri nho nhat cua mang
     * 5. tim nhung so nguyen to
     * 6. tim nhung so chinh phuong
     * 7. tim nhung so hoan hao
     * 8 tinh tong cua mang
     * 9 sap xep mang tang dan
     */

    //bai 1
    for ($i = 0; $i < count($array_songuyen); $i++) {
        if ($array_songuyen[$i] % 2 == 0) {
            echo $array_songuyen[$i] . "<br/>";
        }
    }
    //bai2
    $max = $array_songuyen[0];
    for ($i = 0; $i < count($array_songuyen); $i++) {
        if ($array_songuyen[$i] > $max) {
            $max = $array_songuyen[$i];
        }
    }
    echo " $max " . "<br/>";
    echo " <br/>";
    //bai 3
    $min = $array_songuyen[0];
    $vi_tri = 0;
    for ($i = 0; $i > count($array_songuyen); $i++) {
        if ($array_songuyen[$i] < $min) {
            $min = $array_songuyen[$i];
            $vi_tri = $i;
        }
    }
    echo "$vi_tri " . "<br/>";
    echo "$min " . "<br/>";
    echo "<br/>";
    // bai 8
    $tong = 0;
    for ($i = 0; $i < count($array_songuyen); $i++) {
        $tong += $i;
    }
    echo "tong cac so trong mang: $tong";
    function ktNguyenTo($n)
    {
        if ($n < 2) {
            return false;
        }
        for ($i = 2; $i < $n; $i++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
    for ($i = 0; $i < count($array_songuyen); $i++) {
        if (ktNguyenTo($array_songuyen[$i]))
            echo "so nguyen to la $array_songuyen[$i]";
    }
    /**
     * 
     */
    function print_format($a)
    {
        echo "<pre>";
        var_dump($a);
        echo "</pre>";
    }
    echo "<h1>mảng liên kêt </h1>";
    $taikhoan = array(
        'username' => 'admin',
        'password' => '123456',
        'email' => 'admin@mail.com',
        'name' => 'admin',
        'role' => 'admin',
    );
    print_format($taikhoan);

    //xuat gia tri
    echo $taikhoan['username'];
    // set gia tri
    $taikhoan['role'] = 'user';
    print_format($taikhoan);
    foreach ($taikhoan as $key => $value) {
        echo "key = " . $key . "<br/>";
        echo "value=" . $value . "<br/>";
        echo "<hr/>";
    }
    $ds_taikhoan = array(
        array(
            'username' => 'admin',
            'password' => '123456',
            'email' => 'admin@mail.com',
            'name' => 'admin',
            'role' => 'admin',
        ),
        array(
            'username' => 'user12',
            'password' => '123456',
            'email' => 'admin@mail.com',
            'name' => 'user',
            'role' => 'user',
        ),
        array(
            'username' => 'user111',
            'password' => '123456',
            'email' => 'admin@mail.com',
            'name' => 'user',
            'role' => 'user',
        )
    );
    for ($i = 0; $i < count($ds_taikhoan); $i++) {
        print_format($ds_taikhoan[$i]);
        echo "<hr/>";

        echo "username" . $ds_taikhoan[$i]['username'];
        echo "password" . $ds_taikhoan[$i]['password'];
        echo "email" . $ds_taikhoan[$i]['email'];
        echo "name" . $ds_taikhoan[$i]['name'];
        echo "role" . $ds_taikhoan[$i]['role'];
    }
    /**
     * đến sl tài khoản là admin và user
     */
    $Sl_admin = 0;
    $Sl_user = 0;
    for ($i = 0; $i < count($ds_taikhoan); $i++) {
        if ($ds_taikhoan[$i]['role'] == "admin") {
            $Sl_admin++;
        } elseif ($ds_taikhoan[$i]['role']) {
            $Sl_user++;
        }
    }
    echo "<hr/>";
    echo "Sl tai khoan admin: " . $Sl_admin . "<br/>";
    echo "Sl tai khoan user: " . $Sl_user;
    // taikhoan_moi
    $taikhoan_moi = array(
        'username' => 'taikhoanmoi',
        'password' => '123456',
        'email' => 'admin@mail.com',
        'name' => 'user',
        'role' => 'user',
    );
    // them moi 1 item trong  mang
    echo "<hr/>";
    array_push($ds_taikhoan, $taikhoan_moi);
    print_format(($ds_taikhoan));
    // xoa 1 phan tu trong mang
    array_pop($ds_taikhoan);
    echo "<hr/>";
    print_format(($ds_taikhoan));
    // chỉ giữa lại admin và xóa tài khoản user
    for ($i = count($ds_taikhoan) - 1; $i > 0; $i--) {
        echo "aaaa";
        if ($ds_taikhoan[$i]['role'] == 'user') {
            array_splice($ds_taikhoan, $i, 1);
        }
    }
    for ($i = 0; $i < count($ds_taikhoan); $i++) {
        echo "aaaa";
        if ($ds_taikhoan[$i]['role'] == 'user') {
            unset($ds_taikhoan[$i]);
        }
    }
    echo "111<hr/>";
    print_format($ds_taikhoan);
    echo "122<hr/>";
    print_format($ds_taikhoan)
    ?>


</body>

</html>