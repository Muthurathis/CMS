<?php
$connection=mysqli_connect('localhost','root','','blog');

if(!$connection){
    echo 'Not connected to database'.mysqli_error();
    die();
}

?>