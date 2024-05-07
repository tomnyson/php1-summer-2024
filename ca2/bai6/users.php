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
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_SESSION['username'])) {
        //redirect to link
        header("Location: index.php");
        exit;
    }

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
     * username, password, email, role
     */

    $ds_users = array(
        array(
            'username' => 'pk003',
            'email' => 'admin@gmail.com',
            'password' => '123456',
            "role" => 'admin',
        ),
        array(
            'username' => 'pk004',
            'email' => 'user@gmail.com',
            'password' => '123456',
            "role" => 'user',
        ),
    );


    ?>
    <div class="container">
        <h1>DS tài khoản</h1>
        <?php
        if (isset($_SESSION['username'])) {
            echo ("<strong>xin chao: $_SESSION[username]</strong>");
        }
        ?>
        <br>
        <a class="btn btn-primary mt-5" href="register.php">Add user</a>
        <table class="table">
            <tr>
                <th>username</th>
                <th>password</th>
                <th>email</th>
                <th>role</th>
            </tr>
            <?php

            if (isset($_SESSION['users'])) {
                foreach ($_SESSION['users'] as $keys => $values) {
                    echo "<tr> 
                    <td> $values[username] </td>
                    <td> $values[password] </td>
                    <td> $values[email] </td>
                    <td> $values[role] </td>
                    </tr>";
                }
            }

            ?>
        </table>
    </div>
</body>

</html>