<?php include "header.php"?>

<div class="container-fluid">

<h1>Edit Student Record</h1>

<?php
if(isset($_GET["name"])){
    $name = $_GET["name"];
    $query = "SELECT * FROM `tbl_student` where student_name = '$name'";
    $result = mysqli_query($connection,$query);
    $rows = mysqli_fetch_assoc($result);
}
?>
    <form method="post">
        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student Name</label>
            <input type="text" class="form-control" value="<?php echo $rows['student_name']; ?>" name="student_name" placeholder="Enter Student Name">
        </div>
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student email</label>
            <input type="text" class="form-control" value="<?php echo $rows['student_email']; ?>" name="student_email" placeholder="Enter student email">
        </div>
        </div>

        <br><br>

        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student Number</label>
            <input type="text" class="form-control" value="<?php echo $rows['student_number']; ?>" name="student_number" placeholder="Enter Student number">
        </div>

        <div class="col-lg"></div>
        <br>
        <input type="submit" class="btn btn-primary" value="update student" name="update">
        </div>
    </form>

    <?php
    if(isset($_POST["update"])){
        $student_name = $_POST["student_name"];
        $student_email = $_POST["student_email"];
        $student_number = $_POST["student_number"];
        $query = "UPDATE `tbl_student` SET `student_name`='$student_name',`student_email`='$student_email',`student_number`='$student_number' WHERE student_name = '$name'";

        $result = mysqli_query($connection, $query);

        if($result){
            echo "record_updated";
            echo "<script>
             window.location.href = 'view-student.php'
            </script>";
        }
    }
    ?>
</div>
<?php include "footer.php" ?>