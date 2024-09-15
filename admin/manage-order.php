<?php include('partial/menu.php'); ?>

  <section class= "main">
    <div class= "container">
       <div class= "row py-5">
        <div class="pb-2"><h1>Manage Orders</h1></div>

        <?php
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
         
          <table class="table">
           <thead>
              <tr>
                <th scope="col">S.N</th>
                <th scope="col">Fruit</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Total</th>
                <th scope="col">Order Date</th>
                <th scope="col">Status</th>
                <th scope="col">Customer name</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Actions</th>
              </tr>
             </thead>

             <?php
              $sql = "SELECT * FROM tbbl_order ORDER BY id DESC"; //display new order
              $res = mysqli_query($conn,$sql);

              $count = mysqli_num_rows($res);

              $sn=1;

              if($count>0)
              {
                while($row=mysqli_fetch_assoc($res))
                {
                  $id=$row['id'];
                  $fruit=$row['fruit'];
                  $price=$row['price'];
                  $qty=$row['qty'];
                  $total=$row['total'];
                  $order_date=$row['order_date'];
                  $status=$row['status'];
                  $customer_name=$row['customer_name'];
                  $customer_contact=$row['customer_contact'];
                  $customer_email=$row['customer_email'];
                  $customer_address=$row['customer_address'];

                  ?>

                    <tbody>
                    <tr>
                      <th scope="row"><?php echo $sn++; ?>.</th>
                      <td><?php echo $fruit; ?></td>
                      <td><?php echo $price; ?></td>
                      <td><?php echo $qty; ?></td>
                      <td><?php echo $total; ?></td>
                      <td><?php echo $order_date; ?></td>

                      <td>
                        <?php
                        if($status=="Orderd")
                        {
                          echo "<label class= 'text-primary'>$status</label>";
                        }
                        else if($status=="On Delivery")
                        {
                          echo "<label class= 'text-warning'>$status</label>";
                        }
                        else if($status=="Deliverd")
                        {
                          echo "<label class= 'text-success'>$status</label>";
                        }
                        else if($status=="Cancelled")
                        {
                          echo "<label class= 'text-danger'>$status</label>";
                        }
                        ?>
                      </td>


                      <td><?php echo $customer_name; ?></td>
                      <td><?php echo $customer_contact; ?></td>
                      <td><?php echo $customer_email; ?></td>
                      <td><?php echo $customer_address; ?></td>
                      
                      <td>
                      <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>"<button type="button" class="btn btn-success">Update</button></a>
                        
                      </td>
                    </tr>

                  
                    
                    </tbody>

                  <?php
                }
              }
              else
              {
                 echo  "<tr> <td colspan='12'> Orders Not Available</td> </tr>";
              }

             ?>
              
            </table>

      </div> 
   </div>
  </section> 

<?php include('partial/end.php'); ?> 