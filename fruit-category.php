<?php include('partial-front/menu.php'); ?>

<?php 
    if (isset($_GET['catagory_id']))
    {
        $catagory_id = $_GET['catagory_id'];

        $sql = "SELECT title FROM tbl_catagory WHERE id=$catagory_id";
        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);

        $catagory_title = $row['title'];
    }
    else
    {
        header('location:'.SITEURL);
    }


?>

<section id="Home"  class="banner">
  
        <div class="row">
            <div class="col-md-12">
                <div class="text-light w-75 m-auto text-center pb-5">
                <h1 >Fruits on <?php echo $catagory_title ?></h1>
                    
                    
                </div>
               
             </div>
    
        </div>
</section>

<section id ="" class="menu">
        <div class="container py-5">
            <div class="row">
                <h1 class="text-center pb-3">Fruit Menu</h1>
                <?php
                  $sql2= "SELECT *FROM tbl_fruit WHERE catagory_id=$catagory_id";

                  $res2 = mysqli_query($conn, $sql2);

                  $count2 = mysqli_num_rows($res2);
                if ($count2>0)
                {
                  while($row2=mysqli_fetch_assoc($res2))
                  {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];

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