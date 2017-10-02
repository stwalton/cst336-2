<?php
function yearList($starList, $EndList) {
for ($i = startList; $i < Endlist; $i++) {
                
                echo "<li> Year $i </li>";
                if ($i == '1500') {
                    echo "Happy New Century";                
                }
                else if ($i == '1776') {
                    echo "USA INDEPENDENCE";
                }
            
            }
            
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Chinese Zodiac List</title>
    </head>
    <body>
    
        <H1>Chinese Zodiac List</H1>
        
        <ul>
        <?php
        $startList = $_GET[Startyear];
        $Endlist = $_GET[Endyear]
        yearList($startList, $Endlist);
    ?>
        </ul>
    
    
    </body>
</html>