<?php ob_start();
?>


<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">View All Posts</h6>
            </div>
            <div class="card-body">
                
                <table class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead> 
                            <tbody>
                            
                            <?php
                            $select_all_query='SELECT * FROM  posts';
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

                          
                                echo "
                                     <tr>
                                        <td>{$post_id}</td>
                                        <td>{$post_author}</td>
                                        <td>{$post_title}</td>";

                                        $select_all_catquery="SELECT * FROM  category where category_id=$post_category_id";
                                        $select_all_catresult=mysqli_query($connection,$select_all_catquery);
                                        

                                        if(!$select_all_catresult){
                                            die('error');
                                        }

                                        while($row=mysqli_fetch_assoc($select_all_catresult)){
                                            // print_r($row);
                                          $cat_id=$row['category_id'];
                                          $cat_title=$row['category_title'];
                        
                                          echo "<td>{$cat_title}</td>";
                                        }
                            //   echo  "<td>{$post_category_id}</td>";



                                 echo  " <td>{$post_status}</td>
                                        <td> <img  width='100px' src='../img/posts/{$post_image}' alt='a'></td>
                                        <td>{$post_tags}</td>
                                        <td>{$post_comment_count}</td>
                                        <td>{$post_date}</td>
                                        <td> <a href='posts.php?page=edit_post&post_id={$post_id}'>Edit</a></td>
                                        <td> <a href='posts.php?delete={$post_id}'>Delete</a></td>
                                    </tr>";

                                ?>
                            
                             
                            <?php  }
                              ?>       
                            </tbody>
                           
                </table>
           </div>
           <?php 
    if(isset($_GET['delete'])){
        $del_id=$_GET['delete'];
        $delete_query="DELETE FROM posts WHERE post_id=$del_id";
        $delete_result=mysqli_query($connection,$delete_query);
        header('location:posts.php');
    }


       ?>
       </div>


      