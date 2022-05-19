<?php
include 'includes\header.php';
include 'includes\menu.php';
include 'includes\topber.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
                                    </div>
                                    <div class="card-body">

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" name="email">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" name="phone">
                                               
                                            </div>
                                            <div class="col-md-6">
                                            <label class="form-label">Profile Image</label>                               
                                            <input class="form-control-file" type="file" name="image"><br>
                                            <label class="form-label">Address</label>
                                            <textarea type="text" class="form-control" name="address" rows="5"></textarea>

                                        </div>

                                            </div>
                                            <input type="submit" value="Add User" name="addUser" class="btn btn-primary">
                                        </form>
                                        <?php
                                        if (isset($_POST['addUser'])) {
                                            $name               = $_POST['name'];
                                            $email              = $_POST['email'];
                                            $phone              = $_POST['phone'];
                                            $address            = $_POST['address'];
                                            $location_img       = "assets/img/users";

                                            $user_image           = $_FILES['image'];
                                            $user_image_name      = $_FILES['image']['name'];
                                            $user_image_size      = $_FILES['image']['size'];
                                            $user_image_temp      = $_FILES['image']['tmp_name'];
                                            $user_image_type      = $_FILES['image']['type'];
                                            $userAllowedExtention = array('jpg','jpge','png');
                                            $userExtention        = strtolower(end(explode('.',$user_image_name)));
                                           
                                            if(!empty($user_image_name))
                                            {
                                                $user_image =rand(0,10000) .'_'. $user_image_name;
                                                move_uploaded_file($user_image_temp, "$location_img/$user_image");

                                                $query="INSERT INTO users (name, email, phone, address, image, join_date) VALUES ('$name','$email','$phone','$address','$user_image', now())";
                                                
                                                $addUser= mysqli_query($connect, $query);
                                
                                                if ($addUser) {
                                                    header('Location:all_users.php');
                                                }
                                                else {
                                                    die("User Added Failed!". mysqli_error($connect));
                                                }
                                            }
                                        }
                                    ?>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>