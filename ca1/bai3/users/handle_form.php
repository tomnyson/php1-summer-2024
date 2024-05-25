<?php
include_once('../DBUtil.php');
$dbHelper = new DBUntil();

function isVietnamesePhoneNumber($number)
{
    return preg_match('/^(03|05|07|08|09|01[2689])[0-9]{8}$/', $number) === 1;
}

function ischeckmail($email)
{
    $dbHelper = new DBUntil();
    return $dbHelper->select("SELECT email FROM users WHERE email") !== $email;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if (!isset($_POST['username']) || empty($_POST['username'])) {
        $errors['username'] = "username is required";
    } else {
        $username = $_POST['username'];
    }
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $errors['email'] = "email is required";
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        } else {
            if (ischeckmail($_POST["email"])) {
                $errors['email'] = "email da ton tai";
            }
            $email = $_POST['email'];
        }
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $errors['password'] = "password is required";
    } else {
        $password = $_POST['password'];
    }
    if (!isset($_POST['address']) || empty($_POST['address'])) {
        $errors['address'] = "address is required";
    } else {
        $address = $_POST['address'];
    }
    if (!isset($_POST['phone']) || empty($_POST['phone'])) {
        $errors['phone'] = "phone is required";
    } else {
        if (!isVietnamesePhoneNumber($_POST['phone'])) {
            $errors['phone'] = "phone number not correctly formatted";
        } else {
            $phone = $_POST['phone'];
        }
    }
    if (!isset($_POST['role']) || empty($_POST['role'])) {
        $errors['role'] = "role is required";
    } else {
        $role = $_POST['role'];
    }
    if (!isset($_POST['status']) || empty($_POST['status'])) {
        $errors['status'] = "status is required";
    } else {
        $status = $_POST['status'];
    }
    if (count($errors) == 0) {
        $isCreate = $dbHelper->insert('users', array(
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "role" => $role,
            "address" => $address,
            "phone" => $phone,
            "status" => $status
        ));
        var_dump($isCreate);
    }
}
