<?php
ini_set('display_errors', '1');
include "./DBUtils.php";

$dbHelper = new DBUtils();
$categories  = $dbHelper->select("select * from categories");
// var_dump($categories);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    $id = $_POST['id'];
    $result = $dbHelper->delete('categories', 'id=' . $id);
}
var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DEMO CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $row) : ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td>
                            <form method="post" action="index.php?id=<?= $row['id'] ?>">

                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                <button type="submit" class="btn btn-danger" type="button">delete</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>

</html>