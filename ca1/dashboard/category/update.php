<?php
include_once('./DBUtil.php');
$id = $_GET['id'];
$dbHelper = new DBUntil();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "error";
    } else {
        $update = $dbHelper->update('categories', array('name' => $_POST['name']), "id=$_POST[id]");
        header("Location: index.php");
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
        <?php
        if (is_numeric($id)) {
            $dbHelper = new DBUntil();
            $detail = $dbHelper->select("select * from categories where id = ?", [$id]);
            var_dump(count($detail));
            if (count($detail) > 0) { ?>
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $detail[0]['id'] ?>" />
                    <input type="text" name="name" placeholder="Ten Danh Muc" value="<?php echo $detail[0]['name']; ?>">
                    <input type="submit" class="btn btn-success" value="Change">
                    <?php if (isset($errors['name'])) {
                        echo "<br/>";
                        echo "<span class='txt-danger'>$errors[name]</span>";
                    } ?>
                </form>
        <?php } else {
                echo "<br/><span class='text-danger'>Id not exist</span>";
            }
        } ?>
</body>

</html>