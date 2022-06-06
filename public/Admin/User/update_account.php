<?php
include("../../../includes/initialize.php");
$sess = new Session();
//redirect user based on role
$id = $sess->getId();
$role = $sess->getRole();
//$sess->check_user_login($role,"Admin");
$user = new User();
$user_arr = $user->getUserById($id);

//updating an image
if(isset($_POST['img-update'])){
  try{
    $my_id = $user->setUser_id($id);
    $formFile  = $_FILES['fileToUpload'];
    $user->attach_file($formFile);
    $user->update_one_img($my_id);
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}


if(isset($_POST['update-account'])){
  $fname = htmlentities($_POST['fname']);
  $lname = htmlentities($_POST['lname']);
  $email = htmlentities($_POST['email']);
  $gender = htmlentities($_POST['gender-select']);
  $phone = htmlentities($_POST['phone']);

  try{
    $user->setUser_id($id);
    $user->setFirstname($fname);
    $user->setLastname($lname);
    $user->setEmail($email);
    $user->setGender($gender);
    $user->setPhone($phone);
    $user->upDateSome();

  }catch(PDOException $e){
    echo $e->getMessage();
  }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Bootstrapcss link-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
     <!--font awesome-->
     <link
     rel="stylesheet"
     href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
     integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
     crossorigin="anonymous"
   />
   <!--cdn datatables-->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
    <!--Custom CSS link-->
    
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/form-style.css" />
    <link rel="icon" href="../../icons/dumbbell.png" type="image/png" />

    <title>Update Account</title>
    
  </head> 
<body>
   <!--NavBar-->
   <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
      <div class="container-fluid">
                <a href="../../index.php"
                ><img
                id="logo"
                class="rounded-circle m-3"
                src="../../images/lion-50.png"
                alt="logo"
                        /></a>
                <a class="navbar-brand" href="#">Debbs Gym</a>
                        <button
                                class="navbar-toggler"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarNav"
                                aria-controls="navbarNav"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                                >
                                <span class="navbar-toggler-icon"></span>
                        </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle active" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      <?php echo $sess->getFName();?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                        <li><a class="dropdown-item " href="view_user.php ">View Users</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item " href="create_user.php">Create Users</a>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item active" href="admin_account.php">Account</a>
                                        </li>         
                                    </ul>
                                </li>
                                <li class="nav-item">
                                  <a
                                    class="nav-link "
                                    aria-current="page"
                                    href="../admin_dashboard.php"
                                    >Go To DashBoard</a
                                  >
                                </li>
                                <li class="nav-item">
                                  <a
                                    class="nav-link "
                                    aria-current="page"
                                    href="../../logout.php"
                                    >Logout</a
                                  >
                                </li>                        
                        </ul>
                </div>
        </div>
    </nav>

    <!--Update Account Section--->
    <section class="update_acc_form mt-4 mb-4">
            <div class="container">
                    <div class="row">
                            <div class="col-md-6 mb-4">
                                    <div class="card border border-danger">
                                            <div class="card-header bg-danger">
                                                    <h1 class="text-center form-title text-white">Update Account</h1>
                                            </div>
                                            <div class="card-body">
                                                    <form action="update_account.php" method="post">
                                                     <div class="row">
                                                             <div class="col-md-6 mb-2">
                                                                     <input type="text" class="form-control form-field" placeholder="FirstName" name="fname" value="<?php echo $user_arr["fname"];?>" id="">
                                                             </div>
                                                             <div class="col-md-6 mb-2">
                                                                     <input type="text" class="form-control form-field" placeholder="LastName" name="lname" value="<?php echo $user_arr["lname"];?>" id="">
                                                             </div>
                                                     </div> 
                                                     <div class="row ">
                                                             <div class="col-md-6 mb-2">
                                                                     <input type="email" class="form-control form-field" placeholder="Email" name="email" value="<?php echo $user_arr["email"];?>" id="">
                                                             </div>
                                                             <div class="col-md-6 mb-2">
                                                                     <input type="text" class="form-control form-field" placeholder="Phone" name="phone" value="<?php echo $user_arr["phone"];?>" id="">
                                                             </div>
                                                     </div>
                                                     <div class="row ">
                                                             <div class="col-md-12 mb-2">
                                                                    
                                                                            <select name='gender-select' class="form-select form-field"    aria-label="Default select example">
                                                                                <option  class='form-field' selected ><?php echo $user_arr["gender"];?></option>
                                                                                <option  class='form-field' value="Male">Male</option>
                                                                                <option  class='form-field' value="Female">Female</option>        
                                                                            </select>
                                                                    </div>                  
                                                     </div>
                                                     <div class="row ">
                                                             <div class="col-md-12 mb-2">
                                                                     <button class="btn btn-danger form-control form-button text-white" type="submit" name="update-account">Update Account</button>
                                                             </div>
                                                     </div>        

                                                    </form>
                                            </div>
                                    </div>

                            </div>
                            <div class="col-md-6 mb-4">
                                     <div class="card border border-danger">
                                             <div class="card-header bg-danger">
                                                        <h1 class="text-center form-title text-white">Update Image</h1>
                                             </div>
                                             <div class="card-body">
                                                                <div class="row mb-2">
                                                                        <img src="../../images/<?php echo $user_arr["pic_name"];?>" height="150px" width="100%">
                                                                </div>
                                                       <form action="update_account.php" method="post" enctype="multipart/form-data">
                                                               
                                                              <div class="row mb-2">
                                                                        <div class="col-md-12">
                                                                                <small class="text-center">
                                                                                <?php echo $user_arr['pic_name'];?>
                                                                                </small>
                                                                                <br>
                                                                                <input name="fileToUpload" class="form-control form-field" type="file" id="formFile">              
                                                                        </div>
                                                              </div>
                                                              <div class="row mb-2">
                                                                      <div class="col-md-12">
                                                                                <button class="btn btn-danger text-white form-control form-button" type="submit" name="img-update">Update Pic</button>
                                                                      </div>
                                                              </div>
                                                       </form>
                                             </div>
                                     </div>
                            </div>
                    </div>
            </div>
    </section>
    <!--End Update Account Section-->
 
    <a href="#" class="scrollup  text-dark"><i class="fas fa-arrow-up"></i></a>
    <!--Footer-->
    <footer id="main-footer" class="bg-danger text-white">
      <div class="container">
        <div class="first-row row mb-4">
          <div class="col-md-3 mb-4">
            <h4 class="mb-4">Opening Hours</h4>
            <small class="text"> MONDAY - FRIDAY : 5.30am-8.30pm, </small>
            <small class="text"> SATURDAY : 5.30am -5.30pm, </small>
            <small class="text">Public Holidays : 8.00am - 8.00pm </small>
          </div>
          <div class="col-md-3 text-left text-white mb-4">
            <h4 class="mb-4">Locations</h4>
            <p><i class="fas fa-map-marker-alt"></i> South B,</p>
            <p>Champions Boulevard</p>
            <p>Opposite Tomlands Fitness Centre</p>
          </div>
          <div class="col-md-3 mb-4">
            <h4 class="mb-4">Menu</h4>
            <p>
              <i class="fa fa-home"></i
              ><a href="../index.php" class="text-white p-2">Home</a>
            </p>
            <p>
              <i class="fas fa-question-circle"></i
              ><a href="../about.php" class="text-white p-2">About</a>
            </p>
            <p>
              <i class="fa fa-cog"></i
              ><a href="../our_services.html" class="text-white p-2">Services</a>
            </p>
            <p>
              <i class="fa fa-envelope"></i
              ><a href="../contact_us.php" class="text-white p-2">Contact</a>
            </p>
          </div>
          <div class="col-md-3 mb-4">
            <h4 class="mb-4">Contact Us</h4>
            <p>PHONE: 07345256228</p>
            <p>EMAIL: debbsgym@gmail.com</p>
            <p>SOCIAL MEDIA:</p>
            <i class="fab fa-facebook p-2"></i>
            <i class="fab fa-instagram p-2"></i>
            <i class="fab fa-youtube p-2"></i>
            <i class="fab fa-twitter p-2"></i>
          </div>
        </div>
        <div class="row second-row text-center">
          <div class="col-md-12 ml-auto">
            <p class="lead">
              Copyright &copy;
              <span id="year"></span>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!--Bootstrap CDN JS & JQUERY links-->
    <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
    crossorigin="anonymous"
  ></script>
  <script
    type="text/javascript"
    src="//code.jquery.com/jquery-1.11.0.min.js"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"
    integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ=="
    crossorigin="anonymous"
  ></script>
    <script>
      //JQuery for setting the current year
      $("#year").text(new Date().getFullYear());
    </script>
   <script src="../../js/scroll_up.js"> </script>
  </body>
</html>

        
</body>
</html>