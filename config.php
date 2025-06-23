<?php 
$username = "root";
$host = "localhost";
$password = "" ;
$db_name = "student_management";

$connection = mysqli_connect($host,$username,$password,$db_name);

if($connection == false){
    die("connection failed !!".mysqli_connect_error());
}

mysqli_close($connection);
?>