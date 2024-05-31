<?php
include_once('./DBUtil.php');
include_once('./cart.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$categories = $dbHelper->select("select * from products");
$errors = [];
$carts = new Cart();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container mt-3">
        <h2>Sản phẩm</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>tên sản phẩm</th>
                    <th>hình ảnh</th>
                    <th>giá bán </th>
                    <th>số lượng</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            foreach ($categories as $item) {
                echo "<tr>";
                echo "<td>$item[id]</td>";
                echo "<td>$item[name]</td>";
                echo "<td><img src='$item[img]' width='200px'/></td>";
                echo "<td>$item[price]</td>";
                echo "<td>$item[stock]</td>";
                echo "<td> <a class='btn btn-primary' href='cart-handle.php?id=$item[id]&action=add'><i class='bi bi-cart'></i>  Thêm vào giỏ hàng</a>
                </td>";
                echo "</tr>";
            }

            ?>

            </tr>
        </table>


        <h2>Giỏ hàng</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>tên sản phẩm</th>
                    <th>giá bán </th>
                    <th>số lượng</th>
                    <th>Tổng tièn</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            foreach ($carts->getCart() as $item) {
                $subTotal = $item['quantity'] * $item['price'];
                echo "<tr>";
                echo "<td>$item[id]</td>";
                echo "<td>$item[name]</td>";
                echo "<td>$item[price]</td>";
                echo "<td>$item[quantity]</td>";
                echo "<td>  $subTotal</td>";
                echo "<td> <a class='btn btn-danger' href='cart-handle.php?id=$item[id]&action=remove'><i class='bi bi-x'></i></a>
                </td>";
                echo "</tr>";
            }

            ?>

            </tr>
        </table>
        <h2>Tổng đơn hàng: <?= $carts->getTotal() ?></h2>
    </div>

</body>

</html>