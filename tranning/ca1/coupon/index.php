<?php
include_once('./DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$errors = [];
function checkCode($code)
{
    global $dbHelper;
    $sql = $dbHelper->select("SELECT * FROM coupons  WHERE code = '$code'");
    if (count($sql) > 0) {
        return false;
    } else {
        return true;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "error";
    } else {
        /**
         *  call insert db */
        if (!empty($_POST['code'])) {
            if (!checkCode($_POST['code'])) {
                $errors['codeE'] = ' Invalid code';
            } else {
                $codeValid = $dbHelper->insert('coupons', array(
                    'name' => $_POST['name'],
                    'code' => $_POST['code'],
                    'quantity' => $_POST['quantity'],
                    'discount' => $_POST['discount'],
                    'startDate' => $_POST['startDate'],
                    'endDate' => $_POST['endDate']
                ));
            }
        }
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

<body>

    <div class="container mt-3">
        <h2>Danh sách mã khuyến mãi</h2>
        <form action="index.php" method="post">
            <input type="text" name="name" class="form-control mt-3" required placeholder="tên mã khuyến mãi">
            <input type="text" name="code" class="form-control mt-3" required placeholder="mã khuyến mãi">
            <input type="number" name="quantity" class="form-control mt-3" required placeholder="số lượng mã giảm giá">
            <input type="number" name="discount" class="form-control mt-3" required placeholder="phần trăm giảm giá">
            <input type="date" name="startDate" class="form-control mt-3" required placeholder="ngày bắt đầu">
            <input type="date" name="endDate" class="form-control mt-3" required placeholder="ngày kết thúc">
            <input type="submit" class="btn btn-success mt-3" value="Them moi">
            <?php if (isset($errors['name'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[name]</span>";
            } ?>
        </form>
        <hr />
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>code</th>
                    <th>quantity</th>
                    <th>discount</th>
                    <th>start date</th>
                    <th>end date</th>
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
    </div>

</body>

</html>