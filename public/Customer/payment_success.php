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
        //     $start_date = $sess->getStart_date();
        //     $end_date = $sess->getEnd_date();
             $user_id = $sess->getId();
        //     $service_id = $sess->getService_id();

           
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
        echo 'Transaction is declined';
    }
    
?>