<?php

include_once("connections/connection.php");

$connect = connection();
//1. connect and login to the mysql first
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "student_system";

// $connect = new mysqli($host, $username, $password, $database);

//2. check if connecting to mysql is successful
// if($connect->connect_error){
//     echo $connect->connect_error;
// } else {
//     echo "Connected";
// } 

// 3. create mysql querie
$sql = "SELECT * FROM student_list";                            //create a query
$students = $connect->query($sql) or die($connect->error);     //connect the query and add a try-catch error 
$row = $students->fetch_assoc();                                //fetch_assoc() returns a row of data

//4. test if it can display data on the php webpage
// do { 

//     echo $row['first_name']." ".$row['last_name']."<br>";

// } while ($row = $students->fetch_assoc());

?>

<!-- 5. Create an html table and properties-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Student Management System</h1>
    <br>
    <br>
    <a href="add.php">Add New</a>
    <!-- outputs a table of first and last names -->
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>

            </tr>
        </thead>
        <tbody>
             prints the data on the webpage 
            <?php do{ ?>
            <tr>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name']; ?></td>
            </tr>
            <?php }while($row = $students->fetch_assoc()); ?>
        </tbody>
    </table>
</body>



<!--6. insert data using html form (go to connections folder) -->
</html>

