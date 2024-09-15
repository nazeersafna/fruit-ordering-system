<?php include('partial/menu.php'); ?>

  <section class= "main">
    <div class= "container">
       <div class= "row py-5">
        <div class="pb-2"><h1>Manage Fruits</h1></div>

        <?php
          if(isset($_SESSION['add']))
          {
            ?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>hey!</strong> <?php echo $_SESSION['add']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['add']);
          }

          if(isset($_SESSION['delete']))
          {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>hey!</strong> <?php echo $_SESSION['delete']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['delete']);
          }

          if(isset($_SESSION['remove']))
          {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>hey!</strong> <?php echo $_SESSION['remove']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['remove']);
          }

          if(isset($_SESSION['unauthorized']))
          {
            ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>hey!</strong> <?php echo $_SESSION['unauthorized']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['unauthorized']);
          }

          if(isset($_SESSION['upload']))
          {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>hey!</strong> <?php echo $_SESSION['upload']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['upload']);
          }

          if(isset($_SESSION['failed-remove']))
          {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Oops!</strong> <?php echo $_SESSION['failed-remove']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['failed-remove']);
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
        ?>
        <div>
        <a href="<?php echo SITEURL; ?>admin/add-fruit.php" <button type="button" class="btn btn-primary"> Add Fruit</button></a>
        </div> <br> <br> 
          <table class="table">
           <thead>
              <tr>
                <th scope="col">S.N</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Featured</th>
                <th scope="col">Active</th>
                <th scope="col">Actions</th>
              </tr>
             </thead>
             <?php
             $sql = "SELECT * FROM tbl_fruit";
             $res = mysqli_query($conn,$sql);

             $count = mysqli_num_rows($res);

             $sn=1;
             if($count>0)
             {
              while($rows=mysqli_fetch_assoc($res))
              {
                $id=$rows['id'];
                $title=$rows['title'];
                $price=$rows['price'];
                $image_name=$rows['image_name'];
                $feartured=$rows['feartured'];
                $active=$rows['active'];

                ?>
                  <tbody>
                    <tr>
                      <th scope="row"><?php echo $sn++; ?>.</th>
                      <td><?php echo $title; ?></td>
                      <td><?php echo $price; ?></td>
                      <td>

                          <?php

                          if($image_name!="")
                          {
                            ?>

                            <img src="<?php echo SITEURL; ?>images/fruit/<?php echo $image_name; ?>"width="100px">

                            <?php
                          }
                          else
                          {
                            echo "<div class= 'text-danger'>Not Added Image</div>";
                          }
                          ?>

                        </td>
                        <td><?php echo $feartured; ?></td>
                        <td><?php echo $active; ?></td>
                      <td>
                      <a href="<?php echo SITEURL; ?>admin/update-fruit.php?id=<?php echo $id; ?>"<button type="button" class="btn btn-success">Update Fruit</button></a>
                      <a href="<?php echo SITEURL; ?>admin/delete-fruit.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>"<button type="button" class="btn btn-danger">Delete Fruit</button></a>
                        </td>
                    </tr>

                 
                  </tbody>

                <?php

              }
             }
             else
             {
              //fruit not add
              echo  "<tr> <td colspan='7'> No Fruit Added</td> </tr>";
             }

             ?>

            </table>
         

      </div> 
   </div>
  </section> 

<?php include('partial/end.php'); ?> 