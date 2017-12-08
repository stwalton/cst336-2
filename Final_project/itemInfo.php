<?php

session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection();

function displayInfo() {
    global $conn;
    $sql = "SELECT * FROM inventory WHERE ItemId = " . $_GET['ItemId'];
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetch(PDO::FETCH_ASSOC);
    return $list;
}

?>


<!DOCTYPE html>
<html>
     <div id="info">
             
             <head>
                 
                 <title>
                     Info Page
                 </title>
                 
             </head>   
         
     </div>
     
     <body>
         <h2>Product Information</h2>
         <?php
         
         //Infomation List
         $list = displayInfo();
         echo "Item: " .ucfirst($list['ItemName']);
         echo "<br>";
         echo "Details: ";
         echo "<br>";
         echo ucfirst($list['priceId']);
         echo "<br>";
         
        // Uses brandId from 'invetory' table to get name of 'brand' table to grab name
         $brandid = $list['brandId'];
         $sql = "SELECT brandName FROM brand WHERE brandId = '$brandid'";
         $stmt = $conn->query($sql);	
        $brandname = $stmt->fetchAll();
        foreach ($brandname as $brand) 
        {
        	echo ucfirst($brand['brandName']);
        }
        echo "<br>"; 
         
        // Uses compId (component id) from 'invetory' table to get name of 'comp' table to grab component type 
        $compid = $list['compId'];
         $sql = "SELECT compName FROM comp WHERE compId = '$compid'";
         $stmt = $conn->query($sql);	
        $compname = $stmt->fetchAll();
        foreach ($compname as $compName) 
        {
        	echo ucfirst($compName['compName']);
        }
        echo "<br>";
         
         ?>
     </body>
</html>