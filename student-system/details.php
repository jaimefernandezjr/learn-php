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

$id = $_GET['ID'];

// 3. create mysql querie
$sql = "SELECT * FROM student_list WHERE id='$id'";                            //create a query
$students = $connect->query($sql) or die($connect->error);     //connect the query and add a try-catch error 
$row = $students->fetch_assoc();                                //fetch_assoc() returns a row of data

//4. test if it can display data on the php webpage
// do { 

//     echo $row['first_name']." ".$row['last_name']."<br>";

// } while ($row = $students->fetch_assoc());


if(!isset($_SESSION)){                   //$_SESSION- timer of the page. this if-else function checks whether a session is existing
    session_start();
}
if(isset($_SESSION['Access']) && $_SESSION['Access'] == 'admin'){           //checks if user is the administrator  
    echo "Welcome"." ".$_SESSION['UserLogin']."<br>";
} else {
    echo header("Location: index.php");
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
    <h1>Student Information</h1>
    
    <form action="delete.php" method="post">
        <a href="index.php"> <--Back </a><br>
        <a name="hotdog" href="edit.php?ID=<?php echo $row['id'];?>">Edit |</a>
        <?php if($_SESSION['Access'] == "admin"){?>
            <button type="submit" name="delete">Delete</button>
            <input type="hidden" name='ID' value="<?php echo $row['id'];?>"> 
        <?php }?>
    </form>


    <a href="delete.php">Delete</a>
    <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
    <p>is a <?php echo $row['gender'] ?></p>

<!--6. insert data using html form (go to connections folder) -->
</html>

