<?php include('partial-front/menu.php'); ?>

<section id ="" class="fruit-explore">
        <div class="container py-5">
            <div class="row">
                <h1 class="text-center pb-3">Explore Foods</h1>

                <?php
                $sql= "SELECT *FROM tbl_catagory WHERE active='YES'";

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
                      <div class="card" style="width: 18rem;">
                      <a href="<?php echo SITEURL; ?>fruit-category.php?catagory_id=<?php echo $id; ?>">
                        

                          <?php
                          if($image_name== "")
                          {
                            echo "Image not Found";
                          }
                          else
                          {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="card-img-top" alt="...">

                            <?php
                          }
                          

                          ?>

                           
                            <div class="text-center">
                              <p class="card-text"><?php echo $title; ?></p>
                            </div>
                        </a>
                        
                      </div>
                    </div>

                    <?php
                  }

                }
                else
                {
                  echo "Category not Found";
                }

                ?>
                <div class="clearfix"></div>


            </div>
        </div>
    </section>


<?php include('partial-front/footer.php'); ?>