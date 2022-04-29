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
    <title>About</title>
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
              <a class="nav-link active" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="our_services.php">Services</a>
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
    <section id="about-header" class="p-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-center p-auto">About Us</h1>
          </div>
        </div>
      </div>
    </section>
    <!--Core Values-->
    <section id="core-values" class="p-5">
      <h1 class="text-center text-secondary">Core Values</h1>
      <div class="row">
        <div class="col-md-3 mb-4 text-center">
          <i class="fas fa-users text-danger"></i>
          <h2>Dedication</h2>
        </div>
        <div class="col-md-3 mb-4 text-center">
          <i class="fas fa-hands-helping text-info"></i>
          <h2>Teamwork</h2>
        </div>
        <div class="col-md-3 mb-4 text-center">
          <i class="fas fa-cogs text-warning"></i>
          <h2>Hardwork</h2>
        </div>
        <div class="col-md-3 mb-4 text-center">
          <i class="fas fa-thumbs-up text-success"></i>
          <h2>Determination</h2>
        </div>
      </div>
    </section>

    <!--Our History-->
    <section id="our-history" class="p-5 mb-4">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-center p-auto">Our History</h1>
          </div>
        </div>
      </div>
    </section>

    <!--About us story-->
    <section id="about-story" class="mb-4 p-2">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-justify">
            <p>
              Debbs gym was established in the early 1990s. It was for a long
              time the only fitness center located in the South B area until the
              emergence of Goldy's gym in the early 2000s. The gym was located
              inside the Tomlands Residential Complex for almost 20 years. In
              recent years the gym was relocated to the ground floor of the
              prestigious Tomlands Residential Complex where it is located till
              date.
            </p>

            <p>
              Over the years Debbs gym has maintained its reputation as one of
              the most hardcore gymnasiums not only in Nairobi but also the
              greater East Africa region. Debbs gym has continued its stellar
              tradition of producing well built bodybuilders who have gone on to
              participate in both local and international fitness competitions.
              Debbs gym has also produced strong powerlifters who have set
              records in numerous strongman events.
            </p>

            <p>
              Debbs gym culture states that all men are created equal the
              difference is the amout of effort they put into ensuring they
              become who they want to be. It is only one's personal effort that
              will enable a person who works-out at debbs gym to attain the
              prestigious title of spartan. In debbs gym we believe in teamwork
              , dedication, hardwork and determination. A spartan must
              demonstrate knowlege in all of the four disciplines.
            </p>
          </div>
          <div id="history-div-img" class="col-md-6"></div>
        </div>
      </div>
    </section>

    <!--Owner header-->
    <section id="manager" class="p-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-center p-auto">The Manager</h1>
          </div>
        </div>
      </div>
    </section>

    <!--Owner Text-->
    <section id="owner" class="p-5 mb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-justify">
            <p>
              Debbs gym is managed by Collins Owindi . He is an engineer by
              profession. He has been a manager at the prestigious debbs gym
              since 2017. Under his leadership, he has managed to facilitate
              various upgrades to the facility as a whole. Not only is Collins a
              competent manager, he is also a seasoned bodybuilder. Over the
              years he has managed to set various personal records during his
              training endeavours.
            </p>
          </div>
          <div class="col-md-4 text-center">
            <img src="images/Collo2.jpeg" alt="" />
            <h4 class="text-center">Collins Owidi</h4>
            <small class="text-center"> Gymnasium Manager</small>
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
    <script src="js/scroll_up.js"> </script>
  </body>
</html>
