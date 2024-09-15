<?php include('partial/menu.php'); ?>

<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Change Password</h1></div>

            <?php 
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                }
            
            ?>




                <div class="col-md-7">
                    <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Current Password</label>
                                <input type="password"  name="current_password"  class="form-control" id="current_password" aria-describedby="full_name">
                               
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">New Password</label>
                                <input type="password"  name="new_password"  class="form-control" id="new_password" aria-describedby="username">
                               
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                            </div>
                            <div class="mb-3">
                                
                                <input type="hidden"  name="id" value="<?php echo $id; ?>" class="form-control" id="username" aria-describedby="username">
                               
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning">Change Password</button>
                        </form>
                </div>
      </div> 
   </div>
</section>

<?php 
        //btn click check
        if(isset($_POST['submit']))
        {
           // echo "click";
           $id = $_POST['id'];
           $current_password = md5($_POST['current_password']);
           $new_password = md5($_POST['new_password']);
           $confirm_password = md5($_POST['confirm_password']);


           $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password = '$current_password'";

           $res = mysqli_query($conn,$sql);
           if($res==TRUE)
           {
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //echo "User Found";
                //new pswrd match or ot with the confirm
                if($new_password==$confirm_password)
                {
                    //update pass
                    $sql2 = "UPDATE tbl_admin SET
                    password='$new_password'
                    WHERE id =$id

                    ";

                    $res2 = mysqli_query($conn,$sql2); 

                    if($res2==TRUE)
                    {
                        $_SESSION['change-pwd'] = "Password changed Successfully";
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        $_SESSION['change-pwd'] = "Password Do Not Update";
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //error msg on manage add page
                    $_SESSION['pwd-not-match'] = "Password Do Not Match";
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            }
            else
            {
                $_SESSION['user-not-found'] = "User Not Found";
                header("location:".SITEURL.'admin/manage-admin.php');
            }


           }
        }

?>



<?php include('partial/end.php'); ?> 