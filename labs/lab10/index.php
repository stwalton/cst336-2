<?php

  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
  
  if ($_FILES['myFile']['size']< 1000000){
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
  }
  else{
      echo "Error: File must be under 1MB!".$_FILES["myFile"]["error"]."<br />";

  }
  
  $files = scandir("gallery/", 1);
 // print_r($files);
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
    </head>
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" />

    </form>
    
    
    <?php 
    
     for ($i = 0; $i < count($files) - 2; $i++) {
     
     echo "<img src='gallery/" .   $files[$i] . "' width='50' >";
      
  }
    
    ?>

    </body>
</html>