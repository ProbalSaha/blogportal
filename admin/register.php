<?php include "../includes/db.php";
ob_start();
session_start();
?>
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
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

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
                            <form class="user" action="" method="POST">
                                <div class="form-group ">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Full Name" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputphone"
                                        placeholder="Phone Number" name="phone">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="repeatPass">
                                    </div>
                                </div>
                                <input type="submit" value="Register" name="register" class="btn btn-primary btn-user btn-block">
                                <hr>
                               
                            </form>
                            <?php
                            if (isset($_POST['register'])) {
                                
                                $name= mysqli_real_escape_string( $connect,$_POST['name']);
                                $email= mysqli_real_escape_string( $connect,$_POST['email']);
                                $phone= mysqli_real_escape_string( $connect,$_POST['phone']);
                                $password= mysqli_real_escape_string( $connect,$_POST['password']);
                                $repeatPass= mysqli_real_escape_string( $connect,$_POST['repeatPass']);

                                if ($password == $repeatPass) {
                                   $hasdPass = sha1($password);
                                   $query= "INSERT INTO users  (name, password, is_active, role, email, phone, address, image, join_date) VALUES ('$name', '$hasdPass',0,1,'$email','$phone','','', now())";

                                   $register= mysqli_query($connect,$query);
                                   if (!$register) {
                                       die("Registation Failed!".mysqli_error($connect));
                                   }
                                   else {
                                       header("Location:index.php");
                                   }
                                }
                            }
                                
                            ?>


                            <hr>
                           
                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <?php
    ob_end_flush();
    ?>

</body>

</html>