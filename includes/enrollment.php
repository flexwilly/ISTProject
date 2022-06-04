<?php
include('initialize.php');

class Enrollment{
        protected $tableName = 'enrollment';  
        private $id;
        private $user_id;
        private $gym_class_id;
        private $date;
        private $moment;
        private $dbConn;

        public function setId($id) { $this->id = $id; }
        public function getId() { return $this->id; }
        public function setUser_id($user_id) { $this->user_id = $user_id; }
        public function getUser_id() { return $this->user_id; }
        public function setGym_class_id($gym_class_id) { $this->gym_class_id = $gym_class_id; }
        public function getGym_class_id() { return $this->gym_class_id; }
        public function setDate($date) { $this->date = $date; }
        public function getDate() { return $this->date; }
        public function setMoment($moment) { $this->moment = $moment; }
        public function getMoment() { return $this->moment; }

        #Class Constructor 
        public function __construct(){
                #constructor for service
                //create an instance of the DBConnect Class
                $db = new DBConnect();
                //open connection to the database
                $this->dbConn =  $db->open_connection();
        }
        #Create enrollment function
        public function createEnrollment(){
               try{ 
                        $sql = 'INSERT INTO '.$this->tableName. ' VALUES(null, :class_id, :user_id, :moment, :day)';
                        $stmt = $this->dbConn->prepare($sql);
                        $stmt->bindParam(':class_id',$this->gym_class_id);
                        $stmt->bindParam(':user_id',$this->user_id);
                        $stmt->bindParam(':moment',$this->moment);
                        $stmt->bindParam(':day',$this->date);
                        if($stmt->execute()){
                                return true;
                
                        }else{
                                return false;
                        }
                }catch(PDOException $e){
                        echo $e->getMessage();
                }
                    
        }

        #Delete A Gym Class
        public function deleteEnrollment($id){
                try{
                        $stmt = $this->dbConn->prepare('DELETE FROM '.$this->tableName . ' WHERE id = :id');
                        $stmt->bindParam(':id',$this->id);
                        
                        if($stmt->execute(['id'=>$id])){
                            return true;
                        }else{
                            return false;
                        } 
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
        }

        #View All Gym Classes
        public function viewAllEnrollments(){
                try{
                        $stmt = $this->dbConn->prepare('SELECT * FROM '.$this->tableName);
                        $stmt->execute();
                        //create a variable array that will hold all the associative array values retrieved from the Database
                        $all_classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        //return the values in associative array format.
                        return $all_classes;
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }

        }
        #Update an Enrollment
        public function updateEnrollment(){
                        $stmt = $this->dbConn->prepare('UPDATE '.$this->tableName. ' SET class_id = :class_id, user_id = :user_id,  moment = :moment, day = :day WHERE id = :id');
                        $stmt->bindParam(':class_id',$this->gym_class_id);
                        $stmt->bindParam(':user_id',$this->user_id);
                        $stmt->bindParam(':moment',$this->moment);
                        $stmt->bindParam(':day',$this->day);
    
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
        }

        public function viewEnrollmentByDate($date){
                $stmt = $this->dbConn->prepare('SELECT * FROM '.$this->tableName. ' WHERE day = :day');
                $stmt->execute(['day'=> $date]);
                $all_classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //return the row containing the id 
                return $all_classes;

        }
        public function viewEnrollmentsByTrainerId($trainer_id,$custom_date){
                $stmt = $this->dbConn->prepare('SELECT enrollment.id, gymclass.gym_class_name,users.fname,users.lname,users.email, users.phone,enrollment.moment,enrollment.user_id FROM enrollment INNER JOIN users ON enrollment.user_id=users.id INNER JOIN gymclass ON enrollment.class_id = gymclass.id WHERE gymclass.trainer_id = :trainer_id AND enrollment.day = :custom_date');
                $stmt->execute(['trainer_id'=> $trainer_id,'custom_date'=>$custom_date]);
                $all_classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //return the row containing the id 
                return $all_classes;

        }

}





?>