<?php
include("../../../includes/initialize.php");
$sess = new Session();
#Redirect user based on role
$role = $sess->getRole();
$sess->admin_session_protection($role,"Admin");

$users= new User();
$user_array = $users->getAllUsers();

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
    <link rel="icon" href="../../icons/dumbbell.png" type="image/png" />
    <title>View User</title>
    <style>
      .table-section{
        height: 400px;
        width: 100%;
        overflow: auto;
      }
   
    </style>
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
                                        <li><a class="dropdown-item active" href="view_user.php ">View Users</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="create_user.php">Create Users</a>
                                        </li>  
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item " href="admin_account.php">Account</a>       
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
        <!--Section to Display Users-->
        <section class="table-section mt-4 mb-4">
        <div class="container">
                <div class="row">
                          <h1 id="form-header" class="text-center">View My Trainees</h1>
                        <div class="col-md-11 m-auto">
                                <table id="show-user" class="table table-striped border border-dark">
                                        <thead class="text-white bg-danger text-center">

                                                <tr>
                                                        <th id="table-heading" scope="col">ID</th>
                                                        <th id="table-heading" scope="col">FName</th>
                                                        <th id="table-heading" scope="col">LName</th>
                                                        <th id="table-heading" scope="col">Phone</th>
                                                        <th id="table-heading" scope="col">Email</th>
                                                        <th id="table-heading" scope="col">Role</th>
                                                        <th id="table-heading" scope="col">Date Created</th>
                                                        <th id="table-heading" scope="col">FileName</th>
                                                        <th id="table-heading" scope="col">Update</th>
                                                        <th id="table-heading" scope="col">Delete</th>

                                                </tr>    
                                        </thead>
                                        <tbody class="text-center">
                                                <?php                                   
                                                foreach($user_array as $user){
                                                echo "<tr class ='col'>
                                                <td class='form-text'>$user[id]</td>
                                                <td class='form-text' >$user[fname]</td>
                                                <td class='form-text' >$user[lname]</td>
                                                <td class='form-text' >$user[phone]</td>
                                                <td class='form-text' >$user[email]</td>  
                                                <td class='form-text' >$user[role]</td> 
                                                <td>$user[date_created]</td>
                                                <td><img class='rounded-circle' src='../../images/$user[pic_name]'width = '100' height='100'></td>
                                                <td><a class='btn btn-danger' href='delete_user.php?user_id=$user[id]'>Delete</a></td>
                                                <td><a class='btn btn-success' href='update_user.php?user_id=$user[id]'>Update</a></td>
                                                </tr>"
                                                ;     
                                                }
                                                ?>     
                                        </tbody>
                                </table>
                        </div>

                </div>
       
        </div>
    </section> 
        <!--End Section-->       
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
  <!--Data Tables JS-->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <!--End Data Tables-->
    <script>
      //JQuery for setting the current year
      $("#year").text(new Date().getFullYear());
      $('#show-user').DataTable();
    </script>
    
   <script src="../../js/scroll_up.js"> </script>
   
  </body>
</html>
