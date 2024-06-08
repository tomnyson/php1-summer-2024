<?php
include_once('./includes/header.php');
include_once('./includes/menu.php')
?>
<div class="col-md-12">
    <?php
    include_once('./DBUtil.php');

    $view = isset($_GET['view']) ? $_GET['view'] : 'index';
    switch ($view) {
        case 'shop_list':
            include_once('./shop/list.php');
            break;
    }
    switch ($view) {
        case 'shop_detail':
            include_once('./shop/detail.php');
            break;
    }
    ?>

</div>
<?php include_once('./includes/footer.php') ?>