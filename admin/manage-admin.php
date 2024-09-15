<?php include('partial/menu.php'); ?>

  <section class= "main">
    <div class= "container">
       <div class= "row py-5">
        <div class="pb-2"><h1>Manage Admin</h1></div>
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
          if(isset($_SESSION['delete']))
          {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['delete']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['delete']);
          }
          if(isset($_SESSION['update']))
          {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['update']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['update']);
          }
          if(isset($_SESSION['user-not-found']))
          {
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['user-not-found']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['user-not-found']);
          }
          if(isset($_SESSION['pwd-not-match']))
          {
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['pwd-not-match']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['pwd-not-match']);
          }

          if(isset($_SESSION['change-pwd']))
          {
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['change-pwd']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['change-pwd']);
          }



        ?>
        <div>
        <a href="add-admin.php"><button type="button" class="btn btn-primary">Add Admin</button></a>
        </div> <br><br> 
          <table class="table">
           <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">full_name</th>
                <th scope="col">username</th>
                <th scope="col">Actions</th>
              </tr>
             </thead>

             <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn,$sql);
                    if($res==TRUE)
                    {
                      $count = mysqli_num_rows($res);

                      $sn=1;

                      if($count>0)
                      {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                          $id=$rows['id'];
                          $full_name=$rows['full_name'];
                          $username=$rows['username'];

                          ?>
                             <tbody>
                                  <tr>
                                    <th scope="row"><?php echo $sn++; ?>.</th>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                      <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"<button type="button" class="btn btn-warning">Change Password</button></a>
                                      <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"<button type="button" class="btn btn-success">Update Admin</button></a>
                                      <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"<button type="button" class="btn btn-danger">Delete Admin</button></a>
                                    </td>
                                  </tr>
                             </tbody>
                          <?php
                        }
                      }
                      else
                      {

                      }
                    }

             ?>
        
            </table>
      </div> 
   </div>
  </section> 

<?php include('partial/end.php'); ?> 