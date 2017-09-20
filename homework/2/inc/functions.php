<?php

function pictures() {
            for ($i=1; $i<=10; $i++){
                ${"randomValue" . $i } = rand(0, 14);
               // checker(${"randomValue" . $i});
                displaypictures(${"randomValue" . $i}, $i);
                
                
            }
    
        }

//function checker($randomValue, $check, $i) {
    //$check
  //  unset(($randomValue[$check]))
        
    //}
    //return  $randomValue;
//}



function displaypictures($randomValue, $i){
    
        switch($randomValue) {
            case 0: $symbol = "zelda";
                break;
            case 1: $symbol = "witcher3";
                break;
            case 2: $symbol = "overwatch";
                break;
            case 3: $symbol = "league";
                break;
            case 4: $symbol = "dota2";
                break;
            case 5: $symbol = "pubg";
                break;
            case 6: $symbol = "ds3";
                break;
            case 7: $symbol = "rl";
                break;
            case 8: $symbol = "smash";
                break;
            case 9: $symbol = "tlou";
                break;
            case 10: $symbol = "destiny";
                break;
            case 11: $symbol = "horizon";
                break;
            case 12: $symbol = "portal";
                break;
            case 13: $symbol = "kerb";
                break;
            case 14: $symbol = "conker";
                break;
        }
        echo "<pre>";
        echo "<img id='reel$pos' src='images/$symbol.png' alt='$symbol' title='". ucfirst($symbol) . "'width = 400' 'height = 400'> ";
        unset($randomValue);
}
    



?>