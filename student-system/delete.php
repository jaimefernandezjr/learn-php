<?php

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_POST['delete'])){

        $id = $_POST['ID'];

        $sql_query = "DELETE FROM student_list WHERE id='$id'";
        $con->query($sql_query) or die($con->error);


    }