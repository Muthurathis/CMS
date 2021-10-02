<?php
include '../includes/db.php';
echo "working ,..";
$posts_query="SELECT * FROM posts WHERE post_id=$post_id ";
$post_result=mysqli_query($connection,$posts_query);
print_r($post_result);
?>