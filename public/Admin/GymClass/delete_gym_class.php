<?php
include('../../../includes/initialize.php');

$gym_class = new GymClass();

$id= $_GET['id'];

echo $id;

$gym_class->destroy_img($id);

redirect_to("view_gym_class.php");

?>