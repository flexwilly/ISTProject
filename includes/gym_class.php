<?php 
include('initialize.php');

class GymClass {
       protected $tableName = 'gymclass';
       private $id ;
       private $gym_class_name;
       private $gym_class_desc;
       private $trainer_id;
       private $dbConn;
       //image related data attributes
       private $filename;
       private $filesize;
       private $filetype;
       private $temp_path;
       protected $upload_dir = "images";
      
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

       //constructor
       public function __construct(){
         //constructor for service
         //create an instance of the DBConnect Class
         $db = new DBConnect();
         //open connection to the database
         $this->dbConn = $db->open_connection();
       }
  

          #Setters and Getters
          public function getId(){
            return $this->id;
          }

          public function setId($id){
            $this->id = $id;
          }

          public function getGym_class_name(){
            return $this->gym_class_name;
          }

          public function setGym_class_name($gym_class_name){
            $this->gym_class_name = $gym_class_name;
          }

          public function getGym_class_desc(){
            return $this->gym_class_desc;
          }

          public function setGym_class_desc($gym_class_desc){
            $this->gym_class_desc = $gym_class_desc;
          }

          public function getTrainerId(){
            return $this->trainer_id;
          }

          public function setTrainerId($trainer_id){
            $this->trainer_id = $trainer_id;
          }

    
    #End Setters and Getters
	
     //File related encapsulated functions
     public function setFileName($filename) { $this->filename = $filename; }
     public function getFileName() { return $this->filename; }

     public function setFiletype($filetype) { $this->filetype = $filetype; }
     public function getFiletype() { return $this->filetype; }
 
     public function setFileSize($filesize) { $this->filesize = $filesize; }
     public function getFileSize() { return $this->filesize; }
 
     public function setTempPath($temp_path) { $this->temp_path = $temp_path; }
     public function getTempPath() { return $this->temp_path; }
   
       
     //function to create a gym class
     public function create_gym_class(){
       try{
        $sql = 'INSERT INTO '.$this->tableName. ' VALUES(null, :gym_class_name, :gym_class_desc, :pic_name, :trainer_id)';
        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindParam(':gym_class_name',$this->gym_class_name);
        $stmt->bindParam(':gym_class_desc',$this->gym_class_desc);
        $stmt->bindParam(':pic_name',$this->filename);
        $stmt->bindParam(':trainer_id',$this->trainer_id);
        if($stmt->execute()){
          return true;
        }else{
          return false;
        }
       }catch(PDOException $e){
         echo $e->getMessage();
       }
     }

     //Update the text related to the image
     public function update_gym_class(){
        try{
            $sql = 'UPDATE '.$this->tableName. ' SET gym_class_name = :gym_class_name, gym_class_desc = :gym_class_desc, trainer_id = :trainer_id WHERE id = :id';
            $stmt = $this->dbConn->prepare($sql);
            $stmt->bindParam(':gym_class_name',$this->gym_class_name);
            $stmt->bindParam(':gym_class_desc',$this->gym_class_desc);
            $stmt->bindParam(':trainer_id',$this->trainer_id);
            $stmt->bindParam(':id',$this->id);

            if($stmt->execute()){
              return true;
          }else{
              return false;
          }
        }catch(PDOException $e){
          echo $e->getMessage();
        }
     }

     //Update the image name only
     public function update_img_only(){
      try{
        $sql = 'UPDATE '.$this->tableName. ' SET pic_name = :pic_name WHERE id = :id';
        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindParam(':pic_name',$this->filename);
        $stmt->bindParam(':id',$this->id);
        if($stmt->execute()){
          return true;
        }else{
          return false;
        }
      }catch(PDOException $e){
        echo $e->getMessage();
      } 
      

     }

     //Delete a class...
     public function delete_gym_class($gym_class_id){
        try{
          $sql = 'DELETE FROM '.$this->tableName . ' WHERE id = :id';  
          $stmt = $this->dbConn->prepare($sql);
          $stmt->bindParam(':id',$this->id);  
          if($stmt->execute(['id'=>$gym_class_id])){
            return true;
            }else{
                return false;
            } 

        }catch(PDOException $e){
          echo $e->getMessage();
        }
     }

     //View All Classes....
     public function view_all_classes(){
       try{
        $stmt = $this->dbConn->prepare('SELECT * FROM '.$this->tableName);
        $stmt->execute();
        //create a variable array that will hold all the associative array values retrieved from the Database
        $all_classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $all_classes;
       }catch(PDOException $e){
          echo $e->getMessage();
       }
     }


     //Function to geta a gym class by ID
     public function getGymClassById($custom_id){
      try{      
        $stmt = $this->dbConn->prepare('SELECT * FROM '.$this->tableName. ' WHERE id = :id');
        $stmt->execute(['id'=> $custom_id]);
        $single_class = $stmt->fetch();
        //return the row containing the id 
        return $single_class;
        }catch(PDOException $e){
                echo $e->getMessage();
        }
     }

     //Image Related Updates
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
                      if($this->create_gym_class()) {
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
               
              //4. Update existing image only
                public function update_img($id){
                      //get user by id
                      $service = $this->getGymClassById($id);  

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
                      if($this->update_img_only()) {
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
                        $gym=$this->getGymClassById($id);
                        //remove image first from targe path
                        if(unlink($target_path.$gym['pic_name'])){     
                        $this->delete_gym_class($gym['id']);
                
                        }else{
                        //database delete failed
                        return false;
                        $this->error[] = "Delete failed";
                        echo "Delete Failed";
                    }

                  }
  }
?>