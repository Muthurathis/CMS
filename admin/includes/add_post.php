<?php
if(isset($_POST['add_post'])){
   
    
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

                $create_query="INSERT INTO posts(post_title,post_category_id,post_author,post_status,post_image,post_tags,post_content,post_date,post_comment_count) VALUES('$post_title',$post_category_id,'$post_author', '$post_status','$post_image','$post_tags','$post_content',now(),'$post_comment_count') ";



                $create_post_result=mysqli_query($connection,$create_query);


            }

?>

                   <!-- Bar Chart -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
        </div>
        <div class="card-body">

                        <form action="posts.php?page=add_post" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" value="" class="form-control" name="post_title">
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
                                    <input type="text" value="" class="form-control" name="post_author">
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Status</label>
                                    <input type="text" value="" class="form-control" name="post_status">
                                </div>
                                <div class="form-group">
                                    <label for="post_image">Post Image</label><br>
                                    <img width='200px' src="../img/posts/" alt="" srcset=""><br><br>
                                    <input type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="title">Post Tags</label>
                                    <input type="text" value="" class="form-control" name="post_tags">
                                </div>
                                <div class="form-group">
                                    <label for="post_content">Post Content</label>
                                    <textarea class="form-control" value="" rows="10" cols="30" name="post_content"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Publish Post" class="btn btn-primary" name="add_post">
                                </div>
                        </form>
        </div>
        </div>
     </div>

<?php 
    //    $arr=explode('.',$file_name);
    //    $fileActualExt=end( $arr);
    //    echo $fileActualExt;
    //    $allowed=array("jpg","jpeg","png","pdf");

// if(in_array($fileActualExt,$allowed)){
                
//     if($file_size<100000){
            
// move_uploaded_file($file_tmp,"./".$file_name);
// echo "sucess";
//     }
//     else{
//         echo "it is larger size";
//     }
  
// }
// else{
//     echo "this fille format is not allowed";
// }

// }
?>
