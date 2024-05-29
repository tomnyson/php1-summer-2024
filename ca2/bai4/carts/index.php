<?php
include_once('../DBUtil.php');
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
        $isCreate = $dbHelper->insert('users', array('name' => $_POST['name']));
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
        <h2>Giỏ hàng </h2>
        <a class="btn btn-success" href="create.php">giỏ hàng</a>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>image</th>
                    <th>description</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            foreach ($products as $prod) {
                echo "<tr>";
                echo "<td>$prod[id]</td>";
                echo "<td>$prod[name]</td>";
                echo "<td><img src='$prod[img]' width='200px'/></td>";
                echo "<td>$prod[description]</td>";
                echo "<td>$prod[price]</td>";
                echo "<td>$prod[quantity]</td>";
                echo "<td> <a class='btn btn-primary' href='delete.php?id=$prod[id]'>add cart</a>
                </td>";
                echo "</tr>";
            }

            ?>

            </tr>
        </table>
    </div>

</body>

</html>