<?php include_once "header.php"?>

<div class="container-fluid">
 <!-- page heading -->

 <h1 class="h3 mb-4 text-grey-800">View Batches</h1>

 <table class="table">
 <thead>
    <tr>
        <th scope="col">Batch ID</th>
        <th scope="col">Batch Name</th>
        <th scope="col">Capacity</th>
        <th scope="col">Start Date</th>
        <th scope="col">Action</th>
    </tr>
 </thead>
 <tbody>
    <?php
    $query = "SELECT * FROM `tbl_batch`";
    $result = mysqli_query($connection,$query);
    // var_dump($result)

    while($rows = mysqli_fetch_assoc($result)){
        ?>

    <tr>
        <td><?php echo $rows["batch_id"];?></td>
        <td><?php echo $rows["batch_name"];?></td>
        <td><?php echo $rows["batch_capacity"];?></td>
        <td><?php echo $rows["batch_start_date"];?></td>
        <td><a href="delete_batch.php?id=<?php echo $rows["batch_id"];?>" class="btn btn-danger"> Delete</a> | 
        <a href="edit_batch.php?id=<?php echo $rows["batch_id"];?>" class="btn btn-primary"> Edit</a></td>
    </tr>
    <?php
    }
    ?>
 </tbody>
 </table>

</div>

<?php include "footer.php" ?>