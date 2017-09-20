<!DOCTYPE html>
<html>
    <!--

Homework 2
CST 336
Steven Walton

-->
    <head>
        <link href="https://fonts.googleapis.com/css?family=Freckle+Face" rel="stylesheet"> 
        <meta charset="utf-8" />
        <title> Homework 2 - Main Page </title>
        <style>
            body {
                background-color: #000066;
            }
        </style>
        <link href="css/styles.css" rel="stylesheet" type="text/css" /> 
    </head>

<body style="background-color:black; color:white">
        <header>
            <h1> Top Video Games </h1>
        </header>
        
        <br /><br />
        
 <div id="main">    
        <?php
        include 'inc/functions.php';
        pictures();
    
    ?>
    
        
        <footer>
            <hr>
            CST 336. 2017&copy; Walton <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
            It is used for academic purpose only. <br />
             <csulogo>
                <img src="images/csumb-logo.jpg" alt="Picture on the bottom of the page" />
            </csulogo>
                
            
        
            
            
        </footer>
        
        
        
    </body>
</html>