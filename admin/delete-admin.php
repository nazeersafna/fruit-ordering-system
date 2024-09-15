<?php 
include('../config/constant.php'); 
//get id
$id = $_GET['id'];
//sql query to dlt
$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn,$sql);

if($res==TRUE)
{
    $_SESSION['delete'] = "Admin Deleted Successfully";
    header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['delete'] = "failed to Delete Admin";
    header("location:".SITEURL.'admin/manage-admin.php');
}
                

//redirect



?>