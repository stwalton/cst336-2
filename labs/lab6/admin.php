<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: lab6.php");
    exit();
    
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();


function displayUsers() {
    global $conn;
    $sql = "SELECT * 
            FROM tc_user
            ORDER BY lastName";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
        <script>
            
            function confirmDelete(firstName) {
                
                
                return confirm("Are you sure you want to delete " + firstName + "?");
                
            }
            
            
        </script>
    <body>

        <div class="container">
            <h1> TCP ADMIN PAGE </h1>
            <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
            
            <hr>
            
            <form action="addUser.php">
                
                <input type="submit" value="Add new User" />
                
            </form>
            
                <form action="logout.php">
                    
                    <input type="submit" value="Logout" />
                    
                </form>
            
            
            <br /><br />
            
            <?php
            
            $users =displayUsers();
            
            foreach($users as $user) {
                
                echo $user['userId'] . '  ' . $user['firstName'] . "  " . $user['lastName'] . "<br />";
                echo "[<a href='updateUser.php?userId=".$user['userId']."'> Update </a> ]";
                //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
                echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                         <input type='hidden' name='userId' value='".$user['userId']."' />
                         <input type='submit' value='Delete'>
                      </form>
                    ";
                    
                echo "<br />";
                
            }
            
            
            
            ?>
        </div>    
    </body>     
</html>