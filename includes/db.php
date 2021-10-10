<?php
$connection=mysqli_connect('sql5.freesqldatabase.com','sql5443363','Dx8McFPHEi','sql5443363');

if(!$connection){
    echo 'Not connected to database'.mysqli_connect_error();
    die();
}

?>