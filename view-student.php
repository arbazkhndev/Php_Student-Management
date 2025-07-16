<?php include_once "header.php"?>

<div class="container-fluname">
 <!-- page heading -->

 <h1 class="h3 mb-4 text-grey-800">View Student</h1>

 <table class="table">
 <thead>
    <tr>
        <th scope="col">Student Name</th>
        <th scope="col">Student Email</th>
        <th scope="col">Student Number</th>
        <th scope="col">Student Batch</th>
        <th scope="col">Student Profile</th>
        <th scope="col">Action</th>
    </tr>
 </thead>
 <tbody>
 <?php
    $query = "SELECT * FROM `tbl_student`";
    $result = mysqli_query($connection,$query);


    if($result){
    while($rows = mysqli_fetch_assoc($result)){
        ?>

    <tr>
        <td><?php echo $rows["student_name"];?></td>
        <td><?php echo $rows["student_email"];?></td>
        <td><?php echo $rows["student_number"];?></td>
        <td><img style="height:100px; wnameth:150px"src="<?php echo $rows["student_img_path"];?>"/></td>
        <td><a href="delete_student.php?name=<?php echo $rows["student_name"];?>" class="btn btn-danger"> Delete</a> | 
        <a href="edit_student.php?name=<?php echo $rows["student_name"];?>" class="btn btn-primary"> Edit</a></td>
    </tr>
    <?php
    }
    }
    ?>
 </tbody>
 </table>

</div>

<?php include "footer.php" ?>