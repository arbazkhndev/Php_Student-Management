<?php
require_once "config.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $query = "delete from tbl_batch where batch_id = $id";
    $result = mysqli_query($connection, $query);

    if($result){
        header("location:view-batch.php");
        exit;
    }
    //echo $id;
}
?>