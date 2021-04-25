<?php
    include 'Session.php';
    
    if ($_SESSION['token'] == null) {
        header('Location: Login.php');
        exit;
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
    <h2>Dashboard Page</h2>
    <div>
        <a href="Courses.php">My Course</a>
    </div>

    <div>
        <a href="ResetPassword.php">Reset Password</a>
    </div>

    <div>
        <a href="Logout.php">Logout Here</a>
    </div>
    
    
    
</body>

</html>

