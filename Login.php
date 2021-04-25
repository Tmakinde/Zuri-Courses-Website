<?php
    require 'Session.php';
    require 'Validator.php';
    require 'UserController.php';
    
    if (isset($_SESSION['token'])) {
        header('Location: dashboard.php');
        exit;
    }

    if (isset($_SESSION['email'])) {
        session_destroy();
    }

    if (isset($_POST['submit'])) {
        $controller = new UserController($_POST['email'], $_POST['password']);
        $validator = new Validator($_POST['email'], $_POST['password']);
        if($validator->checkInput() != []){
            foreach ($validator->checkInput() as $key => $value) {
                echo "<ul><li>".$value."</li></ul>";
            }
        }else{
            $controller->login();
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
    <h2>Login Here</h2>
    <form id = "loginForm" action = "Login.php" method = "post">
        <div>
            <label>Email</label>
            <br>
            <input type="email" name='email'><br>
            <span><?php if(isset($error['email'])){echo $error['email'];}  ?></span>
        </div>
        
        <div>
            <label>Password</label>
            <br>
            <input type="password" name='password'><br>
            <span><?php if(isset($error['password'])){echo $error['password'];}   ?></span>
        </div>

        <div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Login'>
            <a href="Forgotpassword.php">forgot password</a>
        </div>
        <div>
            <a href="index.php">register here</a>
        </div>
         
    </form>

</body>

</html>

