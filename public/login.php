<?php
include("../includes/initialize.php");

//instantiatig session class
$sess = new Session();
$user = new User();

if(isset($_POST['login'])){
        $email = htmlentities($_POST['email']);
        $password = trim($_POST['password']);
        //$upass = $user->password_encrypt($password);
        $found_user = $user->attempt_login($email,$password);
        //get user role
        $role = $found_user["role"];
        if($found_user && $role == "Customer"){
                $sess->login($found_user);
                redirect_to("Customer/customer_dashboard.php");
        }else if($found_user && $role =="Admin"){
                $sess->login($found_user);
                redirect_to("Admin/admin_dashboard.php");
        }else if($found_user && $role == "Trainer"){
                $sess->login($found_user);
                 redirect_to("Trainer/trainer_dashboard.php");
        }else{
                echo "<script>alert('Username/Password Incorrect');</script>";
                echo "<script>window.location.href = 'login.php';</script>";

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
    <!--Custom CSS link-->
    <link rel="icon" href="icons/dumbbell.png" type="image/png" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/form-style.css">
    <title>Login </title>
     
  </head>
  <body>
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
      <div class="container-fluid">
        <a href="index.html"
        ><img
          id="logo"
          class="rounded-circle m-3"
          src="images/lion-50.png"
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
            <li class="nav-item">
              <a class="nav-link " href="index.php">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  User
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  <li><a class="dropdown-item" href="sign_up.php">Create Account</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item active" href="login.php">Login</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="contact_us.php">Contact Us</a></li>
                 
                  
                </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="our_services.php">Services</a>
            </li>
            
           
          </ul>
        </div>
      </div>
    </nav>
    <!--Login Section-->
        <section class="login-section mt-4 mb-4">
            <div class="container">
                    <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="card border border-danger">
                                        <div class="card-header bg-danger">
                                                <h1  class="text-center form-title text-white">Login</h1>
                                        </div>
                                        <div class="card-body">
                                                <form action="login.php" method="POST">
                                                <div class="row mb-2">
                                                        <div class="col-md-12">
                                                                <input type="email" class="form-control form-field" name="email" id="email" placeholder="Email">
                                                        </div>
                                                </div>
                                                <div class="row mb-2">
                                                        <div class="col-md-12">
                                                                <input type="password"class="form-control form-field" name="password" id="password"
                                                                placeholder="Password">
                                                        </div>
                                                </div>
                                                <div class="row mb-2">
                                                        <div class="col-md-12">
                                                                <button class="form-control form-button bg-danger text-white" type="submit" name="login">Login</button>
                                                        </div>
                                                </div>
                                                </form>
                                                <small class="text-center"><a class="form-text" href="update_password.php"></a></small>
                                        </div>

                                </div>
                            </div>
                            
                    </div>
                    <div class="row">
                      <div class="col-md-6 m-auto text-center">
                        <a class="form-text p-3" href="update_password.php">Update Password</a>
                      </div>
                    </div>
            </div>
        </section>
         <!--Bootstrap JS-->
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
              ><a href="index.html" class="text-white p-2">Home</a>
            </p>
            <p>
              <i class="fas fa-question-circle"></i
              ><a href="about_us.html" class="text-white p-2">About</a>
            </p>
            <p>
              <i class="fa fa-cog"></i
              ><a href="services.html" class="text-white p-2">Services</a>
            </p>
            <p>
              <i class="fa fa-envelope"></i
              ><a href="contact_us.html" class="text-white p-2">Contact</a>
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
   <script src="js/scroll_up.js"> </script>
  </body>
</html>
