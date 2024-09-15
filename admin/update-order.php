<?php 
ob_start(); 
include('partial/menu.php'); 
?>


<section class= "main">
    <div class= "container">
       <div class= "row py-5">
            <div class="pb-2"><h1>Update Order</h1></div>

            <?php
            if(isset($_GET['id']))
            {
                $id= $_GET['id'];

                $sql = "SELECT * FROM tbbl_order WHERE id=$id";

                $res = mysqli_query($conn,$sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $fruit = $row['fruit'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];

                }
                else
                {
                    header("location:".SITEURL.'admin/manage-order.php');
                    ob_end_flush(); // End output buffering and flush output
                    exit();
                }

            }
            else
            {
                header("location:".SITEURL.'admin/manage-order.php');
                ob_end_flush(); // End output buffering and flush output
                    exit();
            }

            ?>

            <div class="col-md-7">
                <form action="" method="POST">
                            
                            <div class="mb-3">
                                <label for="fruitname" class="form-label">Fruit Name</label>
                                <td><b> <?php echo $fruit; ?></b></td>
                            </div>

                            <div class="mb-3">
                                <label for="qty" class="form-label">Price</label>
                                <td><b> <?php echo $price; ?></b></td>
                               
                            </div>

                            <div class="mb-3">
                                <label for="qty" class="form-label">Qty</label><br>
                                <input type="number"  name="qty" value="<?php echo $qty; ?>" class="form-control" id="title" aria-describedby="title" >
                               
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                
                                <option <?php if($status=="Ordered"){echo "selected";} ?> value="Orderd">Orderd</option>
                                <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                                <option <?php if($status=="Deliverd"){echo "selected";} ?> value="Deliverd">Deliverd</option>
                                <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                                </select>

                            </div>

                            <div class="mb-3">
                                <label for="customername" class="form-label">Customer Name</label>
                                <input type="text"  name="customer_name" value="<?php echo $customer_name; ?>" class="form-control" id="title" aria-describedby="title" >
                               
                            </div>

                            <div class="mb-3">
                                <label for="customercontact" class="form-label">Customer Contact</label>
                                <input type="text"  name="customer_contact" value="<?php echo $customer_contact; ?>" class="form-control" id="title" aria-describedby="title" >
                               
                            </div>

                            <div class="mb-3">
                                <label for="customeremail" class="form-label">Customer Email</label>
                                <input type="text"  name="customer_email" value="<?php echo $customer_email; ?>" class="form-control" id="title" aria-describedby="title" >
                               
                            </div>

                            <div class="mb-3">
                                <label for="customeraddress" class="form-label">Customer Address</label>
                                <textarea name="customer_address" cols="77" rows="5"><?php echo $customer_address; ?></textarea>
                               
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">

                            <button type="submit" name="submit" class="btn btn-success">Update Fruit</button>
                    </form>
                             
                    <?php
                    if(isset($_POST['submit']))
                    {
                        $id = $_POST['id'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $total = $price * $qty;
                        $status = $_POST['status'];
                        $customer_name = $_POST['customer_name'];
                        $customer_contact = $_POST['customer_contact'];
                        $customer_email = $_POST['customer_email'];
                        $customer_address = $_POST['customer_address'];


                        $sql2= "UPDATE tbbl_order SET
                        qty = $qty,
                        total = $total,
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'

                        WHERE id ='$id'
                        
                        ";

                        $res2 = mysqli_query($conn,$sql2);

                        if($res2==TRUE)
                        {
                            $_SESSION['update'] = "Order Updated Successfully";
                            header("location:".SITEURL.'admin/manage-order.php');
                            ob_end_flush();
                            
                        }
                        else
                        {
                            $_SESSION['update'] = "Failed to Update";
                            header("location:".SITEURL.'admin/manage-order.php');
                             ob_end_flush();
                            
                        }




                        
                    }

                    ?>
            </div>
               
                
        </div> 
    </div>
            
</section>


<?php 
include('partial/end.php');
ob_end_flush(); 
?> 