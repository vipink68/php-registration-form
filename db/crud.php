<?php
    class crud{
        private $db;
        function __construct($conn){
            $this->db = $conn;
        } 

        public function insertuser($fname,$lname,$dob,$contact,$email,$pswd,$speciality){
            try {
                $sql = "INSERT INTO registered_user (firstname,lastname,dob,phonenumber,email,user_password,speciality_id) 
                VALUES (:fname, :lname, :dob, :contact, :email, :pswd, :speciality)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':pswd',$pswd);
                $stmt->bindparam(':speciality',$speciality);

                $stmt->execute();
                return true;

            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function edituser($id,$fname,$lname,$dob,$contact,$email,$speciality){
            try {
                $sql = "UPDATE `registered_user` SET `firstname`=:fname,`lastname`=:lname,`dob`=:dob,`phonenumber`=:contact,`email`=:email,`speciality_id`=:speciality WHERE user_id = :id";
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