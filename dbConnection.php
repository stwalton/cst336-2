<?php

    function getDatabaseConnection() { 
        $host = 'localhost'; // cloud 9
        $dbname = 'tcp';
        $username = 'root';
        $password = '';
    
        if (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["user"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        }
    
        $dbConn = new PDO("mysql:host=$host; dbname=$dbneme", $username, $password);
        $dbConn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn;
    
    }

?>