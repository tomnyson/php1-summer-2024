<?php
include("opp/Nguoi.php");

use opp\Nguoi as op;
use opp\Nguoi as op2;

// spl_autoload_register(function($class) {

// })
// error_reporting(E_ALL);
ini_set('display_errors', '1');
$nguoi = new op("abc1", 12, "nam", "daklak");
$nguoi->xinchao();

$nguoi = new op2("abc2", 12, "nam", "daklak");
$nguoi->xinchao();
