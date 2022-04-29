<?php 
include('../includes/initialize.php');

$u1 = new User();

//echo $id;



$user_arr = $u1->getUserById($_GET['user_id']);
echo "<pre>";
print_r($user_arr);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
<form action="update.php?user_id=<?php echo $user_arr['id'];?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <br>
  Current File Name: <?php echo $user_arr['pic_name'];?>
  <br>
  <input type="file" name="fileToUpload" id="fileToUpload" >
 
  <input type="submit" value="Upload Image" name="submit">
</form>
        
</body>
</html>