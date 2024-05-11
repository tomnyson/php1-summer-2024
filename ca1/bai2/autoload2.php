<?php

use opp\product as productAlias;

spl_autoload_register(function ($class) {
    $filename = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    $new_filename = str_replace("\\", "/",  $filename);
    if (file_exists($new_filename)) {
        print(" " . $filename);
        include $new_filename;
    }
});

ini_set('display_errors', '1');
$product = new productAlias(1, "nam", 12);
$product->inThongTin();
