<?php
//custom class functions
//function to redirect users
function redirect_to($location = NULL){
	if($location != NULL)
	{
		header("Location: " .$location);
		exit;
	}
}
?>