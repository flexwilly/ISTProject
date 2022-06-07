<?php
include('initialize.php');

class Payment{
        //Properties
        protected $tableName = 'payments';
        private $id;
        private $payment_id;
        private $payer_id;
        private $payer_email;
        private $amount;
        private $currency;
        private $payment_status;
        private $user_id;
        private $service_id;
        private $payment_date;
        //database connection
        private $dbConn;

        #Setters and getters
        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }
        public function setPayment_id($payment_id) { $this->payment_id = $payment_id; }
        public function getPayment_id() { return $this->payment_id; }
        public function setPayer_id($payer_id) { $this->payer_id = $payer_id; }
        public function getPayer_id() { return $this->payer_id; }
        public function setPayer_email($payer_email) { $this->payer_email = $payer_email; }
        public function getPayer_email() { return $this->payer_email; }
        public function setAmount($amount) { $this->amount = $amount; }
        public function getAmount() { return $this->amount; }
        public function setCurrency($currency) { $this->currency = $currency; }
        public function getCurrency() { return $this->currency; }
        public function setPayment_status($payment_status) { $this->payment_status = $payment_status; }
        public function getPayment_status() { return $this->payment_status; }
        public function setUser_id($user_id) { $this->user_id = $user_id; }
        public function getUser_id() { return $this->user_id; }
        public function setService_id($service_id) { $this->service_id = $service_id; }
        public function getService_id() { return $this->service_id; }
        public function setPayment_date($payment_date) { $this->payment_date = $payment_date; }
        public function getPayment_date() { return $this->payment_date; }


        #constructor
        public function __construct(){
                 //create an instance of the DBConnect Class
                 $db = new DBConnect();
                 //open connection to the database
                $this->dbConn =  $db->open_connection();
        }

        #Payments CRUD
        public function createPayment(){

        try{
                $sql = 'INSERT INTO '.$this->tableName. ' VALUES(null, :payment_id, :payer_id, :payer_email, :amount, :currency, :payment_status, :user_id, :service_id, :payment_date)';
                $stmt = $this->dbConn->prepare($sql);
                $stmt->bindParam(':payment_id',$this->payment_id);
                $stmt->bindParam(':payer_id',$this->payer_id);
                $stmt->bindParam(':payer_email',$this->payer_email);
                $stmt->bindParam(':amount',$this->amount);
                $stmt->bindParam(':currency',$this->currency);
                $stmt->bindParam(':payment_status',$this->payment_status);
                $stmt->bindParam(':user_id',$this->user_id);
                $stmt->bindParam(':service_id',$this->service_id);
                $stmt->bindParam(':payment_date',$this->payment_date);
                if($stmt->execute()){
                    return true;
        
                }else{
                    return false;
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        #Show All Payments
        public function showAllPayments(){
                try{
                        $stmt = $this->dbConn->prepare('SELECT * FROM '.$this->tableName);
                        $stmt->execute();
                        //create a variable array that will hold all the associative array values retrieved from the Database
                        $all_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        //return the values in associative array format.
                        return $all_users;
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                    
        }

        #Show Payments by user_id
        public function getPaymentById($id){
                $stmt = $this->dbConn->prepare('SELECT * FROM '.$this->tableName. ' WHERE sys_user_id = :id');
                $stmt->execute(['id'=> $id]);
                $single_payment = $stmt->fetch();
                //return the row containing the id 
                return $single_payment;
        }
}

?>