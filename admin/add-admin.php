<?php include('partial/menu.php'); ?>

<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Add Admin</h1></div>

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
          ?>

                <div class="col-md-7">
                    <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="fullname" class="form-label">full name</label>
                                <input type="text"  name="full_name"  class="form-control" id="fullname" aria-describedby="full_name" required>
                               
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">username</label>
                                <input type="text"  name="username"  class="form-control" id="username" aria-describedby="username" required>
                               
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
                    </form>
                </div>
      </div> 
   </div>
</section> 

<?php
    if(isset($_POST['submit']))
    {
        //echo "Button clicked";
        //get data from form

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //paswrd encrypt with md5

        //insert data to database

        $sql= "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
      
        //save data to db
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        if($res==TRUE)
        {
            //crate session variable to display msg
            $_SESSION['add'] = "Admin Added Successfully";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['add'] = "Failed to Add Admin";
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
    
   
?>

<?php include('partial/end.php'); ?> 

