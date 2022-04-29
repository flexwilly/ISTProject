<?php

class Contact{
        private $firstname;
        private $lastname;
        private $email;
        private $phone;
        private $message;
        
        public function setFirstname($firstname) { $this->firstname = $firstname; }
        public function getFirstname() { return $this->firstname; }
        public function setLastname($lastname) { $this->lastname = $lastname; }
        public function getLastname() { return $this->lastname; }
        public function setEmail($email) { $this->email = $email; }
        public function getEmail() { return $this->email; }
        public function setPhone($phone) { $this->phone = $phone; }
        public function getPhone() { return $this->phone; }
        public function setMessage($message) { $this->message = $message; }
        public function getMessage() { return $this->message; }
        

}

?>