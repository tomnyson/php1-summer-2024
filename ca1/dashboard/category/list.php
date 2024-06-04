<?php
include_once('./DBUtil.php');
include_once('./Message.php');
ini_set('display_errors', '1');

$dbHelper = new DBUntil();

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "error";
    } else {
        $isCreate = $dbHelper->insert('categories', array('name' => $_POST['name']));
    }
}
?>
<div class="col-md-12">
    <?php
    $message = new Message();
    var_dump($message->displayMessage());
    ?>

</div>
<form action="category.php" method="post">
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
    $categories = $dbHelper->select("select * from categories");
    foreach ($categories as $cat) {
        echo "<tr>";
        echo "<td>$cat[id]</td>";
        echo "<td>$cat[name]</td>";
        echo "<td> <a class='btn btn-danger' href='master.php?view=category_delete&id=$cat[id]'>remove</a>
                    <a class='btn btn-info' href='master.php?view=category_update&id=$cat[id]'>update</a>
                </td>";
        echo "</tr>";
    }

    ?>

    </tr>
</table>
<?php
unset($_SESSION['message']);
?>