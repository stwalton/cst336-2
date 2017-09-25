<?php
    $start = microtime(true);

    session_start(); //start or resume a session

    if (!isset($_SESSION['matchCount'])) { //checks whether the session exists
        $_SESSION['matchCount'] = 1;
        $_SESSION['totalElapsedTime'] = 0;
    }
    
    // Returns an array of cards per player
    function getHand(&$deck){
         // Stores the hand of cards
        $hand = array();
        $score = 0;
        // Circumstance for drawing another card
        while($score<=36){
            $card = rand(1,13);
            $suit = rand(0,3);
            
            while($deck[13*$suit + $card] == 1){
                $card = rand(1,13);
                $suit = rand(0,3);
            }
        
            $deck[13*$suit + $card] = 1;
            
            // Converts suit value to string
            switch ($suit) {
                case 0: $suit = "clubs";
                    break;
                case 1: $suit = "diamonds";
                    break;
                case 2: $suit = "hearts";
                    break;
                case 3: $suit = "spades";
                    break;
            }
            $hand[] = $suit;
            $hand[] = $card;
            $score = $score + $card;
            $i++;
        }
        $hand[]=$score;
        return $hand;
    }
    
    
    function getPlayer($players, $count){
        echo "<div id='padding'>";
        echo "<h3>$players[$count]</h3>";
        echo "</div>";
        echo "<div class='divProfile'>";
        echo "<img id='disPlayer' src=img/profile/$players[$count].png>";
        echo "</div>";
        
        return $players;
    }
    
    // Displays the array of cards per player along with the sum of points
    function displayHand($hand){
        for($i=0; $i<count($hand); $i++) {
            $j=$i+1;
            echo "<img id='disHand' src=img/cards/$hand[$i]/$hand[$j].png>";
            $i++;
        }
        echo "<div class='divHand_1'>";
        echo "<h3 id='points'>Points: </h3>", $hand[count($hand)-1];
        echo "</div>";
        echo "<hr />";
        echo "<br>";
        
    }
    
    
    
    // Display winner(s) along with points obtained
    function displayWinners($scores, $players){
        echo "<div id='winnerText'>"; 
        $unsorted = $scores;
        sort($scores);
        $winningValue = 0;
        $pointsWon = 0;
        for($i=0; $i<4; $i++){
            if($scores[$i] <= 42){
                $winningValue = $scores[$i];
            }
        }
        
        for($i=0; $i<4; $i++){
            if($scores[$i] != $winningValue){
                $pointsWon += $scores[$i];
            }
        }
        
        $winners = 0;
        for($i=0; $i<4; $i++){
            if($unsorted[$i] == $winningValue){
                if($winners == 0){
                echo "$players[$i] Won ";
                $winners++;
                }
                else {
                    echo "and $players[$i] Won ";
                    $winners++;
                }
            }
        }
        if($winners != 0){
            $pointsWon = $pointsWon/$winners;
            echo " " . round($pointsWon) . " points";
            if($winners > 1){
                echo " each";
            }
             echo "!";
        }
        else{
            echo "Nobody Wins..";
        }
        echo " ";
        echo "</div>";
    }
    
    function elapsedTime(){
        global $start;
         echo "<hr>";
         echo "<div id='gameTime'>"; 
         $elapsedSecs = microtime(true) - $start;
         echo "This match elapsed time: " . $elapsedSecs . " secs <br /><br/>";
    
         echo "Matches played:"  . $_SESSION['matchCount'] . "<br />";
    
         $_SESSION['totalElapsedTime'] += $elapsedSecs;
         
         echo "Total elapsed time in all matches: " .  $_SESSION['totalElapsedTime'] . "<br /><br />";
         
         echo "Average time: " . ( $_SESSION['totalElapsedTime']  / $_SESSION['matchCount']);
         
         $_SESSION['matchCount']++;
         echo "</div>"; 
    } //elapsedTime
    
    // Play game function
    function playGame(){
        $players = array("Luigi", "Mario", "Yoshi", "Peach");
            //Our Deck of cards
        $deck = array();
        for($i=0; $i<52; $i++){
            $deck[] = 0;
        }
        
        shuffle($players);
        $count = 0;
        
        $hand0 = array();
        $hand0 = getHand($deck);
        $players = getPlayer($players, $count);
        displayHand($hand0);
        
        $count++;
        
        $hand1 = array();
        $hand1 = getHand($deck);
        $players = getPlayer($players, $count);
        displayHand($hand1);
                 
        $count++;
           
        $hand2 = array();
        $hand2 = getHand($deck);
        $players = getPlayer($players, $count);
        displayHand($hand2);
             
        $count++;
               
        $hand3 = array();
        $hand3 = getHand($deck);
        $players = getPlayer($players, $count);
        displayHand($hand3);
        
        $score0 = $hand0[count($hand0)-1];
        $score1 = $hand1[count($hand1)-1];
        $score2 = $hand2[count($hand2)-1];
        $score3 = $hand3[count($hand3)-1];
        
        $scores = array();
        $scores[] = $score0;
        $scores[] = $score1;
        $scores[] = $score2;
        $scores[] = $score3;
        
        displayWinners($scores, $players);
        elapsedTime();
        }
    

?>