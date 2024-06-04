<?php
$id = $_GET['id'];
$dbHelper = new DBUntil();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["name"]) || empty($_POST['name'])) {
        $errors['name'] = "error";
    } else {
        $message = new Message();
        $message->setMessage("update thành công", "success");
        $update = $dbHelper->update('categories', array('name' => $_POST['name']), "id=$_POST[id]");
        header("Location: master.php?view=category_list");
    }
}
if (is_numeric($id)) {
    $dbHelper = new DBUntil();
    $detail = $dbHelper->select("select * from categories where id = ?", [$id]);
    var_dump(count($detail));
    if (count($detail) > 0) { ?>
        <form action="master.php?view=category_update" method="post">
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