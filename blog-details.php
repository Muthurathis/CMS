<?php

include 'includes/header.php';
?>

    <!-- Blog Area -->
    <section class="blog_area section-gap single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
 
               
					<?php
                    if(isset($_GET['post'])){
                        $post_id=$_GET['post'];
                    }
                   else{
                       $post_id=1;
                   }
                    //     switch($post_id){
                    //         case 1:
                              
                    //             break;
                    //             case 2:
                               
                    //                 break;
                    //                 case 3:
                                       
                    //                     break;


                    //         default:
                    //         $post_id=1;
                    //         break;
                    //   }
                        
                    


                    $posts_query="SELECT * FROM posts WHERE post_id=$post_id ";
					$post_result=mysqli_query($connection,$posts_query);

					while($row=mysqli_fetch_assoc($post_result)){
						// print_r($row);
						$post_title=$row['post_title'];
						$post_author=$row['post_author'];
						$post_date=$row['post_date'];
						$post_content=$row['post_content'];
						$post_image=$row['post_image'];
						$post_tags=$row['post_tags'];
						$post_category_id=$row['post_category_id'];
						$post_comment_count=$row['post_comment_count'];
						$post_status=$row['post_status'];


                    }

					?>


                    <div class="main_blog_details">
                        <img class="img-fluid" src="img/posts/<?php echo $post_image; ?>" alt="">
                        <h4><?php echo $post_title ?></h4>
                        <div class="user_details">
                            <div class="float-left">
                                <a href="#"><?php echo $post_tags ?></a>
                                <a href="#">Gadget</a>
                            </div>
                            <div class="float-right">
                                <div class="media">
                                    <div class="media-body">
                                        <h5><?php echo $post_author ?></h5>
                                        <p><?php echo $post_date ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/blog/user-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $post_content?>
                    </div>
                    
                    <div class="comments-area">
                        <!-- <h4>05 Comments</h4> -->
                        <?php 
                         $select_all_query="SELECT * FROM  comments WHERE comment_post_id=$post_id And comment_status='approved'";
                         $select_all_result=mysqli_query($connection,$select_all_query);

                         while($row=mysqli_fetch_assoc($select_all_result)){
                             $comment_id=$row['comment_id'];
                             $comment_post_id=$row['comment_post_id'];
                             $comment_author=$row['comment_author'];
                             $comment_email=$row['comment_email'];
                             $comment_content=$row['comment_content'];
                             $comment_status=$row['comment_status'];
                             $comment_date=$row['comment_date'];
                         
                      
                    ?>




                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#"><?php echo $comment_author?></a></h5>
                                        <p class="date"><?php echo $comment_date ?></p>
                                        <p class="comment">
                                                    <?php echo $comment_content ?>
                                        </p>
                                    </div>
                                </div>
                                <!-- <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div> -->
                            </div>
                        </div>
                       <?php    } 
                        ?>
                        
                        <!-- <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c4.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Maria Luna</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c5.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Ina Hayes</a></h5>
                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                        <p class="comment">
                                            Never say goodbye till the end comes!
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </div> -->
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Comment</h4>
                        <form action='blog-details.php?post=<?php echo $post_id ?>' method="post">
                            <div class="form-group form-inline">
                                
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control mb-10" name="author" placeholder="Name">
                                <input type="email" class="form-control mb-10" name="email" placeholder="Email">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            
                            <input type="submit" value="Send message" name="create_comment" class="primary-btn submit_btn text-uppercase">
                        </form>
                    </div>
                </div>

                <?php include 'includes/sidebar.php'; ?>
        </section>
    <!-- Blog Area -->

    
    <!-- End footer Area -->

    <?php 
    if(isset($_POST['create_comment']))
    {
        $comment_author=$_POST['author'];
        $comment_email=$_POST['email'];
        $comment_message=$_POST['message'];

        $comment_query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES($post_id,'$comment_author','$comment_email','$comment_message','unapproved',now())";
        $comment_result=mysqli_query($connection,$comment_query);
    }

?>
<?php

include 'includes/footer.php';
?>
