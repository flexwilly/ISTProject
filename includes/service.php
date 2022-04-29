<?php
include('initialize.php');


class Service {
      protected $tableName = 'service';  
      private $service_id;
      private $service_name;
      private $service_price;
      private $user_id;
      private $dbConn;

     //image related data attributes
       private $filename;
       private $filesize;
       private $filetype;
       private $temp_path;
       protected $upload_dir = "images";
       private $date_created;
       //array of errors that may arise during file movement.
       public $errors=array();
 
       protected $upload_errors = array(
           UPLOAD_ERR_OK 				=> "No errors.",
           UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
           UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
           UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
           UPLOAD_ERR_NO_FILE 		=> "No file.",
           UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
           UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
           UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
       );
      

      #Class Constructor 
      public function __construct(){
              #constructor for service
               //create an instance of the DBConnect Class
               $db = new DBConnect();
               //open connection to the database
              $this->dbConn =  $db->open_connection();
      }

      #Encapsulation of properties
      public function setUserId($user_id) { $this->user_id = $user_id; }
      public function getUserId() { return $this->user_id; }

      public function setServiceId($service_id){ $this->service_id = $service_id; }
      public function getServiceId(){ return $this->service_id; }

      public function setServiceName($service_name){ $this->service_name = $service_name; }
      public function getServiceName(){ return $this->service_name; }

      public function setServicePrice($service_price){ $this->service_price = $service_price; }
      public function getServicePrice(){ return $this->service_price; }

      public function setDateCreated($date_created) { $this->date_created = $date_created; }
      public function getDateCreated() { return $this->date_created; }

       //File related encapsulated functions
        public function setFileName($filename) { $this->filename = $filename; }
        public function getFileName() { return $this->filename; }

        public function setFiletype($filetype) { $this->filetype = $filetype; }
        public function getFiletype() { return $this->filetype; }
    
        public function setFileSize($filesize) { $this->filesize = $filesize; }
        public function getFileSize() { return $this->filesize; }
    
        public function setTempPath($temp_path) { $this->temp_path = $temp_path; }
        public function getTempPath() { return $this->temp_path; }



      #Class methods
      #Function to create service
      public function create_service(){
              try{
                $sql = 'INSERT INTO '.$this->tableName. ' VALUES(null, :service_name, :service_price, :user_id, :pic_name, :service_created_date)';
                $stmt = $this->dbConn->prepare($sql);
                $stmt->bindParam(':service_name',$this->service_name);
                $stmt->bindParam(':service_price',$this->service_price);
                $stmt->bindParam(':user_id',$this->user_id);  
                $stmt->bindParam(':pic_name',$this->filename);
                $stmt->bindParam(':service_created_date',$this->date_created);
                if($stmt->execute()){
                        return true;
                }else{
                        return false;
                }                              
              }catch(PDOException $e){
                echo $e->getMessage();
              }
      }
     
     

      #Function to delete service
      public function deleteService($id){
              try{
                $sql = 'DELETE FROM '.$this->tableName . ' WHERE service_id = :service_id';    
                $stmt = $this->dbConn->prepare($sql);
                $stmt->bindParam(':service_id',$this->service_id);    
                if($stmt->execute(['service_id'=>$id])){
                    return true;
                }else{
                    return false;
                } 
              }catch(PDOException $e){
                echo $e->getMessage();
              }
      }

       #Function to update service
      public function updateSome(){
        try{
                $sql = 'UPDATE '.$this->tableName. ' SET service_name = :service_name, service_price = :service_price, user_id = :user_id WHERE service_id = :service_id';
                $stmt = $this->dbConn->prepare($sql);
                $stmt->bindParam(':service_name',$this->service_name);
                $stmt->bindParam(':service_price',$this->service_price);
                $stmt->bindParam(':user_id',$this->user_id);
                $stmt->bindParam(':service_id',$this->service_id);
                
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
        }catch(PDOException $e){
               echo $e->getMessage();
        }
          
      }

      ///Update All details
      public function updateAll(){
        try{
                $sql = 'UPDATE '.$this->tableName. ' SET service_name = :service_name, service_price = :service_price, user_id = :user_id, pic_name = :pic_name, WHERE service_id = :service_id';
                $stmt = $this->dbConn->prepare($sql);
                $stmt->bindParam(':service_name',$this->service_name);
                $stmt->bindParam(':service_price',$this->service_price);
                $stmt->bindParam(':user_id',$this->user_id);
                $stmt->bindParam(':pic_name',$this->filename);
                $stmt->bindParam(':service_id',$this->service_id);
                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
        }catch(PDOException $e){
               echo $e->getMessage();
        }
          
      }

      #Display all services
      public function getAllServices(){
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

      #Get Service by id
      public function getServiceById($id){
        try{      
        $stmt = $this->dbConn->prepare('SELECT * FROM '.$this->tableName. ' WHERE service_id = :service_id');
        $stmt->execute(['service_id'=> $id]);
        $single_service = $stmt->fetch();
        //return the row containing the id 
        return $single_service;
        }catch(PDOException $e){
                echo $e->getMessage();
        }
      }


     #Image Related Functions
        //Functions to handle the complete process of saving an image and its releveant information into the database.
        //1.Pass in $_FILE(['uploade file ']) as an argument 
        //This function sets the values of the file ie tmp_path, filename, filetype
        public function attach_file($file){
                // Perform error checking on the form parameters
                if(!$file || empty($file) || !is_array($file)) {
                    // error: nothing uploaded or wrong argument usage
                    $this->errors[] = "No file was uploaded.";
                    return false;
                } elseif($file['error'] != 0) {
                    // error: report what PHP says went wrong
                    $this->errors[] = $this->upload_errors[$file['error']];
                    return false;
                } else {
    
                    //encrypt the beginning of image name to avoid error
                    $v1= rand(1111,9999);
                    $v2= rand(1111,9999);
                    $v3 = $v1.$v2;
                    $v3 = md5($v3); 
    
                    // Set object attributes to the form parameters.
                    $this->setTempPath($file['tmp_name']);
                    //encrypted filename
                    $custom_filename = $this->encryptFileName($file);
                    $this->setFileName($custom_filename);
                    $this->setFiletype($file['type']);
                    $this->setFileSize($file['size']);
                    // Don't worry about saving anything to the database yet.
                   
                    return true;
        
                }
        }
        //encrypt filename
        public function encryptFileName($filename){
                $v1= rand(1111,9999);
                $v2= rand(1111,9999);
                $v3 = $v1.$v2;
                $v3 = md5($v3); 
                $custom_filename = $v3.basename($filename['name']);
                return $custom_filename;
        }
        //2.Setting and upload folder path
        public function image_path() {
                return $this->upload_dir.DS.$this->getFileName();
        }
        //3. Save the file into the correct folder & insert into database.
        public function save(){
                // Can't save if there are pre-existing errors
                        if(!empty($this->errors)) { return false; }
      
                // Can't save without filename and temp location
                if(empty($this->getFileName()) || empty($this->getTempPath())) {
                          $this->errors[] = "The file location was not available.";
                          return false;
                        }
      
                // Determine the target_path i.e 
                        $target_path = SITE_ROOT .DS. 'public' .DS. $this->upload_dir .DS. $this->getFileName();
      
                
                        // Make sure a file doesn't already exist in the target location
                        if(file_exists($target_path)) {
                           $this->errors[] = "The file {$this->getFileName()} already exists.";
                          return false;
                        }
      
                // Attempt to move the file 
                              if(move_uploaded_file($this->getTempPath(), $target_path)) {
                      // Success
                        // Save a corresponding entry to the database
                        if($this->create_service()) {
                            // We are done with temp_path, the file isn't there anymore
                            $myTempPath = $this->getTempPath();
                            unset($myTempPath);
                            return true;
                        }
                    } else {
                        // File was not moved.
                    $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
                    return false;
                    }
      
      
        }

        //4. Update existing image
        public function update_img($id){
                //get user by id
                $service = $this->getServiceByID($id);  

                // Can't save if there are pre-existing errors
                if(!empty($this->errors)) { return false; }

                 // Can't save without filename and temp location
                if(empty($this->getFileName()) || empty($this->getTempPath())) {
                         $this->errors[] = "The file location was not available.";
                        return false;
                }
                //path to the file in the images folder
                $initial_path = SITE_ROOT .DS. 'public' .DS. $this->upload_dir .DS. $service['pic_name'];
                // Determine the target_path i.e 
                $target_path = SITE_ROOT .DS. 'public' .DS. $this->upload_dir .DS. $this->getFileName();

     
                // Make sure a file doesn't already exist in the target location if it exists remove it
                if(file_exists($initial_path)) {
                        $this->errors[] = "The file {$this->getFileName()} already exists.";
                        unlink($initial_path);
                }
                // Attempt to move the file 
                if(move_uploaded_file($this->getTempPath(), $target_path)) {
                        // Success
                        // Save a corresponding entry to the database
                if($this->updateAll()) {
                 // We are done with temp_path, the file isn't there anymore
                 $myTempPath = $this->getTempPath();
                 unset($myTempPath);
                 return true;
                }
                } else {
                 // File was not moved.
                $this->errors[] = "The file upload failed, possibly due to incorrect permissions on the upload folder.";
                return false;
                }
        }        

        //5. Remove an image
         /**Delete Image */
         public function destroy_img($id){
                #Target path
                $target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
                $service=$this->getServiceByID($id);
                //remove image first from targe path
                if(unlink($target_path.$service['pic_name'])){     
                $this->deleteService($service['service_id']);
        
                }else{
                //database delete failed
                return false;
                $this->error[] = "Delete failed";
                //echo "Delete Failed";
            }



  }


}




?>