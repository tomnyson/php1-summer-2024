<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    include_once('./provider.php');
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // var_dump($_POST);
        // var_dump($_POST['username']); empty
        if (isset($_POST['username'])) {
            if (empty($_POST['username'])) {
                // them item vao mang
                $errors['username'] = "username is required";
            }
        }
        if (isset($_POST['password'])) {
            if (empty($_POST['password'])) {
                $errors['password'] = "password is required";
            } else {
                if (strlen($_POST['password']) < 6) {
                    $errors['password'] = "password lon hon 6 ki tu";
                }
            }
        }
        if (isset($_POST['passwordconfirm'])) {
            if (empty($_POST['passwordconfirm'])) {
                $errors['passwordconfirm'] = "password confirm is required";
            } else {
                if ($_POST['passwordconfirm'] != $_POST['password']) {
                    $errors['passwordconfirm'] = "password confirm not match";
                }
            }
            /**
             * password is required, >6 ki tu
             * passwordConfirm giong nhu password
             */
            if (isset($_POST['email'])) {
                if (empty($_POST['email'])) {
                    $errors['email'] = "email is required";
                } else {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = "invalid email format";
                    }
                }
            }
            if (isset($_POST['role'])) {
                if (empty($_POST['role'])) {
                    $errors['role'] = "role is required";
                }
            }
            // var_dump($errors);
        }
    }

    /**
     * validate username and password ko duoc tron
     *
     */
    ?>
    <div class="container">
        <h1>Đăng ký</h1>
        <form method="post" action="./register.php">
            <label for="username">Username</label>
            <?php
            $username = "";
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
            }
            $password = "";
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }
            $email = "";
            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }
            $passwordconfirm = "";
            if (isset($_POST['passwordconfirm'])) {
                $passwordconfirm = $_POST['passwordconfirm'];
            }
            ?>
            <input class="form-control mb-3" type="text" name="username" value="<?php echo  $username; ?>" placeholder="nhap tai khoan">
            <?php
            if (isset($errors['username'])) {
                echo "<p class='text-error'>$errors[username]</p>";
            }

            ?>

            <label for="username">Email</label>
            <input class="form-control mb-3" type="text" name="email" value="<?php echo $email ?>" placeholder="nhap email">
            <?php
            if (isset($errors['email'])) {
                echo "<p class='text-error'>$errors[email]</p>";
            }

            ?>

            <label for="password">Password</label>

            <input class="form-control  mb-3" type="text" name="password" value="<?php echo $password ?>" placeholder="nhap mat khau">
            <?php
            if (isset($errors['password'])) {
                echo "<p class='text-error'>$errors[password]</p>";
            }
            ?>

            <label for="password">Confirm password</label>

            <input class="form-control  mb-3" type="text" name="passwordconfirm" value="<?php echo $passwordconfirm ?>" placeholder="nhap lai mat khau">
            <?php
            if (isset($errors['passwordconfirm'])) {
                echo "<p class='text-error'>$errors[passwordconfirm]</p>";
            }
            ?>

            <select class="form-select mb-3" name="role">
                <option value="">chọn quyền</option>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
            <?php
            if (isset($errors['role'])) {
                echo "<p class='text-error'>$errors[role]</p>";
            }
            ?>

            <input class="btn btn-primary " type="submit" name=submit value="register" />
            <?php
            // if (count($errors) > 0) {
            //     foreach ($errors as $err) {
            //         echo "<p class='text-error'>$err</p>";
            //     }
            // }
            ?>
        </form>
    </div>
</body>

</html>