<?php 
ob_start(); 
include('partial/menu.php'); 
?>

<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Update Fruit</h1></div>

                <?php
                if(isset($_GET['id']))
                {
                    $id= $_GET['id'];
                    $sql2 = "SELECT * FROM tbl_fruit WHERE id=$id";
                    $res2 = mysqli_query($conn,$sql2);

                    $rows = mysqli_fetch_assoc($res2);

                    $title = $rows['title'];
                    $description = $rows['description'];
                    $price = $rows['price'];
                    $current_image = $rows['image_name'];
                    $current_catagory = $rows['catagory_id'];
                    $feartured = $rows['feartured'];
                    $active = $rows['active'];


                }
                else
                {
                    header("location:".SITEURL.'admin/manage-fruit.php');
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
                                <label for="fullname" class="form-label">Description</label><br>
                                <textarea name="description" cols="77" rows="5"><?php echo $description; ?></textarea>
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Price</label>
                                <input type="number"  name="price" value="<?php echo $price; ?>" class="form-control" id="title" aria-describedby="title" >
                               
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Current Image</label>
                                <div>
                                <?php 
                                        if($current_image != "")
                                        {
                                            ?>
                                                <img src = "<?php echo SITEURL; ?>images/fruit/<?php echo $current_image ?>" width="150px">
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
                                <label for="image" class="form-label">Select New Image</label>
                                <input type="file"  name="image"  class="form-control" id="image" aria-describedby="image">
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Category</label><br>
                                <select class="form-select" name="catagory"  aria-label="Default select example">

                                    <?php
                                        $sql = "SELECT * FROM tbl_catagory WHERE active ='Yes'";

                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        if($count>0)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                $catagory_title=$row['title'];
                                                $catagory_id=$row['id'];
                                                
                                                
                                                
                                                //echo "<option value='$catagory_id'>$catagory_title</option>";
                                                ?>
                                                <option <?php if($current_catagory==$catagory_id){echo "selected";} ?> value="<?php echo $catagory_id; ?>"><?php echo $catagory_title; ?></option>
                                                <?php
                                                
                                            }

                                        }
                                        else
                                        {
                                            echo "<option value='0'>Category Not Available</option>";
                                        }


                                    ?>


                                </select>
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
                                
                                <input type="hidden"  name="id" value="<?php echo $id; ?>">
                                <input type="hidden"  name="current_image" value="<?php echo $current_image; ?>">
                               
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Update Fruit</button>
                            </form>

                            <?php 
                        
                                if(isset($_POST['submit']))
                                {
                                    //echo "click";
                                    $id = $_POST['id'];
                                    $title = $_POST['title'];
                                    $description = $_POST['description'];
                                    $price = $_POST['price'];
                                    $current_image = $_POST['current_image'];
                                    $catagory = $_POST['catagory'];
                                    $feartured = $_POST['feartured'];
                                    $active = $_POST['active'];

                                    if(isset($_FILES['image']['name']))
                                    {
                                        $image_name = $_FILES['image']['name'];

                                        if($image_name!="")
                                        {
                                            $ext = end(explode('.', $image_name));

                                            $image_name = "Fruit-Name-".rand(000, 999).'.'.$ext;

                                            $src= $_FILES['image']['tmp_name'];
                                            $dst="../images/fruit/".$image_name;
                                            $upload= move_uploaded_file($src,$dst);

                                            if($upload==false)
                                            {
                                                $_SESSION['upload'] = "Failed to Upload Image";
                                                header('location:'.SITEURL.'admin/manage-fruit.php');
                                                ob_end_flush();
                                                die();

                                            }

                                            if($current_image!="")
                                            {
                                                $remove_path = "../images/fruit/".$current_image;

                                                $remove = unlink($remove_path);

                                                if($remove==false)
                                                {
                                                    $_SESSION['failed-remove'] = "failed to Remove Current Image";
                                                    header('location:'.SITEURL.'admin/manage-fruit.php');
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

                                    $sql3= "UPDATE tbl_fruit SET
                                    title = '$title',
                                    description = '$description',
                                    price= $price,
                                    image_name = '$image_name',
                                    catagory_id = '$catagory',
                                    feartured = '$feartured',
                                    active = '$active'
                                    
                                    WHERE id ='$id'
                                    ";

                                    $res3 = mysqli_query($conn,$sql3);

                                    if($res3==TRUE)
                                    {
                                        $_SESSION['update'] = "Fruit Updated Successfully";
                                        header("location:".SITEURL.'admin/manage-fruit.php');
                                        ob_end_flush();

                                    }
                                    else
                                    {
                                        $_SESSION['update'] = "Failed to Update";
                                        header("location:".SITEURL.'admin/manage-fruit.php');
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