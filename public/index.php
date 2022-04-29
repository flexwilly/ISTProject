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
    <!--Slick css link-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
      integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"
      integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg=="
      crossorigin="anonymous"
    />

    <!--Custom CSS link-->
    <link rel="icon" href="icons/dumbbell.png" type="image/png" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Home</title>
   
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
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
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
    <!--Images Slider-->
    <section id="slider-section" class="fitness-image-slider bg-light mb-5 p-0">
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto"></div>
        </div>
      </div>
			  <div class="slider">
				<div class="image-1"></div>
				<div class="image-2"></div>
				<div class="image-3"></div>
				<div class="image-4"></div>
			  </div>
      <!--overlay-->
		  <div class="center-text">
			<div class="text text-center">
			  <h1>Welcome to Debbs Gym</h1>
			  <i class="fas fa-dumbbell fa2x"></i>
			</div>
      </div>
    </section>

    <!--Home Icons-->
    <section id="home-icons" class="p-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4 text-center">
            <i class="fas fa-dumbbell fa-3x"></i>
            <h1>We train hard.</h1>
            <p>
              We have an amazing team that is always willing to push you to your
              limits.
            </p>
          </div>
          <div class="col-md-4 mb-4 text-center">
            <i class="fas fa-walking fa-3x"></i>
            <h1>Achieve your goals.</h1>
            <p>
              Regardless of your body weight we do not discriminate .All are
              welcome.
            </p>
          </div>
          <div class="col-md-4 mb-4 text-center">
            <i class="fas fa-trophy fa-3x"></i>
            <h1>Win with Us.</h1>
            <p>All the effort you put will always carry a reward.</p>
          </div>
        </div>
      </div>
    </section>

    <!--Home Heading Section-->
    <section id="heading-section" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto text-white text-center">
            <h1>Our Location</h1>
          </div>
        </div>
      </div>
    </section>

    <section id="location" class="mb-4 bg-light p-5">
      <div class="container">
      <div class="row">
        <div class="col-md-8">
          <iframe
            id="mymap"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.098080673008!2d36.823847068722316!3d-1.3106273347052197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11a9d644a551%3A0xffc84960ca560e99!2sSouth%20B%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1618493788128!5m2!1sen!2ske"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div>
        <div class="col-md-4 bg-secondary">
          <h1 id="location-header" class="text-center text-white">Location</h1>
          <p id="location-text" class="text-justified text-white">
            We are located along Champions Boulevard in the prestigious Tomlands
            Residential area. Tomlands Residential area comprises of an
            apartment complex and luxury rooms. Debbs gym is located on the
            ground floor of this prestigous apartment complex. The signeage on
            the road provides accurate information about the location .It is
            highly unlikely that our visitors may get lost trying to find us.
          </p>
        </div>
      </div>
      </section>
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
      //slider
      $(".slider").slick({
        infinite: true,
        fade: true,
        cssEase: "linear",
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
      });  
    </script>
    <script src="js/scroll_up.js"> </script>
  </body>
</html>
