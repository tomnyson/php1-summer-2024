<?php
include_once('./DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$categories = $dbHelper->select("select * from categories");
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "error";
    } else {
        /**
         *  call insert db utils
         */
        $isCreate = $dbHelper->insert('categories', array('name' => $_POST['name']));
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
        <h2>Danh Mục</h2>
        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Ten Danh Muc">
            <input type="submit" class="btn btn-success" value="Them moi">
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
    </div>

</body>

</html>