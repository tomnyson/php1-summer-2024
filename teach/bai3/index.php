<?php
include_once('./DBUtil.php');

$dbHelper = new DBUntil();

$categories = $dbHelper->select("select * from categories");
var_dump($categories);
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
        <h2>Basic Table</h2>
        <p>The .table class adds basic styling (light padding and horizontal dividers) to a table:</p>
        <form action="">
            <input type="text" name="name" placeholder="Ten Danh Muc">
            <input type="submit" value="Them moi">

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
                echo "<td> <a href='delete.php?id=$cat[id]'>remove</a></td>";
                echo "</tr>";
            }
            ?>
            </tr>
        </table>
    </div>

</body>

</html>