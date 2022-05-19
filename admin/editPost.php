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
                                            $post_id= $_GET['update'];
                                            
                                            $query= "SELECT * FROM posts WHERE post_id ='$post_id'";
                                            $select_post= mysqli_query($connect, $query);

                                            while ($row= mysqli_fetch_assoc($select_post)) {
                                                $post_id            = $row['post_id'];
                                                $title              = $row['title'];
                                                $author             = $row['author'];
                                                $status             = $row['status'];
                                                $post_description   = $row['post_description'];
                                                $category           = $row['category'];
                                                $tags               = $row['tags'];
                                                $image         = $row['image'];
                                                $post_date          = $row['post_date'];
                                               
                                            } 
                                         ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option>Please Select The Status</option>
                                                        <option value="0"  <?php if ($status == 0) {echo "selected";} ?> > Active</option>
                                                        <option value="1" <?php if ($status == 1) {echo "selected";} ?> > In Active</option>
                                                    </select>
                                                    <label class="form-label">Category</label>
                                                    <select name="category" class="form-control">
                                                    <option>Please Select The Category</option>
                                                    <?php
                                                    $sql= "SELECT * FROM categories WHERE cat_id = $category";
                                                    $allcategory= mysqli_query($connect, $sql);
                                                    while ($row=mysqli_fetch_assoc($allcategory)) {
                                                        $cat_id=$row['cat_id'];
                                                        $cat_name=$row['cat_name'];?>
                                                        <option value="<?php echo $cat_id; ?>" <?php if ($cat_id == $category) { echo"selected";}?>><?php echo $cat_name; ?></option>
                                                    <?php }
                                                    ?>
                                                </select><br>
                                                <label class="form-label">Post Image</label>
                                                    <?php 
                                                    if ($image == null) {
                                                        echo '<span class="text-danger"> No Product Found </span>';
                                                    
                                                    } 
                                                    else {?>
                                                        <img src="assets/img/posts/<?php echo $image?>" alt="Post" width="60"  >
                                                    
                                                    <?php }
                                                    ?>
                                                    <input class="form-control-file" type="file" name="image"><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Tags</label>
                                                    <input type="text" class="form-control" name="tags" value="<?php echo $tags;?>">
                                                    <label class="form-label">Descriptions</label>
                                                    <textarea type="text" class="form-control" name="post_description" rows="5"> <?php echo $post_description;?> </textarea>
                                                </div>
                                            </div>
                                            <input type="submit" value="Update  Post" name="updatePost" class="btn btn-primary">
                                        </form>

                                            <?php
                                            }
                                            ?>
                                        <?php
                                        if (isset($_POST['updatePost'])) {
                                            $title              = $_POST['title'];
                                            $status             = $_POST['status'];
                                            $category           = $_POST['category'];
                                            $tags               = $_POST['tags'];
                                            $post_description   = $_POST['post_description'];
                                            
                                            $post_image           = $_FILES['image'];
                                            $post_image_name      = $_FILES['image']['name'];
                                            $post_image_size      = $_FILES['image']['size'];
                                            $post_image_temp      = $_FILES['image']['tmp_name'];
                                            $post_image_type      = $_FILES['image']['type'];
                                            $postAllowedExtention = array('jpg','jpge','png');
                                            // $postExtention        = strtolower(end(explode('.',$post_image_name)));
                                            $location_img         = "assets/img/posts";
                                            
                                            if (!empty( $post_image_name )) {
                  
                                                $post_image=rand(0,10000) .'_'. $post_image_name;
                                                move_uploaded_file($post_image_temp, "$location_img/$post_image");

                                                $postQuery="SELECT * FROM posts WHERE post_id='$post_id'";
                                               
                                                $imageUnlink= mysqli_query($connect,$postQuery);
                                                
                                                while ($row= mysqli_fetch_assoc($imageUnlink)) {
                                                    $updatePost=$row['image'];
                                                   
                                                }
                                                unlink("assets/img/posts".$updatePost);
                            
                                                $query= "UPDATE posts SET title='$title', status='$status', post_description='$post_description', image='$post_image', category='$category', tags='$tags', post_date=now() WHERE post_id='$post_id'";
                                                $editPost=mysqli_query($connect,$query);
                                                if ($editPost) {
                                                    header("Location: all_posts.php");
                                                } 
                                                else {
                                                    die("Blog POST Added Failed!".mysqli_error($connect));       
                                                }
                                           }
                                           else {
                                                $query= "UPDATE posts SET title='$title', status='$status', post_description='$post_description', category='$category',tags='$tags', post_date=now() WHERE post_id='$post_id'";
                                                $editPost=mysqli_query($connect,$query);
                                                if ($editPost) {
                                                    header("Location: all_posts.php");
                                                } 
                                                else {
                                                    die("Blog POST Added Failed!".mysqli_error($connect));       
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