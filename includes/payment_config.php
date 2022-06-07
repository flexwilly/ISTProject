<?php
include('initialize.php');
require_once "vendor/autoload.php";

use Omnipay\Omnipay;
 
define('CLIENT_ID', 'ASdY_mD911sEqnbrFzcnavTMQqcScWEyca6XKTi-nfDfnG6UpyyZHEPizJxmb5EYGdlPBkDHQET_8O4X');
define('CLIENT_SECRET', 'EMCwubZXW5Cr-8KVET4VZKAXgDyE9W0XNWxi4ea-GrO3Pjg--keB_4oynm24ARQw3s3NMHiD-Z0MSYz7');
 
define('PAYPAL_RETURN_URL', 'http://localhost/Gymnase/public/Customer/payment_success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/Gymnase/public/Customer/payment_cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here

$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live

function handlePayment($amount){
        global $gateway;
        try {
                $response = $gateway->purchase(array(
                    'amount' => $amount,
                    'currency' => PAYPAL_CURRENCY,
                    'returnUrl' => PAYPAL_RETURN_URL,
                    'cancelUrl' => PAYPAL_CANCEL_URL,
                ))->send();
         
                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    echo $response->getMessage();
                }
            } catch(Exception $e) {
                echo $e->getMessage();
            }
}

?>