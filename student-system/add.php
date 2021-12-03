<?php
    include_once('connections/connection.php');
    $connect = connection();

                    
    if(isset($_POST['submit'])){  //isset() checks whether the variable is null or not
                        //$_POST refers to all functions which calls the "post"
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];

        $sql_query = "INSERT INTO `student_list`(`first_name`, `last_name`,
         `gender`) VALUES ('$fname', '$lname', '$gender')";
        $connect->query($sql_query) or die($connect->error);

        echo header('Location: index.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Add a student in the database </h1>
    <form action="" method="post">
        First name:
        <input type="text" name="firstname" id="search" >
        Last Name:
        <input type="text" name="lastname" id="search" >
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="submit" name="submit" value="Submit form">
    </form>


</body>
</html>