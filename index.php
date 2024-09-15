<?php include('partial-front/menu.php'); ?>

    <section id="Home"  class="banner">
  
        <div class="row">
            <div class="col-md-12">
                <div class="text-light w-75 m-auto text-center pb-5">
                    <h1>Welcome to My Fruits Store</h1>
                    
                </div>
               
               
    
            </div>
            <?php
                    if(isset($_SESSION['orders']))
                    {
                      ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Hey!</strong> <?php echo $_SESSION['orders']; ?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      <?php
                      unset($_SESSION['orders']);
                    }
              ?>



        </div>
    </section>

    <section id ="" class="fruit-explore">
      <div class="container py-5">
          <div class="row">
                <h1 class="text-center pb-3">Explore Fruits</h1>

                <?php 
                $sql= "SELECT *FROM tbl_catagory WHERE active='YES' AND feartured='YES' LIMIT 3";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if ($count>0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    
                    ?>
                
                  <div class="col-md-4 pb-5">
                    <div class="card " style="width: 18rem;">
                    <a href="<?php echo SITEURL; ?>fruit-category.php?catagory_id=<?php echo $id; ?>">
                    
                      <?php
                            if($image_name== "")
                            {
                              echo "Image not Available";
                            }
                            else
                            {
                              ?>
                              <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="card-img-top " alt="...">

                              <?php
                            }
                            
                            ?>
                          <div class="text-center">
                          <p class="card-text text-decoration-none"><?php echo $title; ?></p>
                      
                          </div>
                          </a>    
                    </div>
                    
                  </div>
                 
                

                  
                    <?php
                  }

                }
                else
                {
                  echo "Category not Added";

                }
                
                ?>
              
                <div class="clearfix"></div>

              </div>

                
              
                
        </div>
          
      </div>
    </section>
    

    <section id ="" class="menu">
        <div class="container py-5">
            <div class="row">
                <h1 class="text-center pb-3">Fruit Menu</h1>
                  <?php
                  $sql2= "SELECT *FROM tbl_fruit WHERE active='YES' AND feartured='YES'LIMIT 6";

                  $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if ($count>0)
                {
                  while($row=mysqli_fetch_assoc($res2))
                  {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];

                    ?>

                        <div class="col-md-6">
                            <div class="card mb-3" style="max-width: 540px; ">
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
                                      <img src="<?php echo SITEURL; ?>images/fruit/<?php echo $image_name; ?>"  class="card-img-top" alt="..." >

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
                    <h3 class="text-center">
                      <a href ="fruit.php" class= "text-white text-decoration-none"> See All Fruits</a>
              </h3>

            </div>
        </div>
    </section>

    <section id ="" class="social">
      <div class="container py-5">
        <div class="row text-center">
          <div class="col-md-12">
            <a href =https://www.whatsapp.com ><i class="fa-brands fa-whatsapp"></i></a>
            <a href =https://www.facebook.com ><i class="fa-brands fa-facebook"></i></a>
            <a href =https://www.twitter.com ><i class="fa-brands fa-square-twitter"></i></a>
            <a href =https://www.instagram.com ><i class="fa-brands fa-square-instagram"></i></a>
          </div>

        </div>
      </div>
    </section>






<?php include('partial-front/footer.php'); ?>

  