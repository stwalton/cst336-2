<?php

function play() {
            for ($i=1; $i<4; $i++){
                ${"randomValue" . $i } = rand(0,3);
                displaySymbol(${"randomValue" . $i}, $i);
            }
    
            displayPoints($randomValue1, $randomValue2, $randomValue3);
        }

function displaySymbol($randomValue, $pos){
        /*if ($randomValue == 0 ) {
            echo '<img src="images/seven.png" alt="seven" title="Seven" width="70" />';
            } 
        else if ($randomValue == 1) {
            echo '<img src="images/cherry.png" alt="cherry" title="Cherry" width="70" />';
            } 
        else {
            echo '<img src="images/lemon.png" alt="lemon" title="Lemon" width="70" />';
            }
        }*/
        
        switch($randomValue) {
            case 0: $symbol = "seven";
                break;
            case 1: $symbol = "cherry";
                break;
            case 2: $symbol = "lemon";
                break;
            case 3: $symbol = "grapes";
                break;
        }
        echo "<img id='reel$pos' src='images/$symbol.png' alt='$symbol' title='". ucfirst($symbol) . "' width='70' >"; 
}
        
function displayPoints($randomValue1, $randomValue2, $randomValue3) {
        
        echo "<div id ='output'>";
        if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
            switch ($randomValue1) {
                case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                case 1: $totalPoints = 500;
                        break;
                case 2: $totalPoints = 250;
                        break;
                case 3: $totalPoints = 900;
                        break;
            }
            $_SESSION["total"] = $_SESSION["total"] + $totalPoints;
            echo "<h2>You Won $totalPoints points!</h2>";
            echo "<h2>Total Points: $_SESSION[total]</h2>";
        } 
        else {
            echo "<h3> Try Again! </h3>";
        }
        echo "</div>";
}



?>