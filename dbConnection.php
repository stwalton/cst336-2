<?php
    //echo "Inside dbconnection";
    function getDatabaseConnection() { 
        echo "inside db connection function";
        $host = 'us-cdbr-iron-east-05.cleardb.net';
        $dbname = 'heroku_6426014b995b402';
        $username = 'be6ab7d0f68ac3';
        $password = '1c93f923';
    
        //if (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            //echo "if statement for heroku";
            //$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            //$host = $url["host"];
            //$dbname = substr($url["user"], 1);
            //$username = $url["user"];
            //$password = $url["pass"];
       //}
    
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn;
    
    }

?>