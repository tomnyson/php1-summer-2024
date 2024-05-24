<?php
include_once('../DBUtil.php');
$dbHelper = new DBUntil();
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (!isset($_POST["name"]) || empty($_POST['name'])) {
//         $errors['name'] = "error";
//     } else {
//         $update = $dbHelper->update('categories', array('name' => $_POST['name']), "id=$_POST[id]");
//         header("Location: index.php");
//     }
// }


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
        <h2>Thêm người dùng</h2>
        <form action="update.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">username</label>
                <input class="form-control" type="text" name="username" placeholder="username">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">password</label>
                <input class="form-control" type="password" name="password" placeholder="password">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">email</label>
                <input class="form-control" type="email" name="email" placeholder="email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">address</label>
                <input class="form-control" type="text" name="address" placeholder="address">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">phone</label>
                <input class="form-control" type="text" name="phone" placeholder="phone">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option value="">Chọn vai trò</option>
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-check-label mt-3">Trạng thái tài khoản:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="1" id="status1" checked>
                    <label class="form-check-label" for="status1">
                        cho phép hoạt động
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="0" id="status2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        khóa tài khoản
                    </label>
                </div>
            </div>
            <input type="submit" class="btn btn-success mt-3" value="Change">
            <?php if (isset($errors['name'])) {
                echo "<br/>";
                echo "<span class='txt-danger'>$errors[name]</span>";
            } ?>
        </form>
</body>

</html>