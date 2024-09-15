<?php include('partial/menu.php');
ob_start(); 

?>

<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Add Fruit</h1></div>
       

                <div class="col-md-7">

                    <?php 
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
                                <label for="fullname" class="form-label">Description</label><br>
                                <textarea name="description" cols="77" rows="5"></textarea>
                               
                            </div>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Price</label>
                                <input type="number"  name="price"  class="form-control" id="title" aria-describedby="title" >
                               
                            </div>


                            <div class="mb-3">
                                <label for="image" class="form-label">Select Image</label>
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
                                        $id=$row['id'];
                                        $title=$row['title'];
                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }

                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }

                                ?>
                                
                                </select>  
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
                            
                            <button type="submit" name="submit" class="btn btn-primary">Add Fruit</button>
                        </form>

                        <?php 
                        if(isset($_POST['submit']))
                        {
                            //echo "click";
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $catagory = $_POST['catagory'];

                            if(isset($_POST['feartured']))
                            {
                                $feartured = $_POST['feartured'];
                            }
                            else
                            {
                                $feartured = "No";
                            }

                            if(isset($_POST['active']))
                            {
                                $active = $_POST['active'];
                            }
                            else
                            {
                                $active = "No";
                            }

                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];

                                if($image_name!= "")
                                {
                                    $ext = end(explode('.', $image_name));

                                    //create new name for img
                                    $image_name = "Fruit-Name-".rand(0000,9999).".".$ext;

                                    $src= $_FILES['image']['tmp_name'];
                                    $dst="../images/fruit/".$image_name;
                                    $upload= move_uploaded_file($src,$dst);

                                    if($upload==false)
                                    {
                                        $_SESSION['upload'] = "Failed to Upload the Image";
                                        header('location:'.SITEURL.'admin/add-fruit.php');
                                        ob_end_flush();
                                        die();
                                    }
                                }

                            }
                            else
                            {
                                $image_name = "";
                            }

                            $sql2 = "INSERT INTO tbl_fruit SET
                            title = '$title',
                            description = '$description',
                            price = $price,
                            image_name = '$image_name',
                            catagory_id = '$catagory',
                            feartured = '$feartured',
                            active = '$active'

                            ";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==TRUE)
                            {
                                $_SESSION['add'] = "Fruit Added SUccessfully";
                                header('location:'.SITEURL.'admin/manage-fruit.php');

                            }
                            else
                            {
                                $_SESSION['add'] = "Fruit Fail to Add";
                                header('location:'.SITEURL.'admin/manage-fruit.php');
                                ob_end_flush();

                            }
                        }
                        
                        ?>

                        
                </div>
               
                
               </div> 
            </div>
            
         </section>

<?php include('partial/end.php'); ?> 