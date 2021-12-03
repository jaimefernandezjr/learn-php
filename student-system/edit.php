<?php
    include_once('connections/connection.php');
    $connect = connection();
    $id = $_GET['ID'];

    $sql = "SELECT * FROM student_list WHERE id='$id'";                            //create a query
    $students = $connect->query($sql) or die($connect->error);     //connect the query and add a try-catch error 
    $row = $students->fetch_assoc();                                //fetch_assoc() returns a row of data         


    if(isset($_POST['submit'])){  //isset() checks whether the variable is null or not
                        //$_POST refers to all functions which calls the "post"
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $gender = $_POST['gender'];

        $sql_query = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', gender = '$gender'
            WHERE id = '$id'";
        $connect->query($sql_query) or die($connect->error);

        echo header('Location: details.php?ID='.$id);
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
    <h1>Edit the student's info in the database </h1>
    <form action="" method="post">
        First name:
        <input type="text" name="firstname" id="search" value="<?php echo $row['first_name'];?>">
        Last Name:
        <input type="text" name="lastname" id="search" value="<?php echo $row['last_name'];?>">
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : '';?>>Male</option>
            <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : '';?>>Female</option>
        </select>
        <input type="submit" name="submit" value="Update">
    </form>


</body>
</html>