<?php include('partial/menu.php'); ?>

<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Add Category</h1></div>

        <?php

                if(isset($_SESSION['add']))
                {
                ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['add']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['upload']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['upload']);
                }       
        ?>


                <div class="col-md-7">
                    <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Title</label>
                                <input type="text"  name="title"  class="form-control" id="title" aria-describedby="title" required>
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Select Image</label>
                                <input type="file"  name="image"  class="form-control" id="image" aria-describedby="image">
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Feartured : </label>
                                <input type="radio"  name="feartured"  value="Yes"> Yes
                                <input type="radio"  name="feartured"  value="No"> No
                               
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Active : </label>
                                <input type="radio"  name="active"  value="Yes"> Yes
                                <input type="radio"  name="active"  value="No"> No
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                        </form>
                </div>
      </div> 
   </div>
</section> 

<?php include('partial/end.php'); ?> 

<?php 
    if (isset($_POST['submit']))
        {
            $title = $_POST['title'];

            if (isset($_POST['feartured']))
                {
                    $feartured = $_POST['feartured'];
                }
            else
                {
                    $feartured = "No";
                }

            if (isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
            else
                {
                    $active = "No";
                }

                //print_r($_FILES['image']);

                //die();

            if(isset($_FILES['image']['name']))
            {
                //upload img
                //we need img name and source path and destination path
                $image_name = $_FILES['image']['name'];

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/category/.$image_name";

                $upload = move_uploaded_file($source_path, $destination_path);

                if($upload==false)
                {
                    $_SESSION['upload'] = "Failed to Upload Image";
                    header('location:'.SITEURL.'admin/add-category.php');
                    die();

                }
            }
            else
            {
                //dont upload
                $image_name="";
            }

            $sql= "INSERT INTO tbl_catagory SET
                title='$title',
                image_name='$image_name',
                feartured='$feartured',
                active='$active'
                ";
            
            $res = mysqli_query($conn,$sql);

            if($res==TRUE)
            {
                //crate session variable to display msg
                $_SESSION['add'] = "Category Added Successfully";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                $_SESSION['add'] = "Failed to Add Category";
                header('location:'.SITEURL.'admin/add-category.php');
            }

        }
?>







