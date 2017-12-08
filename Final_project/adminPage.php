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
        Final Project - Admin Page
    </title>
    <head>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    
    <body>
        
        <add>
            <a href="addEntry.php">Add entry</a> <br>
            <a href="index.php">Logout</a> <br>
        </add>
        
        <admin>
            <h1>Admin Page</h1>
        </admin>
        
        <buttons>
            
        </buttons>
        
        <?php
        $list = initialDisplay();
        foreach($list as $product) {
            echo "<h3> " .$product['ItemName']. "</h3>";
            echo "<a href='editInfo.php?ItemId=".$product['ItemId']."'> Edit Entry </a>";
            //echo "<br>";
            
        }
        
        ?>
    </body>
</html>