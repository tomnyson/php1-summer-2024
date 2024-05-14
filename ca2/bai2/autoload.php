<?php
ini_set('display_errors', '1');

use User\User as UserAlias;

spl_autoload_register(function ($class) {
    echo $class;
    echo "spl_autoload_register";
    $file_name = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    $new_filename = str_replace("\\", "/",  $file_name);
    echo $file_name;
    include($new_filename);
});
$user = new UserAlias("user", "123456", "admin@gmail.com", "admin", 1);
$user->xuatThongTin();
