<form method="post" enctype="multipart/form-data">

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
    print_r($_FILES["student_img"]);
}
?>
</div>
<?php include "footer.php"?>
