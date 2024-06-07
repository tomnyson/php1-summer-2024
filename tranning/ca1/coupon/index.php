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
        <h2>Danh sách mã khuyến mãi</h2>
        <form action="index.php" method="post">
            <input type="text" name="name" class="form-control mt-3" placeholder="tên mã khuyến mãi">
            <input type="text" name="code" class="form-control mt-3" placeholder="mã khuyến mãi">
            <input type="number" name="quantity" class="form-control mt-3" placeholder="số lượng mã giảm giá">
            <input type="number" name="discount" class="form-control mt-3" placeholder="phần trăm giảm giá">
            <input type="date" name="startDate" class="form-control mt-3" placeholder="ngày bắt đầu">
            <input type="date" name="endDate" class="form-control mt-3" placeholder="ngày kết thúc">
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