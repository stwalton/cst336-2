<?php
session_start();
include 'dbConnection.php';
$conn = getDatabaseConnection();

// Get inventory to display
function initialDisplay() {
    global $conn;
    $sql = "SELECT * FROM `inventory` ORDER BY `inventory`.`ItemId` ASC ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $list = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $list;
}

?>

<!DOCTYPE html>
<html>
    <title>
        Final Project - Computer Invetory
    </title>
    <head>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    
    <body>
        
        <login>
            <a href="adminLogin.html">Admin Login</a>
        </login>
        
        <storeName>
            <h1>Walton's workshop</h1>
        </storeName>
        
        <buttons>
            
        </buttons>
        
        <?php
        $list = initialDisplay();
        foreach($list as $product) {
            //$itemInfo = $product['ItemName'];
            echo "<h3> " .$product['ItemName']. "</h3>";
            echo "<a href='itemInfo.php?ItemId=".$product['ItemId']."'> More Information </a>";
            //echo "<br>";
            
        }
        
        ?>
    </body>
</html>