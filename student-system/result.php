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
echo $search = $_GET['search'];

// 3. create mysql querie
$sql = "SELECT * FROM student_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%' ORDER BY 'id'";              //create a query
$students = $connect->query($sql) or die($connect->error);     //connect the query and add a try-catch error 
$row = $students->fetch_assoc();                                //fetch_assoc() returns a row of data

//4. test if it can display data on the php webpage
// do { 

//     echo $row['first_name']." ".$row['last_name']."<br>";

// } while ($row = $students->fetch_assoc());


if(!isset($_SESSION)){                   //$_SESSION- timer of the page. this if-else function checks whether a session is existing
    session_start();
}
if(isset($_SESSION['UserLogin'])){      
    echo "Welcome"." ".$_SESSION['UserLogin'];
} else {
    echo "Welcome Guest";
}
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

    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">search</button>
    </form>


    <?php if(isset($_SESSION['UserLogin'])){ ?>
        <a href="logout.php">Log out</a>
    <?php } else { ?>
        <a href="login.php">Log In</a>
    <?php } ?>
    <a href="add.php">Add New</a>
    <!-- outputs a table of first and last names -->
    <table>
        <thead>
            <tr>
                <th></th>
                <th>First Name</th>
                <th>Last Name</th>

            </tr>
        </thead>
        <tbody>
             <!--prints the data on the webpage -->
            <?php do{ ?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">View Details</a></td>                <!--display the id on hover-->
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name']; ?></td>
            </tr>
            <?php }while($row = $students->fetch_assoc()); ?>
        </tbody>
    </table>
</body>



<!--6. insert data using html form (go to connections folder) -->
</html>

