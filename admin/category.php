<?php
ob_start();

include 'includes/header.php';
include "includes/sidebar.php"; 
include 'includes/navbar.php'; 

include '../includes/db.php';

if(isset($_POST['submit'])){
print_r( $_POST);
   $catins_title=$_POST['cat_title'] ;
   

if($catins_title===""||empty($catins_title))
{
  echo "this field cannot be empty";
}
else{

  $create_cat_query="INSERT INTO category(category_title) VALUES('   $catins_title')";
  

  $catins_result=mysqli_query($connection,$create_cat_query);

    if(!$catins_result){
    echo 'category query error';
  }

}


}


?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-6 col-lg-6"  style="height: 200px;">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add Categories</h6>

      </div>
      <!-- Card Body -->
      
    <div class="card-body">
      <form action="category.php" method="post">
        <!-- <label for="cat-title">Add Categories:  </label> -->
          <input type="text" class="form-control" name="cat_title"><br>
          <input type="submit" class="btn btn-primary" value="submit"  name="submit">
      </form>
    </div>
      
    </div>

  </div>

  
  <div class="col-xl-6 col-lg-6   ">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
        <div class="dropdown no-arrow">
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
          <table class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <!-- <th>Id</th> -->
                      <th>Categories</th>
                      <th>Remove</th>
                      <th>Edit</th>
                      <!-- <th>Remove</th>
                      <th>Edit</th> -->
                  </tr>
              </thead>
              <tbody>

              <?php
              $select_all_query='SELECT * FROM  category';
              $select_all_result=mysqli_query($connection,$select_all_query);

              while($row=mysqli_fetch_assoc($select_all_result)){
                  $cat_id=$row['category_id'];
                  $cat_title=$row['category_title'];


                  echo "<tr>
                    
                    <td>{$cat_title}</td>
                    <td><a href='category.php?delete={$cat_id}'>Delete</a></td>
                    <td><a href='category.php?edit={$cat_id}'>Edit</a></td>
                    </tr>
                  <tr>";
              }
              ?>
                <!-- //  <td>{$cat_id}</td> -->

                  

                 
              </tbody>
          </table>
      </div>
    </div>
    
  </div>


  </div>
</div>
<?php 
  if(isset($_GET['edit'])){
    $edit_cat_id=$_GET['edit'];
    $edit_query="SELECT * FROM category  WHERE category_id='$edit_cat_id'";
    $edit_result=mysqli_query($connection,$edit_query);

    while($row=mysqli_fetch_assoc($edit_result)){
      $cat_title=$row['category_title'];

      ?>

<div class="col-xl-6 col-lg-6"  style="height: 200px;">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Categories</h6>

      </div>
      <!-- Card Body -->
      
    <div class="card-body">
      <form action="category.php?id=<?php echo $edit_cat_id; ?>" method="post">
        <!-- <label for="cat-title">Add Categories:  </label> -->
          <input type="text" value="<?php   echo $cat_title;   ?>" class="form-control" name="cat_title"><br>
          <input type="submit" class="btn btn-primary" value="update" name="update">
      </form>
    </div>
      
</div>
<?php
    }

  }
  
  ?>

  </div>
  <?php
      if(isset($_POST['update'])){
        $update_cat_id=$_GET['id'];
        $update_cat_title=$_POST['cat_title'];

        $update_query="UPDATE category SET category_title='$update_cat_title' WHERE category_id='$update_cat_id' ";
        $update_result=mysqli_query($connection,$update_query);

        if(!$update_result )
        { die("QUERY FAILED").mysqli_query();


        }
        else{
          header('location:category.php');
        }
      }


  ?>

<?php


  if(isset($_GET['delete'])){
    $delete_cat_id=$_GET['delete'];
    $delete_query="DELETE FROM category WHERE category_id='$delete_cat_id'";
    $delete_result=mysqli_query($connection,$delete_query);
    header('location:category.php');
  }
?>
<?php include 'includes/footer.php';?>
  

  
    