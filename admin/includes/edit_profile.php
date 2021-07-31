
<?php 
    if(isset($_SESSION['email'])){
      $current_user=$_SESSION['email'];
        $select_all_query="SELECT * FROM  users WHERE user_email= '$current_user'";
        $select_all_result=mysqli_query($connection,$select_all_query);

        while($row=mysqli_fetch_assoc($select_all_result)){
            $user_name=$row['user_name'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            // $post_date=$row['post_date'];
            $user_email=$row['user_email'];
            $user_password=$row['user_password'];
            $user_image=$row['user_image'];

        }
    }
    

?>

<?php
if(isset($_POST['update_user'])){
   
    
                $user_name = $_POST['user_name'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname =  $_POST['user_lastname'];
                $user_email = $_POST['user_email'];

                $user_image = $_FILES['user_image']['name'];
                $user_image_temp = $_FILES['user_image']['tmp_name'];

                $user_password = $_POST['user_password'];
                // $post_content = $_POST['post_content'];
                // $post_date = date('d-m-y');
                // $post_comment_count = 4; 

                move_uploaded_file($user_image_temp,"../img/posts/$user_image");
                if(empty($user_image)){
                   $post_checkquery="SELECT * FROM users WHERE user_email='$user_email' ";
                    $post_checkresult=mysqli_query($connection,$post_checkquery);
                    while($row=mysqli_fetch_assoc($post_checkresult)){
                        $user_image=$row['user_image'];

                    }

                }


                $create_query="UPDATE users SET user_name='$user_name',user_firstname='$user_firstname',user_lastname='$user_lastname',user_email='$user_email',user_image='$user_image',user_password='$user_password' where user_email=  '$current_user'";

                
                
               
                $create_post_result=mysqli_query($connection,$create_query);
                if(!$create_post_result){
                   echo "<h1>query error</h1>".mysqli_error();
                }

            }

?>

                   <!-- Bar Chart -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit user</h6>
        </div>
        <div class="card-body">

                        <form action="profile.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" value="<?php echo $user_name; ?>" class="form-control" name="user_name">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="title">Post Category Id</label><br>
                                            <select name="post_category_id" id="">
                                     
                                           
                                        
                                            </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="title">user_firstname</label>
                                    <input type="text" value="<?php echo $user_firstname ?>" class="form-control" name="user_firstname">
                                </div>
                                <div class="form-group">
                                    <label for="title">user lastname</label>
                                    <input type="text" value="<?php echo $user_lastname ?>" class="form-control" name="user_lastname">
                                </div>
                                <div class="form-group">
                                    <label for="post_image">User Image</label><br>
                                    <img width='200px' src="../img/posts/<?php echo $user_image ?>" alt="" srcset=""><br><br>
                                    <?php echo $user_image ?>
                                    <input type="file" name="user_image">
                                </div>
                                <div class="form-group">
                                    <label for="title">User  email</label>
                                    <input type="text" value="<?php echo $user_email ?>" class="form-control" name="user_email">
                                </div>
                                <div class="form-group">
                                    <label for="title">User password</label>
                                    <input type="text" value="<?php echo $user_password ?>" class="form-control" name="user_password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update user" class="btn btn-primary" name="update_user">
                                </div>
                        </form>
        </div>
        </div>
     </div>

<?php 

?>
    