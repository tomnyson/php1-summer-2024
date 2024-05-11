<?php

use opp\Nguoi as NguoiAlias;

spl_autoload_register(function ($class) {
    $filename = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    $new_filename = str_replace("\\", "/",  $filename);
    if (file_exists($new_filename)) {
        print(" " . $filename);
        include $new_filename;
    }
});

// error_reporting(E_ALL);
ini_set('display_errors', '1');
$nguoi = new NguoiAlias("abc1", 12, "nam", "daklak");
$nguoi->xinchao();

/**
 * tạo 1 file Product -> tạo class cơ bản (id, name, price)
 * tạo 1 file Category -> tạo class cơ bản (id, name)
 * dùng  namespace và autoload để load lên ở index
 */
