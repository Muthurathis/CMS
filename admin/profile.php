<?php ob_start();

      include 'includes/header.php'; 
      include 'includes/sidebar.php';
      include 'includes/navbar.php'; 
      include '../includes/db.php';

      ?>

          <!-- Begin Page Content -->
    <div class="container-fluid">

         <!-- Bar Chart -->
      
    <?php 
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }
        else {
            $page='';
        }

        switch($page){

            case  'edit_post':
            include 'includes/edit_post.php';
            break; 
            case 'add_post':
            include 'includes/add_post.php';
            break;
            default :
            include 'includes/edit_profile.php';
            break;
        }
    
    ?>



    </div>

    <?php include 'includes/footer.php';?>