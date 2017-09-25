<?php
    include 'functions.php'; 
?>
<!DOCTYPE html>

<html>
    <head>
        <title> Silver Jack </title>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet">
    </head>
    
    <body>
        <header>
            <font size="10"><h1><u>Silver Jack</u></h1> </font>
        </header>
        <main>
            <div class="divDisplay">
                <?php
                    playGame();
                ?>
                  <form id form>
                      <input type="submit" name="play" class="button" value = "Play Again"/>
                  </form>
                    <?php
                        if (array_key_exists('play', $_POST)) {
                            playGame();
                        }
                    ?>
            </div>

        </main>
        
        <hr class="hrColour"/>
        <footer>
            <img id="imgResize" src="img/csumb.jpg" alt="theses"/>
            <div class="foot">
            CST336. 2017&copy; Torres, Walton, Mijangos, Stine <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
            It is used for academic purposes only.
            </div>
        </footer>
    </body>
    
    
</html>