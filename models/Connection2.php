<?php
    
    class Connection2 extends Mysqli{
        function __construct()
        {
            // 
            include '../environments/psw.php';
            // 
            parent:: __construct($db_host, $db_user, $db_password, $db_base);
            $this->set_charset('utf8');
            $this->connect_error ==NULL ? 'Conexión exítosa a la BD' : die($db_host);
        }//end __construct
    }//end class Connection