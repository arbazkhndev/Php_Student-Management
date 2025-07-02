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
        </div>

        <br><br>

        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Student Phone No.</label>
            <input type="text" class="form-control" name="student_number" placeholder="Enter Student Number">
        </div>
        <div class="col-lg">
        <label for="exampleFormControlInput1" class="form-label">Batch code</label>
           <select class="form-control" name="batch select" id="">
            <option class="form-control" value="">batch code 1</option>
            <option class="form-control" value="">batch code 2</option>
            <option class="form-control" value="">batch code 3</option>
           </select>
        </div>

        <div class="col-lg"></div>
        <br>
        <input type="submit" class="btn btn-primary" value="Add Batch" name="submit">
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

if(isset($_POST["submit"])){

    $student_name = $_POST["student_name"];
    $student_email = $_POST["student_email"];
    $student_number = $_POST["student_number"];

    $query = "INSERT INTO `tbl_student`(`student_name`,`student_email`,`student_number`) VALUES ('$student_name','$student_email',$student_number)";

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
mysqli_close($connection);
?>
</div>
<?php include "footer.php"?>
