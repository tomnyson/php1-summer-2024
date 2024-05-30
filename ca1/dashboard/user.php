<?php
ini_set('display_errors', '1');
require('./DBUtil.php');

use MailService\MailService as MailService;

require_once('./MailService.php');
$dbHelper = new DBUntil();


function forgotPassword()
{
    global $dbHelper;
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        /**
         * check ton tai tai khoan email
         */


        $email = $_POST['email'];
        $users = $dbHelper->select("select * from users where email = :email", ['email' => $email]);
        if ($users && count($users) > 0) {
            $six_digit_random_number = random_int(100000, 999999);
            // update code database
            $updateUser = $dbHelper->update("users", array(
                'otp' => $six_digit_random_number,
                'otpCreated' => date('Y-m-d H:i:s', strtotime('+1 hour'))
            ), "email='$email'");
            var_dump($updateUser);
            // send email
            MailService::send(
                'tabletkindfire@gmail.com',
                'tabletkindfire@gmail.com',
                'forgot password',
                "
                <a href='http://localhost/php1-summer-2024/ca1/dashboard/reset-password.php?email=$email'>reset password</a>
                your token is: <b> $six_digit_random_number <b>"
            );
        } else {
            $errors['email'] = "email not exist";
        }
    }
}


function resetPassword()
{
    global $dbHelper;
    if (
        isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['otp']) && !empty($_POST['otp']
            && isset($_POST['password']) && !empty($_POST['password']))
    ) {
        /**
         * check ton tai tai khoan email
         */
        $email = $_POST['email'];
        $otp = $_POST['otp'];
        $isCheck = $dbHelper->select("select * from users where email = :email and otp = :otp and otpCreated >= :current", [
            'email' => $email,
            'otp' => $otp,
            'current' => date('Y-m-d H:i:s')
        ]);
        var_dump($isCheck);
        if ($isCheck && count($isCheck) > 0) {
        } else {
            $errors['email'] = "email not exist";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "forgot": {
                forgotPassword();
                break;
            }
        case "reset": {
                resetPassword();
                break;
            }
    }
}
