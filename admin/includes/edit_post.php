
<?php 
    if(isset($_GET['post_id'])){
      $edit_post_id=$_GET['post_id'];
        $select_all_query="SELECT * FROM  posts WHERE post_id=$edit_post_id";
        $select_all_result=mysqli_query($connection,$select_all_query);

        while($row=mysqli_fetch_assoc($select_all_result)){
            $post_title=$row['post_title'];
            $post_id=$row['post_id'];
            $post_author=$row['post_author'];
            $post_date=$row['post_date'];
            $post_content=$row['post_content'];
            $post_image=$row['post_image'];
            $post_tags=$row['post_tags'];
            $post_comment_count=$row['post_comment_count'];
            $post_status=$row['post_status'];
            $post_category_id=$row['post_category_id'];

        }
    }


?>

<?php
if(isset($_POST['update_post'])){
   
    
                $post_title = $_POST['post_title'];
                $post_category_id = $_POST['post_category_id'];
                $post_author =  $_POST['post_author'];
                $post_status = $_POST['post_status'];

                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];

                $post_tags = $_POST['post_tags'];
                $post_content = $_POST['post_content'];
                $post_date = date('d-m-y');
                $post_comment_count = 4; 

                move_uploaded_file($post_image_temp,"../img/posts/$post_image");
                if(empty($post_image)){
                   $post_checkquery="SELECT * FROM posts WHERE post_id=$post_id ";
                    $post_checkresult=mysqli_query($connection,$post_checkquery);
                    while($row=mysqli_fetch_assoc($post_checkresult)){
                        $post_image=$row['post_image'];

                    }

                }
 

                $create_query="UPDATE posts SET post_title='$post_title',post_category_id=$post_category_id,post_author='$post_author',post_status='$post_status',post_image='$post_image',post_tags='$post_tags',post_content='$post_content',post_date=now(),post_comment_count='$post_comment_count' where post_id=  $post_id";

                
                
               
                $create_post_result=mysqli_query($connection,$create_query);


            }

?>

                   <!-- Bar Chart -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
        </div>
        <div class="card-body">

                        <form action="posts.php?page=edit_post&post_id=<?php echo $post_id ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Category Id</label><br>
                                            <select name="post_category_id" id="">
                                     
                                           
                                                <?php  
                                                  $select_all_catquery='SELECT * FROM  category';
                                                  $select_all_catresult=mysqli_query($connection,$select_all_catquery);
                                                   
                                                  while($row=mysqli_fetch_assoc($select_all_catresult)){
                                                    $cat_id=$row['category_id'];
                                                    $cat_title=$row['category_title'];
                                  
                                                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                                                  }
                                                
                                                ?>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Author</label>
                                    <input type="text" value="<?php echo $post_author ?>" class="form-control" name="post_author">
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Status</label>
                                    <input type="text" value="<?php echo $post_status ?>" class="form-control" name="post_status">
                                </div>
                                <div class="form-group">
                                    <label for="post_image">Post Image</label><br>
                                    <img width='200px' src="../img/posts/<?php echo $post_image ?>" alt="" srcset=""><br><br>
                                    <input type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Tags</label>
                                    <input type="text" value="<?php echo $post_tags ?>" class="form-control" name="post_tags">
                                </div>
                                <div class="form-group">
                                    <label for="post_content">Post Content</label>
                                    <textarea class="form-control" value="" rows="10" cols="30" name="post_content"><?php echo $post_content ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Publish Post" class="btn btn-primary" name="update_post">
                                </div>
                        </form>
        </div>
        </div>
     </div>

<?php 

?>
