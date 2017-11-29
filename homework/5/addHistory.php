<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();


$sql = "INSERT INTO `hw_5` (`search`, `time`) VALUES ('test 1', CURRENT_TIMESTAMP)"; 


//echo json_encode($record);
?>