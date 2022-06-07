<?php
include("../../includes/initialize.php");
$sess = new Session();
echo "<script>alert('Payment Cancelled')</script>";
echo "<script>window.location.href = 'view_services.php';</script>";


?>