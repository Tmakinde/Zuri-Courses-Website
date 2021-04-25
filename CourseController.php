<?php
require 'Connection.php';

class CourseController{

    public function userId(){
        // connection
        $connection  = new connection();

        $email = $_SESSION["email"];

        $sql = "SELECT * FROM `users` WHERE `email` LIKE '$email'";

        $query = $connection->connect()->query($sql);

        $fetch = $query->fetch_assoc();
        return $fetch['id'];

    }

    public function index(){
        $connection  = new connection();

        $email = $_SESSION["email"];

        $userId = $this->userId();

        $sql = "SELECT * FROM `courses` WHERE `user_id` LIKE '$userId'";

        $query = $connection->connect()->query($sql);
        $rows = $query->num_rows;
        $fetch = [];
        $i = 1;
        while($i <= $rows){
            array_push($fetch, $query->fetch_assoc());
            $i++;
        }

        return $fetch;
    }

    public function create($title, $content){
        $connection  = new connection();
        $userId = $this->userId();
        $sql = "INSERT INTO `courses` (`title`,`content`, `user_id`) VALUES ('$title','$content', '$userId')";

        $query = $connection->connect()->query($sql);

        return;
    }

    public function show($id){
        $connection  = new connection();

        $email = $_SESSION["email"];

        $sql = "SELECT * FROM `courses` WHERE `id` LIKE '$id'";

        $query = $connection->connect()->query($sql);

        $fetch = $query->fetch_assoc();

        return $fetch;

        //return $this->redirect('Login.php');
    }

    public function update($id, $title, $content){
        $connection  = new connection();

        $sql = "UPDATE `courses` SET `title`='$title', `content`='$content' WHERE `id` LIKE '$id'";

        $query = $connection->connect()->query($sql);

        return;
    }
    
    public function delete($id){
        $connection  = new connection();

        $email = $_SESSION["email"];

        $sql = "DELETE FROM `courses` WHERE `id` LIKE '$id'";

        $query = $connection->connect()->query($sql);

        return $fetch;
    }    
}

?>