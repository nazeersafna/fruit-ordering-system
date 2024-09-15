<?php include('../config/constant.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<section class= "main">

    <div class= "container">
    
       <div class= "row py-5 justify-content-center">

       
     
                <div class="col-md-7 ">
                
                    <form action="" method="POST" class = "border border-secondary py-3 px-3">

                        <h1 class = "text-center">Welcome to login</h1>
                        <?php
                                if(isset($_SESSION['login']))
                                {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oops!</strong> <?php echo $_SESSION['login']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    unset($_SESSION['login']);
                                }

                                if(isset($_SESSION['no-login-message']))
                                {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Oops!</strong> <?php echo $_SESSION['no-login-message']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    unset($_SESSION['no-login-message']);
                                }
                        ?>
                           
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Username</label>
                                <input type="text"  name="username"  class="form-control" id="username" aria-describedby="username"placeholder="Enter your Username" required>
                               
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your Password" required>
                            </div>
                            
                            <center><button type="submit" name="submit" value ="login" class="btn btn-primary px-5">Login</button></center>
                        
                        </form>
                       
                        
                </div>
                
      </div> 
      
   </div>
  
</section> 

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

<?php 

if(isset($_POST['submit']))
        {
            //$username = $_POST['username'];
            //$password = md5($_POST['password']);

            $username = mysqli_real_escape_string($conn, $_POST['username']);

            $raw_password = md5($_POST['password']);
            $password = mysqli_real_escape_string($conn, $raw_password);

            $sql= "SELECT * FROM tbl_admin WHERE username ='$username' AND password='$password'";

            $res = mysqli_query($conn, $sql);
            
            $count = mysqli_num_rows($res);
    
                if($count==1)
                    {
                        $_SESSION['login'] = "Login Successfuly.";

                        $_SESSION['user'] = $username; // user log or log out

                        header("location:".SITEURL.'admin/');
                    }
                else
                    {
                        $_SESSION['login'] = "Login Failed. User Name or Password did not Match.";
                        header("location:".SITEURL.'admin/login.php');
                    }
    

        }

?>
