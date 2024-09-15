<?php include('partial/menu.php');
ob_start();
?>

<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Add category</h1></div>
       

                <div class="col-md-7">
                <?php
          if(isset($_SESSION['add']))
          {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> <?php echo $_SESSION['add']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['add']);
          }
          if(isset($_SESSION['upload']))
          {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> <?php echo $_SESSION['upload']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['upload']);
          }

          ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Title</label>
                                <input type="text"  name="title"  class="form-control" id="title" aria-describedby="title" >
                               
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input type="file"  name="image"  class="form-control" id="image" aria-describedby="image">
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Featured : </label>
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

                        <?php
                            if (isset($_POST['submit']))
                                {
                                    //echo "click";
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

                                        if($image_name != "")
                                        {
                                            
                                       

                                                $ext = end(explode('.', $image_name));

                                                $image_name = "Fruit_Category_".rand(000, 999).'.'.$ext;

                                                

                                                $source_path = $_FILES['image']['tmp_name'];

                                                $destination_path = "../images/category/".$image_name;

                                                $upload = move_uploaded_file($source_path, $destination_path);

                                                if($upload==false)
                                                {
                                                    $_SESSION['upload'] = "Failed to Upload Image";
                                                    header('location:'.SITEURL.'admin/add-category.php');
                                                    ob_end_flush();
                                                    die();

                                                }
                                        }   
                                    }
                                    else
                                    {
                                        $image_name="";
                                    }


                                    $sql= "INSERT INTO tbl_catagory SET
                                        title='$title',
                                        image_name='$image_name',
                                        feartured='$feartured',
                                        active='$active'

                                    ";
                                    $res = mysqli_query($conn, $sql);

                                    if($res==TRUE)
                                    {
                                        $_SESSION['add'] = "Category added successfuly";
                                        header('location:'.SITEURL.'admin/manage-category.php');
                                    }
                                    else
                                    {
                                        $_SESSION['add'] = "Category Failed to add";
                                        header('location:'.SITEURL.'admin/add-category.php');
                                    }
                                    ob_end_flush();
                                }
                                   
                        ?>

                </div>
               
                
      </div> 
   </div>
   
</section>



<?php include('partial/end.php'); ?> 