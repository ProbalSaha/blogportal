<?php
include 'includes\header.php';
include 'includes\menu.php';
include 'includes\topber.php';
?>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Manage All Posts</h6>
                                </div>
                                <div class="card-body">
                                <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">#sl</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title </th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                             <?php
                                             $sql="SELECT * FROM  posts";
                                             $allPosts=mysqli_query($connect, $sql);
                                             $i=1;
                                            while ($row=mysqli_fetch_assoc($allPosts)) {
                                                $post_id          = $row['post_id'];
                                                $title            = $row['title']; 
                                                $author           = $row['author'];
                                                $status           = $row['status'];
                                                $post_description = $row['post_description'];
                                                $category         = $row['category'];
                                                $image            = $row['image'];
                                                $post_date        = $row['post_date'];
                                                $tags             = $row['tags'];
                                                 ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++;?></th>
                                                <td><?php 
                                                if ($image == null) {
                                                    echo '<span class="text-danger"> No Product Found </span>';
                                                } 
                                                else {?>
                                                    <img src="assets/img/posts/<?php echo $image?>" alt="Post" width="60"  >
                                                 <?php }
                                                ?></td>
                                                <td><?php echo $title ?></td>
                                                <td><?php echo $author ?></td>
                                                <td><?php if ( $status == 0 ) {
                                                    echo '<span class="badge badge-primary">Active</span>';
                                                }
                                                else {
                                                    echo '<span class="badge badge-danger">In Active</span>';
                                                }
                                                 ?></td>
                                                <td>
                                                    <?php
                                                 $sql="SELECT * FROM  categories where cat_id = $category";
                                                 $allPostCategory=mysqli_query($connect, $sql);
                                                 while ($row=mysqli_fetch_assoc($allPostCategory)) {
                                                     $cat_name= $row['cat_name'];
                                                echo "$cat_name" ;
                                                }
                                                ?>
                                                </td>
                                                <td><?php echo $tags ?></td>
                                                <td><?php echo $post_date ?></td>
                                                <td>
                                                <a href="editPost.php?update=<?php if (isset($post_id)) {
                                                echo $post_id;
                                                } ?>" class="btn btn-outline-success"><i class="far fa-edit" title="Update"></i></a>
                                            <a href="all_posts.php?delete=<?php echo $post_id?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                           <?php }
                                                    if (isset($_GET['delete'])) {
                                                        $cat_id= $_GET['delete'];
                                                        $query= "DELETE FROM posts WHERE post_id= '$post_id'";
                                                        $deleteQuery= mysqli_query($connect, $query);
                                                        if ($deleteQuery) {
                                                            header("Location:all_posts.php");
                                                        }
                                                        else {
                                                            die("Delete Query Failed! ". mysqli_error($connect));
                                                        }
                                                    }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include 'includes\footer.php';
            ?>