<?php
ini_set('display_errors', '1');
include "./DBUtils.php";
$dbHelper = new DBUtils();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Update danh muc</title>
</head>

<body>
    <div class="container">
        <h2>Update Danh mục</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            if ($_POST['action'] == 'update') {
                if (isset($_POST['name'])) {
                    if (empty($_POST['name'])) {
                        $errors['name'] = "Phải Nhập name";
                    } else {
                        $updated =  $dbHelper->update(
                            "categories",
                            array(
                                'name' => $_POST['name']
                            ),
                            "id=$id"
                        );
                        header("Location: index.php");
                    }
                }
            }
        }
        $dbHelper = new DBUtils();

        $category  = $dbHelper->select("select * from categories where id=?", array($id));
        var_dump($category[0]['name']);
        ?>
        <form class="mt-3" method="POST" action="">
            <input type="text" value="<?= $category[0]['name'] ?>" placeholder="ten can sua" name="name">
            <button class="btn btn-success" name="action" value="update" type="submit">update </button>
        </form>

    </div>

</body>

</html>