<?php
    require 'Session.php';
    require 'CourseController.php';

    $courseController = new CourseController;
    
    if ($_SESSION['token'] == null) {
        header('Location: Login.php');
        exit;
    }

    if(isset($_POST['addSubmit'])){
        $courseController->create($_POST['title'], $_POST['content']);

        header('Location: Courses.php');
    }

    if(isset($_POST['deleteSubmit'])){
        $courseController->delete($_GET['id']);

        header('Location: Courses.php');
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
    <h2>Courses Page</h2>
    <div>
        <table border="1" width="100%">
            <tr>
                <td style="">Title</td>
                <td>View</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>

            <?php
                if (!empty($courseController->index())) {
                    $result = $courseController->index();
                    foreach ($result as $key => $value) {
                        echo "<tr>";
                        echo "<td>".$result[$key]['title']."</td>";
                        echo "<td><a href=ViewCourses.php?id=".$result[$key]['id'].">View Course</a></td>";
                        echo "<td><a href=EditCourses.php?id=".$result[$key]['id'].">Click to edit</a></td>";
                        $form = '<form action="Courses.php?id='.$result[$key]['id'].'" method="post">
                            <input type="submit" name="deleteSubmit" value="delete">
                        </form>';
                        echo "<td>".$form."</td>";
                        echo "</tr>";
                    }
                    
                }else{
                    echo "<li>"."No courses yet!"."</li>";
                }
                
            ?>
        </table>
    </div>

    <div>
        <h3>ADD COURSES</h3>
        <form id = "courseForm" action = "Courses.php" method = "post">
            <div>
                <label>Title</label>
                <br>
                <input style="width:500px;" type="text" name='title' required><br>
            </div>
            <div>
                <label>Content</label>
                <br>
                <textarea type="text" name='content' style="width:500px;height: 300px" required></textarea><br>
            </div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'addSubmit' value = 'Submit'>
        </form>
    </div>
    <a href="">Logout Here</a>
</body>

</html>

