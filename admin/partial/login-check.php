<?php
if (!isset($_SESSION['user']))
{
    $_SESSION['no-login-message'] = "Please Login to Access";
    header("location:".SITEURL.'admin/login.php');
}
?>
