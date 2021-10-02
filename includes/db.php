<?php
$connection=mysqli_connect('sql304.epizy.com','epiz_29918729','08Fjycbw3fJ','epiz_29918729_Blog');

if(!$connection){
    echo 'Not connected to database'.mysqli_connect_error();
    die();
}

?>