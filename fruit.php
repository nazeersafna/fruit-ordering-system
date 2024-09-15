<?php include('partial-front/menu.php'); ?>

<section id ="" class="menu">
        <div class="container py-5">
            <div class="row">
                <h1 class="text-center pb-3">Fruit Menu</h1>
                <?php
                  $sql= "SELECT *FROM tbl_fruit WHERE active='YES'";

                  $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);
                if ($count>0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];

                    ?>


                          <div class="col-md-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                  <div class="card" style="height: 11.5rem;">
                                  <?php
                                    if($image_name== "")
                                    {
                                      echo "Image not Available";
                                    }
                                    else
                                    {
                                      ?>
                                      <img src="<?php echo SITEURL; ?>images/fruit/<?php echo $image_name; ?>" class="card-img-top" alt="...">

                                      <?php
                                    }
                                    

                                    ?>
                                  </div>
                                  </div>
                
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title"><?php echo $title; ?></h5>
                                      <p class="card-text"><?php echo $price; ?></p>
                                      <p class="card-text"><?php echo $description; ?></p>
                                     <a href="<?php echo SITEURL; ?>orders.php?fruit_id=<?php echo $id ?>" <button type="button" class="btn btn-success">Order Now</button></a>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                        
                        </div>

                    <?php
                  }

                }
                else
                {
                  echo "Fruit not Available";
                }


                  ?>

                    <div class="clearfix"></div>
                    

            </div>
        </div>
</section>

<?php include('partial-front/footer.php'); ?>