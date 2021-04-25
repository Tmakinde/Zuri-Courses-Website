<?php
    require 'Session.php';
    require 'PasswordController.php';

    $error = [];
    if (isset($_SESSION['token'])) {
        header('Location: dashboard.php');
        exit;
    }

    if (isset($_POST['submit'])) {
        $passwordController = new PasswordController();
        // set email

        $passwordController->email($_POST['email']);

        
        if(!$passwordController->checkUser()){ 
            echo "<ul><li>Email does not exist</li></ul>"; 
        }else{
            $_SESSION['email'] = $_POST['email'];
            return $passwordController->redirect('ResetPassword.php');
        }
        
    }



?>

<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-rA-Compatible" content="IE=edge">
    <title>ForgotPassword Page</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form id = "ForgotpasswordForm" action = "ForgotPassword.php" method = "post">
        <div>
            <label>Enter your email here</label>
            <br>
            <input type="email" name='email'><br>
        </div>
        <div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'submit'>
        </div>
         
    </form>

</body>

</html>

