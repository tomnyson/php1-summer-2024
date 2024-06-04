<?php
include_once('./includes/header.php');
?>

<body id="page-top">
    <?php
    ob_start();
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location:login.php');
    }
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">


        <?php
        include_once('./includes/slideMenu.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include_once('./includes/nav.php');
                ?>
                <!-- Main Content -->


                <!-- Begin Page Content -->
                <div class="container-fluid">
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
                                include_once('./category/index.php');
                                break;
                            case 'category_create':
                                include_once('./category/index.php');
                                break;
                            case 'category_delete':
                                include_once('./category/delete.php');
                                break;
                            case 'category_update':
                                include_once('./category/update.php');
                                break;


                            case 'product_list':
                                include_once('./product/index.php');
                                break;
                            case 'product_create':
                                include_once('./product/create.php');
                                break;
                            case 'product_update':
                                include_once('./product/update.php');
                                break;
                            case 'product_delete':
                                include_once('./product/delete.php');
                                break;
                        }
                    }

                    ?>
                    <!-- </div> -->
                </div>
            </div>
            <!-- End of Main Content -->
            <?php
            include_once('./includes/footer.php');
            ob_flush();
            ?>