<?php
    require 'Connection.php';

    class Validator {

        // email
        public $email;

        public $message = []; 

        //password
        public $password;

        public $name;
        
        public function __construct($email, $password){
            $this->email = $email;
            $this->password = $password;
        }

        public function name($name){
            return $this->name = $name;
        }

        // check if email exist
        public function checkEmail(){
            // connection
            $connection  = new connection();

            $email = $connection->connect()->real_escape_string($this->email);

            $sql = "SELECT * FROM `users` WHERE `email` LIKE '$this->email'";

            $query = $connection->connect()->query($sql);

            $getUser = $query->num_rows;

            if (empty($getUser)) {
                return true;
            }else{
                return false;
            }
        }

        public function errors(){

            if (!$this->checkEmail()) {
                $this->message["data"] = "email already exist";
            }
            
            $this->validEmail();
            
            $this->validPassword();
            
            return $this->message;
        }

        public function checkInput(){
            
            $this->validEmail();
            
            $this->validPassword();
            
            return $this->message;
        }

        public function checkRegisterInput(){
            
            $this->validEmail();
            
            $this->validPassword();

            $this->validName();
            
            return $this->message;
        }

        public function checkUser(){
            $this->validEmail();
            return $this->message;
        }

        public function checkUserPassword(){
            $this->validPassword();
            return $this->message;
        }

        public function passes(){

            if ($this->errors() == []) {
                return true;
            }
            return false;

        }

        public function fails(){

            return $this->errors();

        }

        public function validEmail(){
            
            if (!empty($this->email)) {
                return true;
            }
            return $this->message["email"] = "email is required";

        }

        public function validPassword(){
            
            if (!empty($this->password)) {
                return true;
            }
            return $this->message["password"] = "password is required";

        }

        public function validName(){
            
            if (!empty($this->name)) {
                return true;
            }
            return $this->message["name"] = "name is required";

        }

    }
    

?>
