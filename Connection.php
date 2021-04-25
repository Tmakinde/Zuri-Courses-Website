<?php 

    class Connection{

        public $serverName = "localhost";
        public $username = "root";
        public $password = "";
        public $databaseName = "Zuri";
        public $conn;

        public function connect(){
            $this->conn = @new mysqli($this->serverName,$this->username,$this->password,$this->databaseName);
            if ($this->conn->connect_error){
                die("connection failed: ".$this->conn-> connect_error);
            }else {
                return $this->conn;
            }

        }
    }


?>