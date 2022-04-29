<?php
include("../includes/initialize.php");

$contact = new Contact();

if(isset($_POST['submit'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $phone = $_POST['phone'];
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
    <title>Contact Us</title>
     
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
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="our_services.php">Services</a>
            </li>
            
            <li class="nav-item">
              <a
                class="nav-link active "
                
                href="contact_us.php"
                >Contact</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link "
                aria-current="page"
                href="login.php"
                >Login</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link "
                
                href="sign_up.php"
                >Sign up</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link "
                aria-current="page"
                href="logout.php"
                >Logout</a
              >
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!--Contact Us Header-->
    <section id="contact-us-header" class=" p-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center p-auto">Feel Free to contact Us</h1>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Section-->
    <section id="contact-section" class=" mb-4 mt-4 p-3 ">
      <div class="container">
        <div class="row">
          <div class="col-md-8 m-auto">
            <div class="card border border-danger ">
              <h3 id="form-header" class="bg-danger text-white text-center p-3">Please fill out this form to contact us</h3>
              <div class="card-body">
                <form action="contact_us.php" method="post">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input
                          type="text"
                          name="firstname"
                          id="fname"
                          class="form-control form-text"
                          placeholder="First Name"
                        />
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input
                          type="text"
                          name="lastname"
                          id="lname"
                          class="form-control form-text"
                          placeholder="Last Name"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input
                          type="email"
                          name="email"
                          id="idemail"
                          class="form-control form-text"
                          placeholder="Email"
                        />
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input
                          type="text"
                          name="phone"
                          id="idphone"
                          class="form-control form-text"
                          placeholder="Phone Number"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <textarea  class="form-control form-text"  id="idmessage" placeholder="Message" name="message"></textarea>
                      </div> 
                    </div> 
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="form-group">                                
                        <input  id="form-button" name="submit" type="submit" value="Submit" class="form-control btn btn-outline-danger btn-block">
                    </div>
                    </div>
                  </div>
                </form>
                </div>
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
