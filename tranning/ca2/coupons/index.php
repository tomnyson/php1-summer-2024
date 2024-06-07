<?php
include_once('./DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();


$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "name is required";
    }
    if (!isset($_POST["code"]) || empty($_POST['code'])) {
        $errors['code'] = "code is required";
    } else {
        $code = $dbHelper->select("select * from coupons where code=:code", array('code' => $_POST['code']));
        if (count($errors) > 0) {
            $errors['code'] = "code is exists";
        }
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
    }

    if (count($errors) == 0) {
        /**
         *  call insert db utils
         */
        /**
         * check code duy nhat
         * Unique ID 
         */
        $isCreate = $dbHelper->insert('coupons', array(
            'name' => $_POST['name'],
            'code' => $_POST['code'],
            'quantity' => $_POST['quantity'],
            'discount' => $_POST['discount'],
            'startDate' => $_POST['startDate'],
            'endDate' => $_POST['endDate']
        ));
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

        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>code</th>
                    <th>quantity</th>
                    <th>discount</th>
                    <th>startDate</th>
                    <th>endDate</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            $counpons = $dbHelper->select("select * from coupons");
            foreach ($counpons as $item) {
                echo "<tr>";
                echo "<td>$item[id]</td>";
                echo "<td>$item[name]</td>";
                echo "<td>$item[code]</td>";
                echo "<td>$item[quantity]</td>";
                echo "<td>$item[discount]</td>";
                echo "<td>$item[startDate]</td>";
                echo "<td>$item[endDate]</td>";
                echo "<td> <a class='btn btn-danger' href='delete.php?id=$item[id]'>remove</a>
                    <a class='btn btn-info' href='update.php?id=$item[id]'>update</a>
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