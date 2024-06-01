<?php
include_once('./DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$products = $dbHelper->select("select * from products");
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "error";
    }
    if (!isset($_POST["vaitro"]) || empty($_POST['vaitro'])) {
        $errors['vaitro'] = "error";
    } else {
        /**
         *  call insert db utils
         */
        $isCreate = $dbHelper->insert('products', array('name' => $_POST['name']));
    }
}
?>
<div class="col-lg-12">
    <h2>Người dùng</h2>
    <a class="btn btn-success" href="product-create.php">thêm sản phẩm</a>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>tên sản phẩm</th>
                <th>hình ảnh</th>
                <th>giá</th>
                <th>số lượng</th>
                <th>trạng thái</th>
                <th>action</th>
            </tr>
        </thead>

        <?php
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>$product[id]</td>";
            echo "<td>$product[name]</td>";
            echo "<td><img src='$product[img]' width=200px/></td>";
            echo "<td>$product[price]</td>";
            echo "<td>$product[stock]</td>";
            echo "<td> <a class='btn btn-danger' href='delete.php?id=$product[id]'>remove</a>
                    <a class='btn btn-info' href='update.php?id=$product[id]'>update</a>
                </td>";
            echo "</tr>";
        }

        ?>

        </tr>
    </table>
</div>