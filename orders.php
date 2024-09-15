<?php 
ob_start(); // Start output buffering
include('partial-front/menu.php'); 
?>

<?php
if(isset($_GET['fruit_id']))
{
    $fruit_id = $_GET['fruit_id'];

    $sql = "SELECT * FROM tbl_Fruit WHERE id=$fruit_id";

    $res = mysqli_query($conn, $sql);

    if($res === false) {
        die('Error: ' . mysqli_error($conn)); // Display MySQL error
    }

    $count = mysqli_num_rows($res);

    if($count == 1)
    {
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    }
    else {
        header('location:'.SITEURL);
        exit(); // Ensure no further processing occurs
    }
}
else {
    header('location:'.SITEURL);
    exit(); // Ensure no further processing occurs
}
?>

<section id="" class="orders">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Fill This Form to Confirm Your Order</h2>
                <form action="" method="POST">
                    <h3>Selected Fruit</h3>
                    <div class="fruit-menu-img mb-3">
                    <div class="card" style="width: 10rem;">
                        <?php 
                        if($image_name == "") {
                            echo "<div class='text-danger'>Not Added Image</div>";
                        }
                        else {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/fruit/<?php echo $image_name; ?>" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="fruit-menu-desc mb-3">
                        <h4><?php echo $title; ?></h4>
                        <input type="hidden" name="fruit" value="<?php echo $title; ?>">
                        <p class="food-price"><?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                    </div>

                    <h3>Delivery Details</h3>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" id="fullname" aria-describedby="full_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Phone Number</label>
                        <input type="tel" name="contact" class="form-control" id="username" aria-describedby="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Address</label>
                        <textarea name="address" rows="3" class="form-control" required></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Confirm Order</button>
                </form>
            </div>
        </div>

        <?php
        if(isset($_POST['submit']))
        {
            $fruit = $_POST['fruit'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $total = $price * $qty;
            $order_date = date("y-m-d h:i:sa");
            $status = "Orderd";  // Corrected variable name

            $customer_name = $_POST['full_name'];
            $customer_contact = $_POST['contact'];

            $customer_email= $_POST['email'];
            $customer_address= $_POST['address'];

            $sql2 = "INSERT INTO tbbl_order SET 
            fruit = '$fruit',
            price = '$price',
            qty = '$qty',
            total = '$total',
            order_date = '$order_date',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address',
            status = '$status'"; // Added status field

            $res2 = mysqli_query($conn, $sql2);

            if($res2 == true)
            {
                $_SESSION['orders'] = "Order successfully";
                header('location:'.SITEURL);
                exit(); // Ensure no further processing occurs
            }
            else
            {
                die('Error: ' . mysqli_error($conn)); // Display MySQL error
            }
        }
        ?>
    </div>
</section>

<?php 
include('partial-front/footer.php'); 
ob_end_flush(); // End output buffering and flush the output
?>
