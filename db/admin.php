<?php

class admin{
    //private database object
    private $db;
    
    //constructor to initialize private variable to the database connection
    function __construct($conn){
        $this->db = $conn;
    } 

    


    public function insertuser($username, $password){
        try {
            $result = $this->getuserbyusername($username);
            if($result['num'] > 0){
                return false;
            } else{
                $new_password = md5($password.$username);

                // define sql statement to be executed
                $sql = "INSERT INTO user (username,password) 
                VALUES (:username, :password)";
                
                //prepare the  sql statement for execution
                $stmt = $this->db->prepare($sql);
                
                //bind all placeholders to actual value
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$new_password);
                
                //execute statement
                $stmt->execute();
                return true;
            }
           

        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getuser($username,$password){
        try {
            $sql="SELECT * FROM user where username = :username and password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            $stmt->bindparam(':password',$password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getuserbyusername($username){
        try {
            $sql="SELECT count(*) as num FROM user where username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;

        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>