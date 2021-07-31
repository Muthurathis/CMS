<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">Select file</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="submit" name="submit">


    </form>
    <?php
        if(isset($_POST['submit']))
        {  print_r($_FILES['file']);
            $file_name=$_FILES['file']['name'];
            $file_tmp=$_FILES['file']['tmp_name'];
            $file_size=$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];
          
            

            
            move_uploaded_file($file_tmp,"./".$file_name);
            echo "sucess";
     
        }

    ?>
</body>
</html>




