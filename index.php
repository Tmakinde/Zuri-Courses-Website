<?php
    require 'Validator.php';
    require 'UserController.php';

    if (isset($_POST['submit'])) {
        $Controller = new UserController($_POST['email'], $_POST['password']);
        $validator = new Validator($_POST['email'], $_POST['password']);
        $validator->name = $_POST['name'];
        if(!$validator->passes()){
            foreach ($validator->fails() as $key => $value) {
                echo "<ul><li>".$value."</li></ul>";
            }
        }else{
            $Controller->storeUser($_POST['email'], $_POST['password']);
        }
    }

?>
<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
</head>
<body>
    <h2>Register Here</h2>
    <form id = "registerForm" action = "index.php" method = "post">
        <div>
            <label>Name</label>
            <br>
            <input type="text" name='name'><br>
        </div>
        <div>
            <label>Email</label>
            <br>
            <input type="email" name='email'><br>
        </div>
        <div>
            <label>Password</label>
            <br>
            <input type="password" name='password'><br>
        </div>
        <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Submit'>
        <small>already have an account ?</small>
        <a href="Login.php">Login here</a>
        
    </form>

</body>

</html>

