<?php
include 'db.php';
session_start();
$_SESSION['role']='user';
$_SESSION['username']='user';
?>



<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Blog Template</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700|Roboto:400,500" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	
		<a class="navbar-brand" href="#">Frankeey</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item active">
			  <a class="nav-link" href="/phppractice1/cms/">Home <span class="sr-only">(current)</span></a>
			</li>
            <?php
            $select_all_category='SELECT *  FROM category';
            $menu_result=mysqli_query($connection,$select_all_category);

            while($row=mysqli_fetch_assoc($menu_result)){
                $cat_title=$row['category_title'];

                echo "<li class='nav-item'>
                <a class='nav-link' href='*'>{$cat_title}</a>
              </li>";
            }
            ?>
			<li class="nav-item">
			  <a class="nav-link" href="#">About</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="#">Services</a>
			</li>
		  </ul>
		</div>
	  </nav>
	</div>