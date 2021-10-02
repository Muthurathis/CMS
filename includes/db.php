<?php
// $connection=mysqli_connect('sql304.epizy.com','epiz_29918729','08Fjycbw3fJ','epiz_29918729_Blog');


$host='sql304.epizy.com';
$user='epiz_29918729';
$pass='08Fjycbw3fJ';
$db='epiz_29918729_Blog';

$connection=mysqli_connect($host,$user,$pass,$db);

if(!$connection){
    echo 'Not connected to database'.mysqli_connect_error();;
   
}

?>