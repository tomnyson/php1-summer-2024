<?php
include_once('./includes/header.php');
?>

<body class="bg-gradient-primary">
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require_once("./DBUtil.php");
    $dbHelper = new DBUntil();
    $errors = [];
    // $_SESSION['ds_users'] = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // var_dump($_POST['username']); empty
        if (isset($_POST['username'])) {
            if (empty($_POST['username'])) {
                // them item vao mang
                $errors['username'] = "username is required";
            }
        }
        /**
         * password not empty > 6 lenth
         * password confirm same as password
         */

        if (isset($_POST['password'])) {
            if (empty($_POST['password'])) {
                $errors['password'] = "username is required";
            } else {
                if (strlen($_POST['password']) < 6) {
                    $errors['password'] = "password must be at least 6 characters";
                }
            }
        }
        if (count($errors) == 0) {
            try {
                $query = "SELECT * FROM users where username = :username";
                $result = $dbHelper->select($query, [
                    "username" => $_POST['username'],
                ]);

                if (count($result) > 0) {
                    var_dump($result);
                    $storedHashPassword = $result[0]['password'];
                    if (password_verify($_POST['password'], $storedHashPassword)) {
                        $_SESSION["username"] = $_POST['username'];

                        header("Location: index.php");
                    } else {
                        $errors["password"] = "username or password incorrect";
                    }
                }
            } catch (\Exception $e) {
                echo "Error: " . $e->getMessage();
            }
            // xu ly code trong nay

        }
    }


    // var_dump($_SESSION);
    ?>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="login.php" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <?php
                                            if (isset($errors['username'])) {
                                                echo "<p class='text-danger'>$errors[username]</p>";
                                            }

                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            <?php
                                            if (isset($errors['password'])) {
                                                echo "<p class='text-danger'>$errors[password]</p>";
                                            }

                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="login" />
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>