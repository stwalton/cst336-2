<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 - HTML Forms / PHP </title>
        <meta charset="utf-8">
    </head>
    
<body>
    
    <div id="quiz">
        
        <?php
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $answer1 = $_POST['question-1'];
        $answer2 = $_POST['question-2'];
        $answer3 = $_POST['question-3'];
        $answer4 = $_POST['question-4'];
        
        $total = 0;
        
        if ($answer1 == "CST336") { $total++; }
        if ($answer2 == "True") { $total++; }
        if ($answer3 == "Miguel") { $total++; }
        if ($answer4 == "False") { $total++; }
        
        echo "<div id='result'>$first_name $last_name you got $total / 4 correct.</div>";
        ?>
        
    </div>
    
</body>