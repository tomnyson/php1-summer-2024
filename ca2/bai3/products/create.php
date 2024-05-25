<?php
session_start();
ini_set('display_errors', '1');
include __DIR__ . "/../DBUtils.php";
$dbHelper = new DBUtils();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'create': {
                if (isset($_POST['name'])) {
                    if (empty($_POST['name'])) {
                        $errors['name'] = "Phải Nhập name";
                    }
                    if (empty($_POST['img'])) {
                        $errors['img'] = "Phai gan link image";
                    }
                    if (empty($_POST['description'])) {
                        $errors['description'] = "P";
                    }
                    if (empty($_POST['price'])) {
                        $errors['price'] = "nhap so > 0 ";
                    }
                    if (empty($_POST['quantity'])) {
                        $errors['quantity'] = "nhap so > 0 ";
                    }
                    if (empty($_POST['sale'])) {
                        $errors['sale'] = "phai nhap sale ";
                    }
                    if (empty($_POST['status'])) {
                        $errors['status'] = "phai nhap status ";
                    }
                    if (empty($errors)) {
                        $created =  $dbHelper->insert(
                            "products",
                            array(
                                'name' => $_POST['name'],
                                'price' => $_POST['price'],
                                'img' => $_POST['img'],
                                'description' => $_POST['description'],
                                'quantity' => $_POST['quantity'],
                                'sale' => $_POST['sale'],
                                'status' => $_POST['status']

                            )
                        );
                        $_SESSION['message_success'] = "thêm thành công";
                        header("Location: index.php");
                    }
                }
            }
            break;
        case 'delete': {
                $id = $_POST['id'];
                $result = $dbHelper->delete('products', 'id=' . $id);
            }
            break;
    }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DEMO CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        <a href="index.php" class="btn btn-success" name="action" value="create" type="submit">danh sách sản phẩm </a>
        <form action="create.php" method="post">
            <input type="text" class="form-control" placeholder="enter name" name="name"> <br>
            <?php if (isset($errors['name'])) {
                echo "<br/><span class='text-danger mt-5'> $errors[name] <span><br/>";
            }
            ?>
            <input type="text" class="form-control" placeholder="enter img" name="img"> <br>
            <?php if (isset($errors['img'])) {
                echo "<br/><span class='text-danger mt-5'> $errors[img] <span><br/>";
            }
            ?>
            <input type="text" class="form-control" placeholder="enter description" name="description"> <br>
            <?php if (isset($errors['description'])) {
                echo "<br/><span class='text-danger mt-5'> $errors[description] <span><br/>";
            }
            ?>
            <input type="text" class="form-control" placeholder="enter price" name="price"> <br>
            <?php if (isset($errors['price'])) {
                echo "<br/><span class='text-danger mt-5'> $errors[price] <span><br/>";
            }
            ?>
            <input type="text" class="form-control" placeholder="enter quantity" name="quantity"> <br>
            <?php if (isset($errors['quantity'])) {
                echo "<br/><span class='text-danger mt-5'> $errors[quantity] <span><br/>";
            }
            ?>
            <input type="text" class="form-control" placeholder="enter sale" name="sale"> <br>
            <?php if (isset($errors['sale'])) {
                echo "<br/><span class='text-danger mt-5'> $errors[sale] <span><br/>";
            }
            ?>
            <input type="text" class="form-control" placeholder="enter status" name="status"> <br>
            <?php if (isset($errors['status'])) {
                echo "<br/><span class='text-danger mt-5'> $errors[status] <span><br/>";
            }
            ?>
            <button value="create" class="btn btn-primary" type="submit" name="action" value="create">create</button>

        </form>`
    </div>
</body>

</html>