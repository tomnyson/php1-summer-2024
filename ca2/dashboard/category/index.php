<?php
include_once('./DBUtil.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();


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

<h2>Danh Mục</h2>
<form action="index.php?view=category_create" method="post">
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
            <th>name</th>
            <th>gia</th>
            <th>action</th>
        </tr>
    </thead>
    <?php
    $categories = $dbHelper->select("select * from categories");
    foreach ($categories as $cat) {
        echo "<tr>";
        echo "<td>$cat[id]</td>";
        echo "<td>$cat[name]</td>";
        echo "<td> <a class='btn btn-danger' href='index.php?view=category_delete&id=$cat[id]'>remove</a>
                 <a class='btn btn-info' href='index.php?view=category_update&id=$cat[id]'>update</a>
                </td>";
        echo "</tr>";
    }

    ?>

    </tr>
</table>