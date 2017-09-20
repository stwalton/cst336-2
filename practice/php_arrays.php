<?php

function displaySymbol() {
    
    echo "img src='../labs/lab2/imgages/$symbol.png' width='70' />";

    
}

$symbols = array("lemon", "orange", "cherry");
//print_r($symbols); //displats array contents, only for debugging purposes

//echo $symbols[0]; //displays first element in array
//displaySYmbol($symbols[2]);

$symbols[] = "grapes"; //adds element at the end of the array

//$symbols[2] = "seven"; //replacing value

array_push($symbols, "seven"); //adds element at the end of the array

//displaySymbol($symbols[4]);

for ($i=0; $i < 5; $i++) {
    displaySymbol($symbols[$i]);
}


sort($symbols); // sorts elements in ascending order
print_r($symbols);

// Shuffle symbols
shuffle($symbols);
echo "<hr>";
print_r($symbols);

$lastSymbol = array_pop($symbols); //retrieves and REMOVES last element in an a array
displaySymbol($lastSymbol);
echo "<hr>";
print_r($symbols);

foreach ($symbols as $symbol) {
    displaySymbol($symbol);
}

unset($symbols[2]); //deletes an element in the array
echo "<hr>";
print_r($symbols);
$symbols = array_values($symbols); //re-indexes the array
echo "<hr>";
print_r(symbols);

echo "<hr>";

//display a random symbol
displaySymbol($symbols[rand(0,count($symbols)-1)]);

displaySymbol($symbols[array_rand($symbols)]);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays </title>
    </head>
    <body>
        
        

    </body>
</html>