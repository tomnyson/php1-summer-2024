<?php
ob_start();
include_once('./includes/header.php') ?>
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<body id="page-top">

    <!-- Page Wrapper -->

    <!-- End of Page Wrapper -->
    <div id="wrapper">
        <?php include_once "./includes/sidemenu.php" ?>
        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('./includes/nav.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        include_once('./DBUtil.php');
                        include_once('./Message.php');
                        $view = isset($_GET['view']) ? $_GET['view'] : 'index';
                        var_dump($view);
                        switch ($view) {
                            case 'category_list':
                                include_once('./category/list.php');
                                break;
                            case 'category_delete':
                                include_once('./category/delete.php');
                                break;
                            case 'category_update':
                                include_once('./category/update.php');
                                break;
                            case 'product_list':
                                include_once('./product/list.php');
                                break;
                        }


                        ?>
                    </div>
                </div>
                <!-- End of Main Content -->

                <?php include_once('./includes/footer.php');
                ob_end_flush();
                ?>