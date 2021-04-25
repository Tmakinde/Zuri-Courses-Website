<?php
    require 'Session.php';
    require 'CourseController.php';

    $courseController = new CourseController;
    
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
    <title>Courses</title>
</head>
<body>
    <?php
        $id = $_GET['id'];
        $course = $courseController->show($id);

        if(isset($_POST['updateSubmit'])){
            $courseController->update($_GET['id'], $_POST['title'], $_POST['content']);
    
            header('Location: Courses.php');
        }
    ?>
    <h2>Courses Page</h2>

    <div>
        <h3>UPDATE COURSES</h3>
        <form id = "courseForm" action = "EditCourses.php?id=<?php echo $id;  ?>" method = "post">
            <div>
                <label>Title</label>
                <br>
                <input style="width:500px;" type="text" value="<?php echo $course['title'] ?>" name='title' required><br>
            </div>
            <div>
                <label>Content</label>
                <br>
                <textarea type="text" name='content' style="width:500px;height: 300px" required><?php echo $course['content'] ?></textarea><br>
            </div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'updateSubmit' value = 'Submit'>
        </form>
    </div>
    <a href="">Logout Here</a>
</body>

</html>

