<?php
    function getDBConnection() 
    {
        $host = "us-cdbr-iron-east-04.cleardb.net";
        $dbName = "heroku_0b3af04d3713ab8";
        $username = "bebee0c44ea497";
        $password = "b11fbbba";
        
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbName = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        
        try {
            //Creates a database connection
            $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        
            // Setting Errorhandling to Exception
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
        catch (PDOException $e) {
           echo "Problems connecting to database!";
           exit();
        }
        
        
        return $dbConn;
    }

?>