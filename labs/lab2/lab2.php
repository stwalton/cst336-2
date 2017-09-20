<!DOCTYPE html>
<?php
session_start();
?>

<html>
    <head>
        <style>
            @import url("css/styles.css");
        </style>
        <title> 777 Slot Machine (Lab 2) </title>
    </head>
    <body>
    
    <div id="main">    
        <?php
        include 'inc/functions.php';
        play();
    
    ?>
    
    <form>
        <input type="submit" value="Spin!"/>
    </form>
            
    </div> 
    
    <?php
    session_unset();
    ?>

</body>
</html>