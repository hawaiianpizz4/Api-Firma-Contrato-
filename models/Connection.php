<?php

// Database credentials $host = $_ENV['DB_HOST']; 
    class Connection extends Mysqli{
        
        function __construct()
        {   
            $dbhost = $_ENV['DB_HOST']; 
            $username = $_ENV['DB_USER']; 
            $password = $_ENV['DB_PSW'];
            $dbname = $_ENV['DB_BASE'];
            echo $dbhost;
            echo $username;
            parent:: __construct($dbhost, $username, $password , $dbname);
            $this->set_charset('utf8');
            $this->connect_error ==NULL ? 'Conexión exítosa a la BD' : die('Error al conectarse a la BD');

        }//end __construct
    }//end class Connection
?>