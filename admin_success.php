<?php
    $title='Admin Success';
    require_once 'include/header.php';
    require_once 'db/conn.php';
    
    if(isset($_POST['submit'])){

      //extract values from the $_POST array
      $adminname = $_POST['admin_name'];
      $adminemail = $_POST['admin_email'];
      $adminpassword = $_POST['admin_password'];
      
      $issuccess = $crud->insertadmin($adminname, $adminemail,  $adminpassword);
      if($issuccess){
        include "include/successmsg.php";
      }else{
        include "include/errormsg.php";
      }
    
    }
    
?>
<h1 class='text-center text-success'>Admin registered successfully</h1>

<a class="btn btn-info" href="login.php">Login</a>

