<?php include('partial/menu.php'); ?>

<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Update Admin</h1></div>

            <?php

                $id= $_GET['id'];
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                $res = mysqli_query($conn,$sql);

                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        //echo "Admin Available";
                        $rows=mysqli_fetch_assoc($res);

                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                    }
                    else
                    {
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                }

            ?>
                <div class="col-md-7">
                    <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="fullname" class="form-label">full name</label>
                                <input type="text"  name="full_name" value="<?php echo $full_name; ?>" class="form-control" id="fullname" aria-describedby="full_name">
                               
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">username</label>
                                <input type="text"  name="username" value="<?php echo $username; ?>" class="form-control" id="username" aria-describedby="username">
                               
                            </div>
                            <div class="mb-3">
                                
                                <input type="hidden"  name="id" value="<?php echo $id; ?>" class="form-control" id="username" aria-describedby="username">
                               
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-success">Update Admin</button>
                        </form>
                </div>
      </div> 
   </div>
</section> 
<?php

if(isset($_POST['submit']))
{
    //echo "clicked";
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql= "UPDATE tbl_admin SET
    full_name='$full_name',
    username='$username'
    WHERE id ='$id'
    ";

    $res = mysqli_query($conn,$sql); 
    if($res==TRUE)
    {
        $_SESSION['update'] = "Admin Updated Successfully";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update'] = "Admin Failed to Update";
        header("location:".SITEURL.'admin/manage-admin.php');
    }   
}

?>

<?php include('partial/end.php'); ?> 