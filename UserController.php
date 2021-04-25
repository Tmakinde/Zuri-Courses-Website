<?php

class UserController{

    public function __construct($email, $password){
        $this->password = $password;
        $this->email = $email;
    }

    public $name;
    public $email;
    public $password;
    public $message = [];

    protected function redirect($route){
        header('Location: '.$route);
        exit;
    }

    public function storeUser($email, $password){
        // connection
        $connection  = new connection();
        $email = $connection->connect()->real_escape_string($email);
        $hashpassword = $this->hashPassword($password);

        $sql = "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$this->name','$email','$hashpassword')";

        $query = $connection->connect()->query($sql);

        return $this->redirect('Login.php');

    }

    public function hashPassword($password){
        $hashpassword = Password_hash($password, PASSWORD_BCRYPT,['cost = 10'] );
        return $hashpassword;
    }

    public function login(){
        if($this->checkUser()){
            setSession();
            $_SESSION['name'] = $this->name;
            $_SESSION['email'] = $this->email;
            return $this->redirect('Dashboard.php');
        }else{
            echo $this->message[] = "Invalid details";
        }

    }

    public function checkUser(){
        // connection
        $connection  = new connection();

        $email = $connection->connect()->real_escape_string($this->email);

        $password = $connection->connect()->real_escape_string($this->password);

        $sql = "SELECT * FROM `users` WHERE `email` LIKE '$this->email'";

        $query = $connection->connect()->query($sql);

        $count = $query->num_rows;

        if ($count == 1) {
            $fetch = $query->fetch_assoc();
            $this->name = $fetch ['name'];
            if($this->checkPassword($this->password, $fetch ['password'])){
                return true;
            }else{
                return false;
            }
        }else {
            return false;
        }
    }

    public function checkPassword($password, $password2){
        if(Password_verify($password, $password2)){
            return true;
        }
        return false;
    }


}

?>