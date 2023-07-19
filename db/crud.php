<?php
    class crud{
        private $db;
        function __construct($conn){
            $this->db = $conn;
        } 

        public function insertuser($fname,$lname,$dob,$contact,$email,$speciality,$avatar_path){
            try {
                $sql = "INSERT INTO registered_user (firstname,lastname,dob,phonenumber,email,speciality_id,avatar_path) 
                VALUES (:fname, :lname, :dob, :contact, :email, :speciality ,:avatar_path)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':speciality',$speciality);
                $stmt->bindparam(':avatar_path',$avatar_path);

                $stmt->execute();
                return true;

            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insertadmin($adminname, $adminemail, $adminpassword){
            try {
                
                $sql = "INSERT INTO admins (admin_name, admin_email, admin_password) VALUES (:adminname, :adminemail, :adminpassword)";
                $new_password = md5($adminpassword.$adminname);
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':adminname',$adminname);
                $stmt->bindparam(':adminemail',$adminemail);
                $stmt->bindparam(':adminpassword',$new_password);
                $stmt->execute();
                return true;
    
            } catch(PDOException $e) {
                echo "Error: ".$e->getMessage();
                return false;
            }
        }


        public function edituser($id,$fname,$lname,$dob,$contact,$email,$speciality){
            try {
                $sql = "UPDATE registered_user SET firstname = :fname, lastname = :lname, dob = :dob, phonenumber = :contact, email = :email, speciality_id = :speciality WHERE user_id = :id";

                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':speciality',$speciality);
    
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getusers(){

            try {
                $sql = "SELECT * FROM registered_user a inner join specialities s on a.speciality_id = s.speciality_id";
                $result = $this->db->query($sql);
                return $result;
    
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getuserdetails($id){
            try {
                $sql="SELECT * FROM registered_user a inner join specialities s on a.speciality_id = s.speciality_id where user_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
    
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
          
        }

        public function deleteuser($id){
           try {
            $sql = "DELETE FROM registered_user WHERE user_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
    
           } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
           
           
           
        }

        public function getspecialities(){

            try {
                $sql = "SELECT * FROM `specialities`;";
                $result = $this->db->query($sql);
                return $result;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
          
        }

    }

?>