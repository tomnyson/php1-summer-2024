<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .red {
            color: red;
        }
    </style>
</head>

<body class="bg-gradient-primary">
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include_once('./provider.php');
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['username'])) {
            if (empty($_POST['username'])) {
                $errors['username'] = 'username is required';
            }
        }
        if (isset($_POST['email'])) {
            if (empty($_POST['email'])) {
                $errors['email'] = 'email is required';
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "invalid email format";
                }
            }
        }
        if (isset($_POST['password'])) {
            if (empty($_POST['password'])) {
                $errors['password'] = 'password is required';
            } else {
                if (strlen($_POST['password']) < 6) {
                    $errors['password'] = "password lon hon 6 ki tu";
                }
            }
        }
        if (isset($_POST['passwordconfirm'])) {
            if (empty($_POST['passwordconfirm'])) {
                $errors['passwordconfirm'] = "password confirm is required";
            } else {
                if ($_POST['passwordconfirm'] != $_POST['password']) {
                    $errors['passwordconfirm'] = "password confirm not match";
                }
            }
        }
        if (isset($conn) && count($errors) == 0) {
            // check ton tai username or email address
            $queryCheck = "select * from users where username= :username";
            $statement = $conn->prepare($queryCheck);
            $statement->execute([
                'username' => $_POST['username'],
            ]);
            $count = $statement->rowCount();
            if ($count > 0) {
                $errors['username'] = "username or email already exists";
            } else {
                //xu ly dang ky tai khoan
                $query = "insert into users (username, password, email) values(:username, :password, :email)";
                $statement = $conn->prepare($query);
                $isCreated = $statement->execute([
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email'],
                ]);
                if ($isCreated) {
                    header("Location: login.php");
                }
            }
        }
    }

    ?>
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="register.php" method="post">
                                <div class=" form-group row">
                                    <div class="col-sm-12">

                                        <input name="username" type="text" class="form-control form-control-user" id="exampleLastName" placeholder="enter your username">
                                        <?php
                                        if (isset($errors['username'])) {
                                            echo "<p class='red'>$errors[username]</p>";
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    <?php
                                    if (isset($errors['email'])) {
                                        echo "<p class='red'>$errors[email]</p>";
                                    }
                                    ?>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" />
                                        <?php
                                        if (isset($errors['password'])) {
                                            echo "<p class='red'>$errors[password]</p>";
                                        }
                                        ?>

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="passwordconfirm" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                                        <?php
                                        if (isset($errors['passwordconfirm'])) {
                                            echo "<p class='red'>$errors[passwordconfirm]</p>";
                                        }
                                        ?>

                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" value=" Register Account" />

                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
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