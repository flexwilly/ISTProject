<?php
include('../../../includes/initialize.php');

$u1 = new User();

$id= $_GET['user_id'];

echo $id;

$u1->destroy_img($id);

redirect_to("view_user.php");

?>