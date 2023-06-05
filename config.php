<?php 
session_start();
    $servername ="localhost";
    $username = "root";
    $password = "";
    $db = "PBL"; 
    $conn = mysqli_connect($servername,$username,$password,$db);

    if(!$db)
    {
        die("Connection failed".mysqli_connect_error());
    }
?>