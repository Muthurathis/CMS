<?php ob_start();
?>


<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">View All Users</h6>
            </div>
            <div class="card-body">
                
                <table class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th>id</th>
                                    <th>User name</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <!-- <th>password</th> -->
                                    <th>email</th>
                                    <!-- <th>image</th> -->
                                    <th>roll</th>
                                    <th>Admin</th>
                                    <th>Subscriber</th>
                                    <!-- <th>Edit</th> -->
                                    <th>Delete</th>
                                </tr>
                            </thead> 
                            <tbody>
                            
                            <?php
                            $select_all_query='SELECT * FROM  users ';
                            $select_all_result=mysqli_query($connection,$select_all_query);

                            while($row=mysqli_fetch_assoc($select_all_result)){
                                $user_id=$row['user_id'];
                                $user_name=$row['user_name'];
                                $user_firstname=$row['user_firstname'];
                                $user_lastname=$row['user_lastname'];
                                $user_password=$row['user_password'];
                                $user_email=$row['user_email'];
                                $user_roll=$row['user_roll'];
                                $user_image=$row['user_image'];

                          
                                echo "
                                     <tr>
                                        <td>{$user_id}</td>
                                        <td>{$user_name}</td>
                                        <td>{$user_firstname}</td>";


                                        
                            //   echo  "<td>{$post_category_id}</td>";



                                 echo  " <td>{$user_lastname}</td>
                                       
                                        <td>{$user_email}</td>
                                        <td>{$user_roll}</td>
                                       
                                        <td> <a href='users.php?admin={$user_id}'>Admin</a></td>
                                        <td> <a href='users.php?sub={$user_id}'>Subscriber</a></td>
                                        <td> <a href='users.php?delete={$user_id}'>Delete</a></td>
                                    </tr>";

                                ?>
                            
                             
                            <?php  }
                              ?>       
                            </tbody>
                           
                </table>
           </div>
           <?php 
    if(isset($_GET['delete'])){
        $del_user_id=$_GET['delete'];
        $delete_query="DELETE FROM users WHERE user_id=$del_user_id";
        $delete_result=mysqli_query($connection,$delete_query);
        header('location:users.php');
    }


       ?>
         <?php 
    if(isset($_GET['admin'])){
        $admin_user_id=$_GET['admin'];
        $admin_query="UPDATE users SET user_roll='admin' where user_id=$admin_user_id";
        $admin_result=mysqli_query($connection,$admin_query);
        header('location:users.php');
    }


       ?>
         <?php 
    if(isset($_GET['sub'])){
        $sub_user_id=$_GET['sub'];
        $sub_query="UPDATE users SET user_roll='subscriber' WHERE user_id=$sub_user_id";
        $sub_result=mysqli_query($connection,$sub_query);
        header('location:users.php');
    }


       ?>
       </div>


      