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
var_dump($_GET);
if (isset($_GET['view'])) {
    $view = $_GET['view'] ?  $_GET['view'] : 'shop';
    switch ($view) {
        case 'category_list':
            include_once('./shop/index.php');
            break;
        case 'shop':
            include_once('./shop/list.php');
            break;
        case 'shop_detail':
            include_once('./shop/shop_details.php');
            break;
        case 'shop_search':
            include_once('./shop/list_search.php');
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