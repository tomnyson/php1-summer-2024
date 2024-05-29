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
    $email =  $dbHelper->select("SELECT email FROM users WHERE email = ?", [$email]);
    var_dump($email);
    if (count($email) > 0) {
        return true;
    }
    return false;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    echo "<br/>";
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
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
            } else {
                $email = $_POST['email'];
            }
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
    if (isset($_FILES['avatar']) && !$_FILES['avatar']['error'] > UPLOAD_ERR_OK) {
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $IMAGE_TYPES = array('jpg', 'jpeg', 'png');

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $errors['avatar'] = "folder upload not found";
        }

        if (!in_array($imageFileType, $IMAGE_TYPES)) {
            $errors['avatar'] = "avatar type must is image format";
        }

        if (
            $_FILES['avatar']["size"] > 1000000
        ) {
            $errors['avatar'] = "avatar too large";
        }
        // check type

        var_dump($imageFileType);
        /**
         *  type file allow image [jpeg, png, jpg]
         *  type size: 5M
         */
    } else {
        $avatar = null;
    }

    if (count($errors) == 0) {
        $avatar = null;
        // upload image to server
        if (isset($_FILES['avatar']) && !$_FILES['avatar']['error'] > UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                $avatar = htmlspecialchars(basename($_FILES["avatar"]["name"]));
                echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $isCreate = $dbHelper->insert('users', array(
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "role" => $role,
            "address" => $address,
            "avatar" => $avatar,
            "phone" => $phone,
            "status" => $status
        ));
        var_dump($isCreate);
    }
}
