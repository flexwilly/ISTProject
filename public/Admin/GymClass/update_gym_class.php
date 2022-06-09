<?php
include("../../../includes/initialize.php");
$sess = new Session();
//$created_by = $sess->getId();
//echo $created_by;
//creating an instance of user class to access
//user methods and properties

//if not correct user redirect to the right location
$role = $sess->getRole();
$sess->admin_session_protection($role,"Admin");

$id = $_GET['id'];
$gym_class = new GymClass();
$gym_class_array = $gym_class->getGymClassById($id);

//print_r($gym_class_array);

$user = new User();
$trainers = $user->getUserByRole('Trainer');


if(isset($_POST['update-gym-class'])){
        $gym_class_name = htmlentities($_POST['gym-class-name']);
        $gym_class_desc = htmlentities($_POST['gym-class-desc']);
        $gym_class_trainer = htmlentities($_POST['trainer-select']);
        // $formFile  = $_FILES['fileToUpload'];

     // print_r($formFile);
     
      try{
        $gym_class->setId($id);
        $gym_class->setGym_class_name($gym_class_name);
        $gym_class->setGym_class_desc($gym_class_desc);  
        $gym_class->setTrainerId($gym_class_trainer);
       // $gym_class->attach_file($formFile);
        $gym_class->update_gym_class();
      }catch(PDOException $e){
        echo $e->getMessage();
      }
      
}

 if(isset($_POST['change-img'])){
   try{
    $class_id = $gym_class->setId($id);
    $formFile  = $_FILES['fileToUpload'];
    $gym_class->attach_file($formFile);
    $gym_class->update_img($class_id);
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
    <title>Update Gym Class</title>
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
                                                <li><a class="dropdown-item active" href="view_gym_class.php ">View Gym Class</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item " href="create_gym_class.php">Create Gym Class</a>
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
      
      <!--Updadte Gym Class Section---->
        <section class="update-gym-class mt-4 mb-4">
          <div class="container">
            <div class="row">
              <!--Update Class Details-->
              <div class="col-md-6">
                    <div class="card border border-danger">
                        <div class="card-header bg-danger">
                          <h1 class="text-center form-title">
                            Update Gym Class Records
                          </h1>
                        </div>
                        <div class="card-body">
                      <form action="update_gym_class.php?id=<?php echo $gym_class_array['id'];?>" method="post" enctype="multipart/form-data">
                        <div class="row mb-2">
                              <input type="text" class="form-control form-field" name="gym-class-name" id="" value="<?php echo $gym_class_array['gym_class_name'];?>" placeholder="Service Name">
                        </div>
                        <div class="row mb-2">
                        <label for="exampleFormControlTextarea1" class="form-label form-field">Service Description</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" name="gym-class-desc" rows="3" ><?php echo $gym_class_array['gym_class_desc'];?>
                              </textarea>
                        </div>
                        <div class="row-mb-2">
                          <label for="Trainers" class="form-label form-text">Trainers</label>
                          <select name='trainer-select' class="form-select" aria-label="Default select example">
                              <option  class='form-text' selected >Choose a trainer</option>
                                  <?php foreach($trainers as $trainer){?>
                                    <option class='form-text' value="<?php echo $trainer['id'];?>"><?php echo $trainer['fname']?></option>
                                  <?php }?>
                            </select>
                        </div>
                        
                        <div class="row mb-2">
                                <button id="form-button" class="form-control bg-danger text-white" type="submit" name="update-gym-class">Update Gym Class
                                </button>
                        </div>
                      </form>

                  </div>
                    </div>
              </div>
              <div class="col-md-6">
                <!--Update Image Card-->
                <div class="card  border border-danger">
                  <div class="card-header bg-danger">
                    <h1 class="text-center form-title">
                      Update Gym Class Images
                    </h1>
                  </div>
                  <div class="card-body">
                    <div class="row mb-2">
                       <img src="../../images/<?php echo $gym_class_array['pic_name']?>" height="200px" width="100%">
                    </div>
                  <form action="update_gym_class.php?id=<?php echo $gym_class_array['id'];?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-2">
                      <small class="text-center">
                        <?php echo $gym_class_array['pic_name'];?>
                      </small>
                      <br>
                      <input name="fileToUpload" class="form-control form-field" type="file" id="formFile">
                    </div>
                    <div class="row mb-2">
                      <button id="form-button" class="form-control bg-danger text-white" type="submit" name="change-img">Change Image</button>
                    </div>
                  </form>
                  </div>
                </div>
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