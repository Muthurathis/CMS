<?php
// $connection=mysqli_connect('sql304.epizy.com','epiz_29918729','08Fjycbw3fJ','epiz_29918729_Blog');
$connection=new mysqli('sql304.epizy.com','epiz_29918729','08Fjycbw3fJ','epiz_29918729_Blog');
echo "working ,..";
if($connection->connect_error){
    die("connection failed".$connection->connect_error);
}
// $posts_query="SELECT * FROM posts ";
// $post_result=mysqli_query($connection,$posts_query);

// $row=mysqli_fetch_assoc($post_result);
// print_r($row);

// print_r($row);
?>