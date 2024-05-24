<?php
include_once('../DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$users = $dbHelper->select("select * from users");
var_dump($users);
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
        var_dump($isCreate);
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
        <h2>Người dùng</h2>
        <a class="btn btn-success" href="create.php">thêm người dùng</a>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>tên khách hàng</th>
                    <th>email</th>
                    <th>sđt</th>
                    <th>vai trò</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            foreach ($users as $user) {
                $vaitro = 'người dùng';
                if ($user["role"] == 1) {
                    $vaitro = 'admin';
                }
                echo "<tr>";
                echo "<td>$user[id]</td>";
                echo "<td>$user[username]</td>";
                echo "<td>$user[tenKH]</td>";
                echo "<td>$user[email]</td>";
                echo "<td>$user[phone]</td>";
                echo "<td>$vaitro</td>";
                echo "<td> <a class='btn btn-danger' href='delete.php?id=$user[id]'>remove</a>
                    <a class='btn btn-info' href='update.php?id=$user[id]'>update</a>
                </td>";
                echo "</tr>";
            }

            ?>

            </tr>
        </table>
    </div>

</body>

</html>