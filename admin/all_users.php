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
                                    <h6 class="m-0 font-weight-bold text-primary">Manage All Users</h6>
                                </div>
                                <div class="card-body">
                                <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">#sl</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name </th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Join Date</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                             <?php
                                             $sql="SELECT * FROM  users";
                                             $allUsers=mysqli_query($connect, $sql);
                                             $i=1;
                                            while ($row=mysqli_fetch_assoc($allUsers)) {
                                                $id               = $row['id'];
                                                $name             = $row['name']; 
                                                $email            = $row['email'];
                                                $phone            = $row['phone'];
                                                $address          = $row['address'];
                                                $image            = $row['image']; 
                                                $join_date        = $row['join_date'];
                                                 ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++;?></th>
                                                <td><?php 
                                                if ($image == null) {
                                                    echo '<span class="text-danger"> No User Found </span>';
                                                } 
                                                else {?>
                                                    <img src="assets/img/users/<?php echo $image?>" alt="Post" width="60"  >
                                                 <?php }
                                                ?></td>
                                                <td><?php echo $name ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $phone ?></td>
                                                <td><?php echo $address ?></td>
                                                <td><?php echo $join_date ?></td>
                                                <td>
                                                <a href="editUser.php?update=<?php if (isset($id)) {
                                                echo $id;
                                                } ?>" class="btn btn-outline-success"><i class="far fa-edit" title="Update"></i></a>
                                            <a href="all_posts.php?delete=<?php echo $id?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt" title="Delete"></i></a>
                                                </td>
                                            </tr>
                                           <?php }
                                                    if (isset($_GET['delete'])) {
                                                        $user_id= $_GET['delete'];
                                                        $query= "DELETE FROM users WHERE id= '$user_id'";
                                                        $deleteQuery= mysqli_query($connect, $query);
                                                        if ($deleteQuery) {
                                                            header("Location:all_users.php");
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