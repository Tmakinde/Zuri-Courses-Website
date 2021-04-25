<?php
    require 'Session.php';
    require 'CourseController.php';

    $courseController = new CourseController;
    
    if ($_SESSION['token'] == null) {
        header('Location: Login.php');
        exit;
    }

    $course = $courseController->show($_GET['id']);


?>
<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Courses</title>
</head>
<body>
    <h2>Courses Page</h2>


    <div>
        <h2>Title: <?php echo $course['title']; ?></h2>
    </div>

    <div>
        <h2>Content</h2>
        <h3><?php echo $course['content']; ?></h3>
    </div>

    <a href="">Logout Here</a>
</body>

</html>

