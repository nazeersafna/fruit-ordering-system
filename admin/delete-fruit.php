<?php

    include('../config/constant.php');

    //echo "Delete Fruit";

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //echo "process Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/fruit/".$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['remove'] = "Failed to remove Fruit Image";
                header("location:".SITEURL.'admin/manage-fruit.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_fruit WHERE id=$id";

        $res = mysqli_query($conn,$sql);

        if($res==TRUE)
            {
                $_SESSION['delete'] = "Fruit Deleted Successfully";
                header("location:".SITEURL.'admin/manage-fruit.php');
            }
        else
            {
                $_SESSION['delete'] = "failed to Delete Fruit";
                header("location:".SITEURL.'admin/manage-fruit.php');
            }


    }
    else
    {
        //echo "redirect";
        $_SESSION['unauthorized'] = "Unauthorized Access";
        header("location:".SITEURL.'admin/manage-fruit.php');

    }

?>