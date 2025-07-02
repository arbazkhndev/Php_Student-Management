<?php
require_once "config.php";

if(isset($_GET["name"])){
    $name = $_GET["name"];

    $query = "delete from tbl_student where student_name = $name";
    $result = mysqli_query($connection, $query);

    if($result){
        header("location:view-student.php");
        exit;
    }
    //echo $id;
}
?>