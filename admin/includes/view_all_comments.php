<?php ob_start();
?>


<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">View All Comments</h6>
            </div>
            <div class="card-body">
                
                <table class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Post</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead> 
                            <tbody>
                            
                            <?php
                            $select_all_query='SELECT * FROM  comments';
                            $select_all_result=mysqli_query($connection,$select_all_query);

                            while($row=mysqli_fetch_assoc($select_all_result)){
                                $comment_id=$row['comment_id'];
                                $comment_post_id=$row['comment_post_id'];
                                $comment_author=$row['comment_author'];
                                $comment_email=$row['comment_email'];
                                $comment_content=$row['comment_content'];
                                $comment_status=$row['comment_status'];
                                $comment_date=$row['comment_date'];
                            

                          
                                echo "
                                     <tr>
                                        <td>{$comment_id}</td>
                                        <td>{$comment_author}</td>
                                        <td>{$comment_email}</td>";


                            //   echo  "<td>{$post_category_id}</td>";

                                echo  " <td>{$comment_content}</td>";
                                
                                        $select_all_cmt_query="SELECT * FROM  posts where post_id=$comment_post_id";
                                        $select_all_cmt_result=mysqli_query($connection,$select_all_cmt_query);
                                        

                                        if(!$select_all_cmt_result){
                                            die('error');
                                        }

                                        while($row=mysqli_fetch_assoc($select_all_cmt_result)){
                                            // print_r($row);
                                          $post_id=$row['post_id'];
                                          $post_title=$row['post_title'];
                        
                                          echo "<td> <a href='../blog-details.php?post={$post_id}''>{$post_title}</a></td>";
                                        }
                                        // <td>{$comment_post_id}</td>


                                echo"        <td>{$comment_status}</td>
                                        <td>{$comment_date}</td>
                                        <td> <a href='comments.php?approve={$comment_id}'>Approve</a></td>
                                        <td> <a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>
                                        <td> <a href='comments.php?page=edit_post&post_id={$comment_id}'>Edit</a></td>
                                        <td> <a href='comments.php?delete={$comment_id}'>Delete</a></td>
                                    </tr>";

                                ?>
                            
                             
                            <?php  }
                              ?>       
                            </tbody>
                     
                </table>
           </div>
           <?php 
    if(isset($_GET['delete'])){
        $del_com_id=$_GET['delete'];
        $delete_com_query="DELETE FROM comments WHERE comment_id=$del_com_id";
        $delete_com_result=mysqli_query($connection,$delete_com_query);
        header('location:comments.php');
    }


       ?>
         <?php 
    if(isset($_GET['approve'])){
        $approv_com_id=$_GET['approve'];
        $approv_com_query="UPDATE  comments SET comment_status='approved' WHERE  comment_id=$approv_com_id";
        $approv_com_result=mysqli_query($connection,$approv_com_query);
        header('location:comments.php');
    }


       ?>
                <?php 
    if(isset($_GET['unapprove'])){
        $unapprov_com_id=$_GET['unapprove'];
        $unapprov_com_query="UPDATE  comments SET comment_status='unapproved' WHERE  comment_id=$unapprov_com_id";
        $approv_com_result=mysqli_query($connection,$unapprov_com_query);
        header('location:comments.php');
    }


       ?>
       </div>


      