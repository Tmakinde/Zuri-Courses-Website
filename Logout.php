<?php
    session_start();

    function logout(){
        if ($_SESSION['token'] != null) {
        session_destroy();
        return header('location: Login.php');
        }
    }

    logout();

?>