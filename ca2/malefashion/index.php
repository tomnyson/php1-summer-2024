<?php
include_once('./includes/header.php');
include_once('./includes/menu.php')
?>
<?php
    session_start();
    ini_set('display_errors', '1');
    include_once('./DBUtil.php');
    if (isset($_SESSION['message'])) {
        echo "<div class='alert alert-success' role='alert'>
                        $_SESSION[message]
                      </div>";
    }
    if (isset($_GET['view'])) {
        $view = $_GET['view'];
        switch ($view) {
            case 'category_list':
                include_once('./shop/index.php');
                break;
            case 'shop':
                include_once('./shop/list.php');
                break;
            case 'shop_delete':
                include_once('./shop/delete.php');
                break;
            case 'shop_update':
                include_once('./shop/update.php');
                break;
        }
    }

    ?>

<?php
include_once('./includes/footer.php');
?>