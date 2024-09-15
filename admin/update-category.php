<?php 
ob_start(); 
include('partial/menu.php'); 
?>


<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Update Category</h1></div>

            <?php
            if(isset($_GET['id']))
            {
                //echo "getting data";
                $id= $_GET['id'];
                $sql = "SELECT * FROM tbl_catagory WHERE id=$id";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $rows=mysqli_fetch_assoc($res);
                    $title = $rows['title'];
                    $current_image = $rows['image_name'];
                    $feartured = $rows['feartured'];
                    $active = $rows['active'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "Category Not Found";
                    header("location:".SITEURL.'admin/manage-category.php');
                    ob_end_flush(); // End output buffering and flush output
                    exit();
                }

            }
            else
            {
                header("location:".SITEURL.'admin/manage-category.php');
                ob_end_flush(); // End output buffering and flush output
                exit();
            }
           
            
            ?>
       

                <div class="col-md-7">
                <form action="" method="POST" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Title</label>
                                <input type="text"  name="title" value="<?php echo $title; ?>" class="form-control" id="title" aria-describedby="title" >
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Current Image</label>
                                <div>
                                    <?php 
                                        if($current_image != "")
                                        {
                                            ?>
                                                <img src = "<?php echo SITEURL; ?>images/category/<?php echo $current_image ?>" width="150px">
                                            <?php
                                        }
                                        else
                                        {
                                            echo "<div class= 'text-danger'>Image Not Added</div>";
                                        }
                                    ?>
                                </div>
                               
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
                                <input type="file"  name="image"  class="form-control" id="image" aria-describedby="image">
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Featured : </label>
                                <input <?php if($feartured=="Yes"){echo "checked";} ?> type="radio"  name="feartured"  value="Yes"> Yes
                                <input <?php if($feartured=="No"){echo "checked";} ?> type="radio"  name="feartured"  value="No"> No
                               
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Active : </label>
                                <input <?php if($active=="Yes"){echo "checked";} ?> type="radio"  name="active"  value="Yes"> Yes
                                <input <?php if($active=="No"){echo "checked";} ?> type="radio"  name="active"  value="No"> No
                            </div>

                            <div class="mb-3">
                                
                                <input type="hidden"  name="current_image" value="<?php echo $current_image; ?>">
                                <input type="hidden"  name="id" value="<?php echo $id; ?>">
                               
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Update Category</button>
                        </form>

                        <?php 
                        
                        if(isset($_POST['submit']))
                        {
                            //echo "click";
                            $id = $_POST['id'];
                            $title = $_POST['title'];
                            $current_image = $_POST['current_image'];
                            $feartured = $_POST['feartured'];
                            $active = $_POST['active'];

                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];

                                if($image_name!="")
                                {
                                    $ext = end(explode('.', $image_name));

                                    $image_name = "Fruit_Category_".rand(000, 999).'.'.$ext;

                                    

                                    $source_path = $_FILES['image']['tmp_name'];

                                    $destination_path = "../images/category/".$image_name;

                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if($upload==false)
                                    {
                                        $_SESSION['upload'] = "Failed to Upload Image";
                                        header('location:'.SITEURL.'admin/manage-category.php');
                                        ob_end_flush();
                                        die();

                                    }
                                    if($current_image!="")
                                    {
                                        $remove_path = "../images/category/".$current_image;

                                        $remove = unlink($remove_path);
                                        if($remove==false)
                                        {
                                            $_SESSION['failed-remove'] = "failed to Remove Current Image";
                                            header('location:'.SITEURL.'admin/manage-category.php');
                                            ob_end_flush();
                                            die();

                                        }
                                    }
                                    
                                }
                                else
                                {
                                    $image_name = $current_image;
                                }
                            }
                            else
                            {
                                $image_name = $current_image;
                            }

                            $sql2= "UPDATE tbl_catagory SET
                            title = '$title',
                            image_name = '$image_name',
                            feartured = '$feartured',
                            active = '$active'

                            WHERE id ='$id'
                            ";

                            $res2 = mysqli_query($conn,$sql2);

                            if($res2==TRUE)
                            {
                                $_SESSION['update'] = "Category Updated Successfully";
                                header("location:".SITEURL.'admin/manage-category.php');
                                ob_end_flush();
                            }
                            else
                            {
                                $_SESSION['update'] = "Failed to Update";
                                header("location:".SITEURL.'admin/manage-category.php');
                                ob_end_flush(); 
                            }

                            
                        }
                        
                        ?>

                    </div>
               
                
               </div> 
            </div>
            
         </section>


<?php 
include('partial/end.php');
ob_end_flush(); 
?> 