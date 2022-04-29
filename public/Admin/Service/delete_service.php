<?php
include('../../../includes/initialize.php');

$service = new Service();

$id= $_GET['service_id'];

echo $id;

$service->destroy_img($id);

redirect_to("view_service.php");

?>