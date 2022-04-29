<?php
include('../../../includes/initialize.php');
$sess = new Session();
$user = new User();
$id = $sess->getId();

echo $id;
$user_arr = $user->getUserById($id);
// echo "<pre>";
// print_r($user_arr);
// echo"</pre>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>My Account</title>
</head>
<body>
        <section class="account-section">
                <div class="container">
                        <div class="row">
                                <div class="col-md-6 m-auto ">
                                        <div class="card border border-dark">
                                                <div class="card-header  ">
                                                        <h1>My Account</h1>
                                                </div>
                                                 <img src="../../images/<?php echo $user_arr['pic_name'];?>" class="card-img-top" alt="Profile" height="200">
                                                <div class="card-body">
                                                        <ul class="list-group list-group-flush">
                                                                <li class="list-group-item"><?php echo $user_arr["fname"];?></li>
                                                                <li class="list-group-item"><?php echo $user_arr["lname"];?></li>
                                                                <li class="list-group-item"><?php echo $user_arr["email"];?></li>
                                                                <li class="list-group-item"><?php echo $user_arr["gender"];?></li>
                                                        </ul>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>
        
</body>
</html>