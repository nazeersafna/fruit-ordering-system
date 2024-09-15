<?php include('partial/menu.php'); ?>


  <section class= "main">
    <div class= "container">
       <div class= "row py-5">
       
      
        <div class><h1>welcome to dash board</h1><br><br></div>
        
        <?php
          if(isset($_SESSION['login']))
          {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['login']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php
            unset($_SESSION['login']);
          }
          ?>
   
          
         <div class= "col-md-3">
          <div class="card" style="width: 15rem;">
             <div class="card-body text-center">
             <?php
                $sql = "SELECT * FROM tbl_catagory";
                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

              ?>
                 <h5 class="card-title"><?php echo $count; ?></h5>
                   <p class="card-text">Catagories</p>
             </div>
          </div>
        </div>

        <div class= "col-md-3">
          <div class="card" style="width: 15rem;">
             <div class="card-body text-center">
             <?php
                $sql2 = "SELECT * FROM tbl_fruit";
                $res2 = mysqli_query($conn,$sql2);

                $count2 = mysqli_num_rows($res2);

              ?>
                 <h5 class="card-title"><?php echo $count2; ?></h5>
                   <p class="card-text">Fruits</p>
             </div>
          </div>
        </div>

        <div class= "col-md-3">
          <div class="card" style="width: 15rem;">
             <div class="card-body text-center">
             <?php
                $sql3 = "SELECT * FROM tbbl_order";
                $res3 = mysqli_query($conn,$sql3);

                $count3 = mysqli_num_rows($res3);

              ?>
                 <h5 class="card-title"><?php echo $count3; ?></h5>
                   <p class="card-text">Total Orders</p>
             </div>
          </div>
        </div>

        <div class= "col-md-3">
          <div class="card" style="width: 15rem;">
             <div class="card-body text-center">

             <?php
                $sql4 = "SELECT SUM(total) AS Total From tbbl_order WHERE status='Deliverd'";
                $res4 = mysqli_query($conn,$sql4);

                $row4=mysqli_fetch_assoc($res4);

                $total_revenue = $row4['Total'];

              ?>
             <h5 class="card-title"><?php echo $total_revenue; ?></h5>
                   <p class="card-text">Revenue Generated</p>
             </div>
          </div>
        </div>

      </div> 
   </div>
  </section> 

 
  <?php include('partial/end.php'); ?> 