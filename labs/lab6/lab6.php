<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Lab 6: Admin Login Page </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    
<body>
        
        <div class="container">
            <h1> Admin Login </h1>
        
            <form method="POST" action="loginProcess.php">
            
                Username: <input type="text" name="username"/> <br />
            
                Password: <input type="password" name="password"/> <br />
            
                <input type="submit" name="login" value="Login"/>
            
            </form>
        
        
        
            <?php
                if(isset($_SESSION["error"])){
                    $error = $_SESSION["error"];
                    echo "<span>$error</span>";
                    }
                    ?> 
        </div>
        
    </body>
</html>

<?php
    unset($_SESSION["error"]);
?>