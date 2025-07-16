<?php include "header.php"?>

<div class="container-fluid">
    <form method="post">
        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student Name</label>
            <input type="text" class="form-control" name="student_name" placeholder="Enter Student Name">
        </div>
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student Email</label>
            <input type="text" class="form-control" name="student_email" placeholder="Enter Student Email">
        </div>

        <div class="col-lg">
        <label for="exampleFormControlInput1" class="form-label">Student Password</label>
        <input type="text" class="form-control" name="student_password" placeholder="Enter Student Password">
        </div>

        </div>

        <br><br>

        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student Phone No.</label>
            <input type="text" class="form-control" name="student_number" placeholder="Enter Student Number">
        </div>
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student Batch</label>
            <select class="form-control" name="student_batch" placeholder="select batch">
                <option value="">Select batch</option>
            <?php
            $query = "SELECT *FROM `tbl_batch`";
            $result = mysqli_query($connection,$query);
            if($result){
                while($rows = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $rows["batch_id"];?>"> <?php echo $rows["batch_name"];?> </option>
                    <?php
                }
            }
            ?>
            </select>
        </div>

        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Teacher Batch</label>
            <select class="form-control" name="student_teacher" placeholder="Select Teacher Batch">
                <option value="">Teacher batch</option>
            <?php
            $query = "SELECT *FROM `tbl_teacher`";
            $result = mysqli_query($connection,$query);
            if($result){
                while($rows = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $rows["teacher_id"];?>"> <?php echo $rows["teacher_name"];?> </option>
                    <?php
                }
            }
            ?>
            </select>
        </div>
        </div>

        <br>

        <div class="row">
        <div class="col-lg">
        <label for="exampleFormControlInput1" class="form-label">student image</label>
        <input type="file" class="form-control" name="student_img" placeholder="Select Image">
        </div>
        
            
        <div class="col-lg"><input type="submit" class="btn btn-primary" value="Add Record" name="submit"></div>
        </div>  
    
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

if(isset($_POST["submit"])){

    $student_name = $_POST["student_name"];
    $student_email = $_POST["student_email"];
    $student_number = $_POST["student_number"];
    $student_password = $_POST["student_password"];
    $student_batch = $_POST["student_batch"];
    $student_teacher = $_POST["student_teacher"];
    $student_image_name = $_FILES["student_img"]["name"];
    $student_image_tmp_name = $_FILES["student_img"]["tmp_name"];

    $path = "images/".$student_image_name;

    if(move_uploaded_file($student_image_tmp_name,$path)){
        $query = "INSERT INTO `tbl_student`(`student_name`,`student_email`,`student_number`,`student_password`,`student_batch`,`student_teacher`,`student_img_path`) VALUES ('$student_name','$student_email','$student_number','$student_password','$student_batch','$student_teacher','$path')";

    $result = mysqli_query($connection,$query);

    if($result == true){
        echo '<script>
       Swal.fire({
        title: "Successfully ADDED",
        width: 600,
        padding: "3em",
        color: "#716add",
        background: "#fff url(/images/trees.png)",
        backdrop: `
            rgba(0,0,123,0.4)
            url("/images/nyan-cat.gif")
            left top
        no-repeat
                 `
                });
        </script>';
    }
}
}
mysqli_close($connection);
?>
</div>
<?php include "footer.php"?>
