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
                                        <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                                    </div>
                                    <div class="card-body">

                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="title">
                                                <label class="form-label">Status</label>
                                                <select class="form-control" name="status">
                                                    <option>Please Select The Status</option>
                                                    <option value="0">Active</option>
                                                    <option value="1">In Active</option>
                                                </select>
                                                <label class="form-label">Category</label>
                                               <select name="category" class="form-control">
                                                   <option>Please Select The Category</option>
                                                   <?php
                                                   $sql= "SELECT * FROM categories";
                                                   $alcategory= mysqli_query($connect, $sql);
                                                   while ($row=mysqli_fetch_assoc($alcategory)) {
                                                       $cat_id=$row['cat_id'];
                                                       $cat_name=$row['cat_name'];?>

                                                       <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
                                                  <?php }
                                                   ?>
                                                   
                                               </select>

                                                <label class="form-label">Post Image</label>                               
                                                <input class="form-control-file" type="file" name="image"><br>
                                            </div>
                                            <div class="col-md-6">

                                                <label class="form-label">Tags</label>
                                                <input type="text" class="form-control" name="tags">                                             
                                                <label class="form-label">Descriptions</label>
                                                <textarea type="text" class="form-control" name="post_description" rows="5"></textarea>

                                        </div>

                                            </div>
                                            <input type="submit" value="Add Post" name="addpost" class="btn btn-primary">
                                        </form>
                                        <?php
                                        if (isset($_POST['addpost'])) {
                                            $title              = $_POST['title'];
                                            $status             = $_POST['status'];
                                            $category           = $_POST['category'];
                                            $author             = $_SESSION['name'] ;
                                            $tags               = $_POST['tags'];
                                            $post_description   = $_POST['post_description'];
                                            $location_img       = "assets/img/posts";

                                            $post_image           = $_FILES['image'];
                                            $post_image_name      = $_FILES['image']['name'];
                                            $post_image_size      = $_FILES['image']['size'];
                                            $post_image_temp      = $_FILES['image']['tmp_name'];
                                            $post_image_type      = $_FILES['image']['type'];
                                            $postAllowedExtention = array('jpg','jpge','png');
                                            $postExtention        = strtolower(end(explode('.',$post_image_name)));
                                           
                                            if(!empty($post_image_name))
                                            {
                                                $post_image =rand(0,10000) .'_'. $post_image_name;
                                                move_uploaded_file($post_image_temp, "$location_img/$post_image");

                                                $query="INSERT INTO posts (title, author, status, post_description, category, tags, image, post_date) VALUES ('$title','$author','$status','$post_description' ,'$category','$tags','$post_image', now())";
                                                
                                                $addpost= mysqli_query($connect, $query);
                                
                                                if ($addpost) {
                                                    header('Location:all_posts.php');
                                                }
                                                else {
                                                    die("Post Added Failed!". mysqli_error($connect));
                                                }
                                            }
                                        }
                                    ?>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>