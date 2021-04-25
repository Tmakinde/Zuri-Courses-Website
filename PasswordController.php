<?php
require 'Connection.php';
class PasswordController{

    public $email;
    public $password;
    public $message = [];

    public function email($email){
        return $this->email = $email;
    }

    public function password($password){
        return $this->password = $password;
    }


    public function redirect($route){
        header('Location: '.$route);
        exit;
    }

    public function storeUser(){
        // connection
        $connection  = new connection();
        $email = $connection->connect()->real_escape_string($this->email);
        $hashpassword = $this->hashPassword($this->password);

        $sql = "UPDATE `users` SET `password`='$hashpassword' WHERE `email` LIKE '$this->email'";

        $query = $connection->connect()->query($sql);
        // session here
        return $this->redirect('Login.php');
        
    }

    public function hashPassword($password){
        $hashpassword = Password_hash($password, PASSWORD_BCRYPT,['cost = 10'] );
        return $hashpassword;
    }

    public function checkUser(){
        // connection
        $connection  = new connection();

        $email = $connection->connect()->real_escape_string($this->email);

        $sql = "SELECT * FROM `users` WHERE `email` LIKE '$this->email'";

        $query = $connection->connect()->query($sql);

        $count = $query->num_rows;

        if ($count > 0) {
            return true;
            
        }else {
            return false;
        }
    }

    public function validPassword(){
            
        if (!empty($this->password)) {
            return true;
        }
        return $this->message["password"] = "password is required";

    }

    public function confirmPassword(){
            
        if ($_POST['password'] == $_POST['password_confirm'] && !empty(trim($_POST['password_confirm'])) && !empty(trim($_POST['password']))) {
            return true;
        }
        return false;

    }


}

?>
