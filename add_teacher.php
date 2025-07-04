<?php include "header.php"?>

<div class="container-fluid">

<!-- page heading -->
 <h1 class="h3 mb-4 text-grey-800">Add Teacher</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Teacher Name</label>
            <input type="text" class="form-control" name="teacher_name" placeholder="Enter Teacher Name">
        </div>
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Teacher Email</label>
            <input type="text" class="form-control" name="teacher_email" placeholder="Enter Teacher Email">
        </div>
        </div>

        <br><br>

        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Teacher teacher</label>
            <select class="form-control" name="teacher_teacher" placeholder="Enter Teacher teacher">
                <option value="">Select teacher</option>
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

        <div class="col-lg">
        <label for="exampleFormControlInput1" class="form-label">Teacher Password</label>
        <input type="text" class="form-control" name="teacher_password" placeholder="Enter Teacher Password">
        </div>

        <br>

        <div class="col-lg">
        <label for="exampleFormControlInput1" class="form-label">Teacher image</label>
        <input type="file" class="form-control" name="teacher_img" placeholder="Select Image">
        </div>
        </div>

        <br>

        <div class="row">
        <div class="col-lg"><input type="submit" class="btn btn-primary" value="Add Record" name="submit"></div>
        </div>

    </form>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

if(isset($_POST["submit"])){

    $teacher_name = $_POST["teacher_name"];
    $teacher_email = $_POST["teacher_email"];
    $teacher_password = $_POST["teacher_password"];
    $teacher_batch = $_POST["teacher_batch"];
    $teacher_image_name = $_FILES["teacher__img"]["name"];
    $teacher_image_tmp_name = $_FILES["teacher_img"]["tmp_name"];

    $path = "images/".$teacher_image_name;

    if(move_uploaded_file($teacher_image_tmp_name,$path)){
        $query = "INSERT INTO `tbl_teacher`(`teacher_name`,`teacher_email`,`teacher_password`,`teacher_batch`,`teacher_image_path`) VALUES ('$teacher_name',$teacher_email,'$teacher_password','$teacher_batch','$teacher_image_path')";

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
