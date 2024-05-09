<?php

use user\User as UserAlias;
use admin\User as AdminAlias;
use company\Company as companyAlias;

error_reporting(E_ALL);
ini_set('display_errors', '1');
include "admin/user.php";
include "user/user.php";
include "company/company.php";
$user = new UserAlias("user", "123456", "admin@gmail.com", "admin", 1);
$admin = new AdminAlias("admin", "123456", "admin@gmail.com", "admin", 1);
$user->xuatThongTin();
$admin->xuatThongTin();

class Profile
{   //promote php 8
    public function __construct(public $ten)
    {
        $this->ten = $ten;
    }
    public function xuatThongTin()
    {
        print("hello $this->ten");
    }
}
$ten = new Profile("Nguyen Van a");
$ten->xuatThongTin();
$company = new companyAlias("pk02224", "anh", "phong ban 1", "10trieu", 5000000);
$company->xuatThongTin();


/**
 * 
 */
