<?php
    class DataConnector{
        private $servername;
        private $username;
        private $password;
        public $connection;
        
        function __construct(){
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->connection = new mysqli(
                $this->servername, 
                $this->username, 
                $this->password, 
                "software_engineering"
            );
        }

        function select($table, $where_clause){
            return $this->connection->query(
                "SELECT * FROM " 
                . $table 
                . " WHERE " 
                . $where_clause 
                .  " ;"
            );
        }
    }
?>