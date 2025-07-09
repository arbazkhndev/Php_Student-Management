<?php include_once "header.php"?>

<div class="container-fluid">
 <!-- page heading -->

 <h1 class="h3 mb-4 text-grey-800">View teacher</h1>

 <table class="table">
 <thead>
    <tr>
        <th scope="col">Teacher ID</th>
        <th scope="col">Teacher Name</th>
        <th scope="col">Teacher Email</th>
        <th scope="col">Teacher Batch</th>
        <th scope="col">Teacher Profile</th>
    </tr>
 </thead>
 <tbody>
    <?php
    $query = "SELECT tbl_teacher.teacher_id, teacher_name ,teacher_email, tbl_batch.batch_name ,tbl_teacher.teacher_img_path FROM `tbl_teacher` join tbl_batch on tbl_batch.batch_id = tbl_teacher.teacher_batch";
    $result = mysqli_query($connection,$query);

    if($result){
    while($rows = mysqli_fetch_assoc($result)){
        ?>

    <tr>
        <td><?php echo $rows["teacher_id"];?></td>
        <td><?php echo $rows["teacher_name"];?></td>
        <td><?php echo $rows["teacher_email"];?></td>
        <td><?php echo $rows["batch_name"];?></td>
        <td><img style="height:100px; width:150px"src="<?php echo $rows["teacher_img_path"];?>"/></td>
        <td><a href="delete_teacher.php?id=<?php echo $rows["teacher_id"];?>" class="btn btn-danger"> Delete</a> | 
        <a href="edit_teacher.php?id=<?php echo $rows["teacher_id"];?>" class="btn btn-primary"> Edit</a></td>
    </tr>
    <?php
    }
    }
    ?>
 </tbody>
 </table>

</div>

<?php include "footer.php" ?>