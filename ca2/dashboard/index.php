<?php
include_once('./includes/header.php');
?>

<body id="page-top">
    <?php
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
                    if (isset($_SESSION['message'])) {
                        echo "<div class='alert alert-success' role='alert'>
                        $_SESSION[message]
                      </div>";
                    }
                    if (isset($_GET['view'])) {
                        $view = $_GET['view'];
                        switch ($view) {
                            case 'category':
                                echo "hahaha";
                                include_once('./category/index.php');
                                break;
                            case 'category-create':
                                echo "hahaha";
                                include_once('./category/');
                                break;
                        }
                    }

                    ?>
                    <!-- </div> -->

                </div>
                <!-- End of Main Content -->
                <?php
                include_once('./includes/footer.php');
                ?>