<?php
include("../../includes/initialize.php");
$sess = new Session();
$payment = new Payment();
// echo $sess->getId();

if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
        $transaction = $gateway->completePurchase(array(
            'payer_id'             => $_GET['PayerID'],
            'transactionReference' => $_GET['paymentId'],
        ));
        $response = $transaction->send();
     
        if ($response->isSuccessful()) {
            // The customer has successfully paid.
            $arr_body = $response->getData();
     
            $payment_id = $arr_body['id'];
            $payer_id = $arr_body['payer']['payer_info']['payer_id'];
            $payer_email = $arr_body['payer']['payer_info']['email'];
            $amount = $arr_body['transactions'][0]['amount']['total'];
            $currency = PAYPAL_CURRENCY;
            $payment_status = $arr_body['state'];
            $user_id = $sess->getId();
        
            #####Set values for the payments table #######
           
            $payment->setPayment_id($payment_id);
            $payment->setPayer_id($payer_id);
            $payment->setPayer_email($payer_email);
            $payment->setAmount($amount);
            $payment->setCurrency($currency);
            $payment->setPayment_status($payment_status);
            $payment->setStart_date($_SESSION["start_date"]);
            $payment->setEnd_date($_SESSION["end_date"]);
            $payment->setUser_id($user_id);
            $payment->setService_id($_SESSION["service_id"]);
     
            $payment->createPayment();
     
            echo "<script>alert('Payment is successful. Your transaction id is:{$payment_id}');</script>";
        } else {
            echo $response->getMessage();
        }
    } else {
       // echo 'Transaction is declined';
    }

    $id = $sess->getId();
    $payment_array = $payment->getPaymentById($id);
?>
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
      .view-payments-section{
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
                                      <li><a class="dropdown-item" href="payment_success.php">Payments</a>
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

    <!---Show My payments-->
    <section class="view-payments-section mb-4 mt-4">
        <div class="container">
                <div class="row">
                          <h1 class="text-center form-title">View My Payments</h1>
                        <div class="col-md-11 m-auto">
                                <table id="show-payments" class="table table-striped border border-dark">
                                        <thead class="text-white bg-danger text-center">

                                                <tr>
                                                        <th id="table-heading" scope="col"> ID</th>
                                                        <th id="table-heading" scope="col">Payment ID</th>
                                                        <th id="table-heading" scope="col">Payer ID</th>
                                                        <th id="table-heading" scope="col">Service ID</th>
                                                        <th id="table-heading" scope="col">Email</th>
                                                        <th id="table-heading" scope="col">Amount</th>
                                                        <th id="table-heading" scope="col">Currency</th>
                                                        <th id="table-heading" scope="col">Start</th>
                                                        <th id="table-heading" scope="col">End</th>
                                                        <th id="table-heading" scope="col">Status</th>
                                                </tr>    
                                        </thead>
                                        <tbody class="text-center">
                                                <?php                                   
                                                foreach($payment_array as $mypay){
                                                echo "<tr class ='col'>
                                                <td class='form-text'>$mypay[id]</td>
                                                <td class='form-text'>$mypay[payment_id]</td>
                                                <td class='form-text' >$mypay[payer_id]</td>
                                                <td class='form-text' >$mypay[service_id]</td>
                                                <td class='form-text' >$mypay[payer_email]</td>
                                                <td class='form-text' >$mypay[amount]</td>
                                                <td class='form-text' >$mypay[currency]</td>
                                                <td class='form-text' >$mypay[start_date]</td>  
                                                <td class='form-text' >$mypay[end_date]</td>
                                                <td class='form-text' >$mypay[payment_status]</td> 
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
    <!---End show payments-->   

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
      $('#show-payments').DataTable();
      
    </script>
   <script src="../js/scroll_up.js"> </script>
  </body>