<?php
    require 'Session.php';
    require 'PasswordController.php';

    $error = [];

    if (!isset($_SESSION['email'])) {
        header('Location: Login.php');
    }

    if (isset($_POST['submit'])) {
        $passwordController = new PasswordController();
        // set email
        if (isset($_SESSION['token'])) {
            $passwordController->email($_SESSION['email']);
        }else{
            $passwordController->email($_SESSION['email']);
        }
        $passwordController->password($_POST['password']);
        if(!$passwordController->confirmPassword()){ 
            echo "<ul><li>Password does not match</li></ul>";
        }else{
            $passwordController->storeUser();
        }
        
    }

?>

<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form id = "resetpasswordForm" action = "ResetPassword.php" method = "post">
        <label>Enter your  new password here</label>
        <div>
            <br>
            <input type="password" name='password'><br>
        </div>
        <div>
            <br>
            <input type="password" name='password_confirm'><br>
        </div>
        <div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Reset Password'>
        </div>
         
    </form>

</body>

</html>

