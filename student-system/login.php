<?php


if(!isset($_SESSION)){                   //$_SESSION- timer of the page. this if-else function checks whether a session is existing
    session_start();
}
if(isset($_SESSION['UserLogin'])){      
    echo "Welcome"." ".$_SESSION['UserLogin'];
} else {
    echo "Welcome Guest";
}

include_once("connections/connection.php");
$connect = connection();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_query = "SELECT * FROM student_users WHERE username='$username' AND
        password='$password'";
    $user = $connect->query($sql_query) or die($connect->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;                                  //num_rows return the number of rows of the table in mysql

    if($total > 0){                                                 //stores the user if a user is existing
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        echo header("Location: index.php");
    } else {
        echo "No user found";
    }

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
    <form method="post">
        <h1>Login Page</h1>
        <br/>
        Username:
        <input type="text" name="username" id="username">
        <br/>
        Password:
        <input type="text" name="password" id="password">
        <br/> 
        <button type="submit" name="login">Login</button>
    </form>
    
</body>



<!--6. insert data using html form (go to connections folder) -->
</html>

