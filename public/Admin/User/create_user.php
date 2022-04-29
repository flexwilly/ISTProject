<?php
include("../../../includes/initialize.php");

//creating an instance of user class to access
//user methods and properties
$user = new User();

if(isset($_POST['create-user'])){
      $firstname = htmlentities($_POST['firstname']);
      $lastname = htmlentities($_POST['lastname']);
      $phone = htmlentities($_POST['phone']);
      $email = htmlentities($_POST['email']);
      $password = htmlentities($_POST['password']);
      $gender = htmlentities($_POST['gender']);
      $role = htmlentities($_POST['role']);
      $formFile  = $_FILES['fileToUpload'];


       //hash the password
      $hashed_password = $user->password_encrypt($password);
      //set the values
      try{
        $d1 = date("Y-m-d H:i:s");
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setPhone($phone);
        $user->setEmail($email);
        $user->setGender($gender);
        $user->setRole($role);
        $user->attach_file($formFile);
        $user->setDateCreated($d1);
        $user->setPassword($hashed_password);
        $user->save();
        echo "<script>
        alert('User created successfully');</script>";

        //print_r($user->errors);
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
    <!--Custom CSS link-->
    <link rel="icon" href="../../icons/dumbbell.png" type="image/png" />
    <link rel="stylesheet" href="../../css/style.css" />
    <title>Create User</title>
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
                                <li class="nav-item">
                                <a class="nav-link active" href="create_user.php">Create User</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="view_user.php">View User</a>
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
        <!--Create user section-->
        <!--Sign up section-->
        <section class="create-user-form mt-4 mb-4">
                <div class="container">
                        <div class="row">
                                <div class="col-md-6 m-auto">
                                        <div class="card border border-danger">
                                                <div class="card-header bg-danger">
                                                        <h1 id="form-heaader" class="text-white text-center">Create User</h1>
                                                </div>
                                                <div class="card-body">
                                                        <form action="create_user.php" method="POST" enctype="multipart/form-data">        
                                                                <div class="row">
                                                                        <div class="col-md-6 mb-2">
                                                                                <input type="text" class="form-control form-text" name="firstname" id="fname" placeholder="FirstName
                                                                                "
                                                                               
                                                                                >
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                                <input type="text" class="form-control form-text" name="lastname" id="lname" placeholder="LastName"
                                                                                
                                                                                >
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-md-6 mb-2">
                                                                                <input type="text" class="form-control form-text" name="phone" id="tel" placeholder="PhoneNumber"
                                                                               
                                                                                >
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                                <input type="email" class="form-control form-text" name="email" id="mail" placeholder="Email"
                                                                                >
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-md-6 mb-2">
                                                                                <input type="password" class="form-control form-text" name="password" id="pass" placeholder="Password"
                                                                                
                                                                                >
                                                                        </div>
                                                                        <div class="col-md-6 mb-2">
                                                                                <select name="role" class="form-select form-text" aria-label="Default select example">
                                                                                        
                                                                                        <option value="Admin">Admin</option>
                                                                                        <option value="Customer">Customer</option>
                                                                                        <option value="Trainer">Trainer</option>

                                                                                </select>
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                <div class="col-md-12 mb-2">
                                                                                <select name="gender" class="form-select form-text" aria-label="Default select example">
                                                                                        
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                </select>
                                                                        </div>
                                                                </div>        
                                                                
                                                                <div class="row">
                                                                        <div class="col-md-12 mb-2">
                                                                        <input name="fileToUpload" class="form-control form-text" type="file" id="formFile">
                                                                        </div>
                                                                </div>
                                                                <div class="row">
                                                                        <div class="col-md-12 mb-2">
                                                                                <button id="form-button" class="form-control bg-danger text-white" type="submit" name="create-user">Create User</button>
                                                                        </div>
                                                                </div>
                                                        </form>        
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </section>

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
              ><a href="../../index.php" class="text-white p-2">Home</a>
            </p>
            <p>
              <i class="fas fa-question-circle"></i
              ><a href="../../about.php" class="text-white p-2">About</a>
            </p>
            <p>
              <i class="fa fa-cog"></i
              ><a href="../../our_services.html" class="text-white p-2">Services</a>
            </p>
            <p>
              <i class="fa fa-envelope"></i
              ><a href="../../contact_us.php" class="text-white p-2">Contact</a>
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
