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
    <title>Services</title>
    <style>
      #people-section img {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 250px;
        width: 100%;
      }
    </style>
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
              <a class="nav-link active" href="our_services.php">Services</a>
            </li>
            
            <li class="nav-item">
              <a
                class="nav-link "
                
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
    <!--Services Header-->
    <section id="myservices-header" class="p-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-center p-auto">Our services</h1>
          </div>
        </div>
      </div>
    </section>

    <!--Rates-->
    <section id="rates-header" class="mb-4 p-2">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-center p-auto text-secondary">Our Rates</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-header bg-danger">
                <h2 class="text-center text-white">Daily</h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">KES 199.99/Day.</h4>
                <ul class="list-group">
                  <li class="list-group-item">
                    <p>Access to the gym the whole day excluding Sunday.</p>
                  </li>
                  <li class="list-group-item">
                    <p>Trainer availlable to guide you during the workout.</p>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <button class="form-control btn btn-outline-danger">
                  Subscribe
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-header bg-danger">
                <h2 class="text-center text-white">Weekly</h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">KES 999.99/Week.</h4>
                <ul class="list-group">
                  <li class="list-group-item">
                    <p>Access to the gym the whole week excluding Sunday.</p>
                  </li>
                  <li class="list-group-item">
                    <p>Trainer availlable to guide you during the workout.</p>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <button class="form-control btn btn-outline-danger">
                  Subscribe
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-header bg-danger">
                <h2 class="text-center text-white">Monthly</h2>
              </div>
              <div class="card-body">
                <h4 class="card-title text-center">KES 1,999.99/Month.</h4>
                <ul class="list-group">
                  <li class="list-group-item">
                    <p>Access to the gym the whole month excluding Sundays.</p>
                  </li>
                  <li class="list-group-item">
                    <p>Trainer availlable to guide you during the workout.</p>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <button class="form-control btn btn-outline-danger">
                  Subscribe
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--Equipment-->
    <section id="equipment-header" class="mb-4 p-2">
      <div class="container">
        <div class="row">
          <div class="col mb-4">
            <h1 class="text-center p-auto text-secondary">Equipment</h1>
          </div>
        </div>
        <div class="row mb-4">
          <p class="text-center text-dark">
            Debbs gym has invested in world class equipment to ensure our
            clients get the best experience availlable. Our equipments are
            shipped in from the best factories that produce gym related
            equipment. Our equipments are regularly repaired and maintained in
            the best condition possible to ensure our clients have an easy time
            while using them.
          </p>
        </div>
        <!--Different equipment images-->
        <div class="row mb-4">
          <div class="col-md-4">
            <img src="images/equipment-001.jpg" alt="" />
          </div>
          <div class="col-md-4">
            <img src="images/equipment-002.jpg" alt="" />
          </div>
          <div class="col-md-4">
            <img src="images/equipment-003.jpg" alt="" />
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-4">
            <img src="images/equipment-004.jpg" alt="" />
          </div>
          <div class="col-md-4">
            <img src="images/equipment-005.jpg" alt="" />
          </div>
          <div class="col-md-4">
            <img src="images/equipment-006.jpg" alt="" />
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-4">
            <img src="images/equipment-007.jpeg" alt="" />
          </div>
          <div class="col-md-4">
            <img src="images/equipment-008.jpg" alt="" />
          </div>
          <div class="col-md-4">
            <img src="images/equipment-009.jpg" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section id="members-header" class="pb-0">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-center text-secondary p-auto">Trainers</h1>
          </div>
        </div>
      </div>
    </section>

    <!--Our Trainers-->
    <section id="people-section" class="mb-4 text-center text-dark">
      <div class="container">
        <div class="row">
          <p>
            We have a group of very highly qualified trainers who will help you
            in your fitness journey.
          </p>
          <p>Feel free to engage them at any point in your journey</p>
          <p>Check out our trainers</p>
          <div class="col-md-4 mb-4">
            <div class="image-overlay">
              <img src="images/Omosh.jpeg" alt="" />
              <div class="overlay overlayCross">
                <p class="text">Winston Omwondo</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="image-overlay">
              <img src="images/Robert.jpeg" alt="" />
              <div class="overlay overlayCross">
                <p class="text">Robert Gatonye</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="image-overlay">
              <img src="images/Willy.jpg" alt="" />
              <div class="overlay overlayCross">
                <p class="text">Wilson Onjore</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <a href="#" class="scrollup text-dark"><i class="fas fa-arrow-up"></i></a>

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
     <!--scrollup-->
    <script src="js/scroll_up.js"></script>
  </body>
</html>
