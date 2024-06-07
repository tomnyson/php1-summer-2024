<?php
include_once('./DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$categories = $dbHelper->select("select * from categories");
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "name is required";
    }
    if (!isset($_POST["code"]) || empty($_POST['code'])) {
        $errors['code'] = "code is required";
    }
    if (!isset($_POST["quantity"]) || empty($_POST['quantity'])) {
        $errors['quantity'] = "quantity is required";
    }
    if (!isset($_POST["discount"]) || empty($_POST['discount'])) {
        $errors['discount'] = "discount is required";
    }
    if (!isset($_POST["startDate"]) || empty($_POST['startDate'])) {
        $errors['startDate'] = "startDate is required";
    }
    if (!isset($_POST["endDate"]) || empty($_POST['endDate'])) {
        $errors['endDate'] = "endDate is required";
    } else {
        /**
         *  call insert db utils
         */
        $isCreate = $dbHelper->insert('categories', array('name' => $_POST['name']));
        // var_dump($isCreate);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
.txt-danger {
    color: red;
    font-weight: bold;
}
</style>

<body>

    <div class="container mt-3">
        <h2>Danh sách mã giảm giá</h2>
        <form action="index.php" method="post">
            <input class="form-control" type="text" name="name" placeholder="Ten Danh Muc">
            <?php if (isset($errors['name'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[name]</span>";
            } ?>
            <input type="text" name="code" class="form-control mt-3" placeholder="ma khuyen mai">
            <?php if (isset($errors['code'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[code]</span>";
            } ?>
            <input type="number" name="quantity" class="form-control mt-3" placeholder="so luong ma giam gia">
            <?php if (isset($errors['quantity'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[quantity]</span>";
            } ?>
            <input type="number" name="discount" class="form-control mt-3" placeholder="phan tram giam gia">
            <?php if (isset($errors['discount'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[discount]</span>";
            } ?>
            <input type="date" name="startDate" class="form-control mt-3" placeholder="ngay bat dau">
            <?php if (isset($errors['startDate'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[startDate]</span>";
            } ?>
            <input type="date" name="endDate" class="form-control mt-3" placeholder="ngay ket thuc">
            <?php if (isset($errors['endDate'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[endDate]</span>";
            } ?>
            <input type="submit" class="btn btn-success mt-3" value="them moi">

            <?php if (isset($errors['name'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[name]</span>";
            } ?>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            foreach ($categories as $cat) {
                echo "<tr>";
                echo "<td>$cat[id]</td>";
                echo "<td>$cat[name]</td>";
                echo "<td> <a class='btn btn-danger' href='delete.php?id=$cat[id]'>remove</a>
                    <a class='btn btn-info' href='update.php?id=$cat[id]'>update</a>
                </td>";
                echo "</tr>";
            }

            ?>

            </tr>
        </table>
        <div class="container mt-3">
            <h2>Danh Sach Khuyen</h2>
        </div>
    </div>

</body>

</html>