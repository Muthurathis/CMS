<?php
$connection=mysqli_connect('sql304.epizy.com','epiz_29918729','08Fjycbw3fJ','epiz_29918729_Blog');
echo "working ,..";
$posts_query="SELECT * FROM posts ";
$post_result=mysqli_query($connection,$posts_query);
print_r($post_result);
?>