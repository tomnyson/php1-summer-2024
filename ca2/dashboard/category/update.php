<?php
$dbHelper = new DBUntil();
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "error";
    } else {
        $update = $dbHelper->update('categories', array('name' => $_POST['name']), "id=$_POST[id]");
        $_SESSION['message'] = "cập nhật thành công";
        header("Location: index.php?view=category_list");
    }
}


?>
<h2>Danh Mục</h2>
<?php
if (is_numeric($id)) {
    $dbHelper = new DBUntil();
    $detail = $dbHelper->select("select * from categories where id = ?", [$id]);
    var_dump(count($detail));
    if (count($detail) > 0) { ?>
        <form action="index.php?view=category_update" method="post">
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