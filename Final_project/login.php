<?php
session_start();

include 'dbConnection.php';
$conn = getDatabaseConnection();

//$username = "test";
//$password = sha1("2test");
$username = $_POST['username'];
$password = sha1($_POST['password']);



$sql = "SELECT *
        FROM admin
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

//print "success";


if (empty($record)) {
 
    echo "Wrong username or password!";
    
} else {
    
   print "success";
   
}
?>