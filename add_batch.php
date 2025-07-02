<?php include "header.php"?>

<div class="container-fluid">
    <form method="post">
        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Batch Name</label>
            <input type="text" class="form-control" name="batch_name" placeholder="Enter Batch Name">
        </div>
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Batch Capacity</label>
            <input type="text" class="form-control" name="batch_capacity" placeholder="Enter Batch Capacity">
        </div>
        </div>

        <br><br>

        <div class="row">
        <div class="col-lg">
            <label for="exampleFormControlInput1" class="form-label">Batch Start Date</label>
            <input type="date" class="form-control" name="batch_start_date" placeholder="Enter Batch Start Date">
        </div>

        <div class="col-lg"></div>
        <br>
        <input type="submit" class="btn btn-primary" value="Add Batch" name="submit">
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

if(isset($_POST["submit"])){

    $batch_name = $_POST["batch_name"];
    $batch_capacity = $_POST["batch_capacity"];
    $batch_start_date = $_POST["batch_start_date"];

    $query = "INSERT INTO `tbl_batch`(`batch_name`,`batch_capacity`,`batch_start_date`) VALUES ('$batch_name',$batch_capacity,'$batch_start_date')";

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
