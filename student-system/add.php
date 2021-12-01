<?php
    include_once('connections/connection.php');
    $con = connection();

                    
    if(isset($_POST['submit'])){  //isset() checks whether the variable is null or not
                        //$_POST refers to all functions which calls the "post"
        echo "submitted";

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
    
    <form action="" method="post">
        <input type="text" name="firstname" id="search" >
        <input type="text" name="lastname" id="search" >
        <input type="submit" name="submit" value="Submit form">
    </form>


</body>
</html>