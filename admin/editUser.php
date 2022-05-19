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
                                        <h6 class="m-0 font-weight-bold text-primary">Update Post</h6>
                                    </div>
                                    <div class="card-body">

                                    <?php 
                                        //Update Post show Code...
                                        if (isset($_GET['update'])) 
                                        {
                                            $user_id= $_GET['update'];
                                            
                                            $query= "SELECT * FROM users WHERE id ='$user_id'";
                                            $select_user= mysqli_query($connect, $query);

                                            while ($row= mysqli_fetch_assoc($select_user)) {
                                                $id                 = $row['id'];
                                                $name               = $row['name'];
                                                $email              = $row['email'];
                                                $phone              = $row['phone'];
                                                $address            = $row['address'];
                                                $image              = $row['image'];
                                                $join_date          = $row['join_date'];
                                               
                                            } 
                                         ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                                                   
                                              
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Profile Image</label>
                                                        <?php 
                                                        if ($image == null) {
                                                            echo '<span class="text-danger"> No User Found </span>';
                                                        
                                                        } 
                                                        else {?>
                                                            <img src="assets/img/users/<?php echo $image?>" alt="User" width="60"  >
                                                        
                                                        <?php }
                                                        ?>
                                                        <input class="form-control-file" type="file" name="image"><br>
                                                   
                                                    <label class="form-label">Address</label>
                                                    <textarea type="text" class="form-control" name="address" rows="5"> <?php echo $address;?> </textarea>
                                                </div>
                                            </div>
                                            <input type="submit" value="Update User" name="updateUser" class="btn btn-primary">
                                        </form>

                                            <?php
                                            }
                                            ?>
                                        <?php
                                        if (isset($_POST['updateUser'])) {
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
                                            // $postExtention        = strtolower(end(explode('.',$post_image_name)));
                                            
                                            
                                            if (!empty( $user_image_name )) {
                  
                                                $user_image=rand(0,10000) .'_'. $user_image_name;
                                                move_uploaded_file($user_image_temp, "$location_img/$user_image");

                                                $userQuery="SELECT * FROM users WHERE id='$id'";
                                               
                                                $imageUnlink= mysqli_query($connect,$userQuery);
                                                
                                                while ($row= mysqli_fetch_assoc($imageUnlink)) {
                                                    $updateUser=$row['image'];
                                                   
                                                }
                                                unlink("assets/img/users".$updateUser);
                            
                                                $query= "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', image='$user_image', join_date=now() WHERE id='$id'";
                                                $editUser=mysqli_query($connect,$query);
                                                if ($editUser) {
                                                    header("Location: all_users.php");
                                                } 
                                                else {
                                                    die("User Added Failed!".mysqli_error($connect));       
                                                }
                                           }
                                           else {
                                                $query= "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address', join_date=now() WHERE id='$id'";
                                                $editUser=mysqli_query($connect,$query);
                                                if ($editUser) {
                                                    header("Location: all_users.php");
                                                } 
                                                else {
                                                    die("User Added Failed!".mysqli_error($connect));       
                                                }
                                           }
                                        }
                                    ?>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>

            <?php
            include 'includes\footer.php';
            ?>