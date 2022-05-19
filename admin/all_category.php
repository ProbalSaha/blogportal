<?php
include 'includes\header.php';
include 'includes\menu.php';
include 'includes\topber.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <label class="form-label">Category</label>
                                        <input type="text" class="form-control" name="cat_name">
                                        <input type="submit" value="Add Category" name="addcategory" class="btn btn-primary">
                                    </form>
                                    <?php
                                    if (isset($_POST['addcategory'])) {
                                        $cat_name = $_POST['cat_name'];
                            
                                        if (!empty($cat_name)) {
                                            $query="INSERT INTO categories (cat_name) VALUES ('$cat_name')";
                                            $addCategory= mysqli_query($connect, $query);
                            
                                            if ($addCategory) {
                                                header('Location:all_category.php');
                                            }
                                            else {
                                                die("Category Added Failed!". mysqli_error($connect));
                                            }
                                        }
                                    }
                                ?>
                                </div>
                            </div>

                            <?php 
                             //Update Category show Code...
                             if (isset($_GET['update'])) 
                             {
                                $cat_id= $_GET['update'];
                                
                                $query= "SELECT * FROM categories WHERE cat_id ='$cat_id'";
                                $select_category= mysqli_query($connect, $query);
                                while ($row= mysqli_fetch_assoc($select_category)) {
                                    $cat_id   = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                } 
                                ?>
                                <!-- Update Category Start -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"> Update Category </h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                                <div class="form-group">
                                                    <label for="category">Category Name</label>
                                                    <input type="text" name="cat_name" class="form-control" value="<?php echo $cat_name;?>" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                <input type="submit"name="editcategory" value="Update Category" class="btn btn-primary" >
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            <?php    
                                //Category Update Code...                                           
                                            if (isset($_POST['editcategory'])) {
                                                    $cat_name= $_POST['cat_name'];                       
                                                    $query = "UPDATE categories SET cat_name='$cat_name' WHERE cat_id ='$cat_id'";
                                                    $updateCategory= mysqli_query($connect, $query);
                                                        if (!$updateCategory) {
                                                            die("Category Can Not Updated! ". mysqli_error($connect));
                                                                }
                                                            else {      
                                                                header("Location: all_category.php");
                                                    }
                                    }
                                }
                                ?>
                        </div>
                        <div class="col-md-6">
                        <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Manage All Category</h6>
                                </div>
                                <div class="card-body">
                                <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">#sl</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                             <?php
                                             $sql="SELECT * FROM  categories";
                                             $allCategory=mysqli_query($connect, $sql);
                                             $i=1;
                                            while ($row=mysqli_fetch_assoc($allCategory)) {
                                                $cat_id = $row['cat_id'];
                                                $cat_name= $row['cat_name'];  ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++;?></th>
                                                <td><?php echo $cat_name ?></td>
                                                <td>
                                                <a href="all_category.php?update=<?php if (isset($cat_id)) {
                                                echo $cat_id;
                                                } ?>" class="btn btn-outline-success"><i class="far fa-edit" title="Update"></i></a>
                                            <a href="all_category.php?delete=<?php echo $cat_id?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                           <?php }
                                                    if (isset($_GET['delete'])) {
                                                        $cat_id= $_GET['delete'];
                                                        $query= "DELETE FROM categories WHERE cat_id= '$cat_id'";
                                                        $deleteQuery= mysqli_query($connect, $query);
                                                        if ($deleteQuery) {
                                                            header("Location:all_category.php");
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
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
            include 'includes\footer.php';
            ?>
