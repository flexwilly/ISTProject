<?php
include("../../includes/initialize.php");
//Instantiation of the classes
$sess = new Session();
$services = new Service();
//Call the session & service variables
$role = $sess->getRole();
$sess->check_user_login($role,"Customer");
$s1 = $services->getAllServices();

//print_r($service_array);
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
   <!--datatables-->
   <!--cdn datatables-->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
    <!--Custom CSS link-->
    <link rel="icon" href="../icons/dumbbell.png" type="image/png" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/form-style.css" />
    <title>View Services</title>
    <!--Internal CSS-->
    <style>

    </style>
  </head> 
<body>
     <!--NavBar-->
     <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
      <div class="container-fluid">
                <a href="../index.php"
                ><img
                id="logo"
                class="rounded-circle m-3"
                src="../images/lion-50.png"
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
                                  <a class="nav-link dropdown-toggle " href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $sess->getFName();?>
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                      <li><a class="dropdown-item" href="customer_dashboard.php">Dashboard</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item " href="customer_account.php">Account</a>
                                      </li>         
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle active" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Services
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                      <li><a class="dropdown-item active" href="view_services.php">Our Services</a></li>
                                      <li><hr class="dropdown-divider"></li>
                                      <li><a class="dropdown-item" href="pay_subscription.php">Pay</a>
                                      </li>         
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gym Class
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                      <li><a class="dropdown-item" href="view_gym_class.php">Gym Class</a></li>
                                      </li>         
                                  </ul>
                              </li>

                              <li class="nav-item">
                                  <a
                                    class="nav-link "
                                    aria-current="page"
                                    href="../logout.php"
                                    >Logout</a
                                  >
                              </li>
                        </ul>
                </div>
        </div>
    </nav>


    <!---View Services Section-->
    <section class="view-services-section mt-4 mb-4">
        <div class="container">
            <h1 class="text-center form-title">Our Services</h1>
            <div class="row mb-2">   
                    <?php foreach($s1 as $service){?>
                    <div class="col-md-4 mb-3">
                        <div class="card border border-danger">
                                <div class="card-header bg-danger">
                                        <h1 class="form-title text-center text-white"><?php echo $service['service_name'];?></h1>
                                </div>
                                <img src="../images/<?php echo $service['pic_name'];?>" class="card-img-top" alt="Profile" height="200">
                                <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                                <li class="text-center list-group-item">$ <?php echo $service["service_price"];?></li>
                                        </ul>
                                         <ul class="list-group">
                                               <li class="text-center list-group-item">
                                               <a  class='form-button form-control btn btn-danger' href='subscription.php?service_id=<?php echo $service['service_id']?>'>Subscribe</a>
                                               </li>
                                         </ul>
                                </div>
                        </div>
                    </div>
                    <?php }?>
            </div>
        </div>
    </section>
      <!--End View Services  Section-->

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
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <!--End Data Tables-->
    <script>
      //JQuery for setting the current year
      $("#year").text(new Date().getFullYear());
      $('#mytable').DataTable();
      
    </script>
   <script src="../js/scroll_up.js"> </script>
  </body>