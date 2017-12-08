<?php

    include 'dbConnection.php';
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM inventory
            WHERE ItemId = " . $_GET['ItemId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location: adminPage.php");
    break;
    
?>