<?php
    $title='Success';
    require_once 'include/header.php';
    require_once 'db/conn.php';
    
    if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $dob = $_POST['dob'];
      $speciality = $_POST['speciality'];
      $contact = $_POST['phnum'];
      $email = $_POST['email'];
    

      $orig_file = $_FILES["avatar"]["tmp_name"];
      $ext=pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      $target_dir = 'uploads/';
      $destination = "$target_dir$contact.$ext";
      move_uploaded_file($orig_file, $destination);

      echo '<br>';
      $issuccess = $crud->insertuser($fname,$lname,$dob,$contact,$email,$speciality,$destination);
      if($issuccess){
        include "include/successmsg.php";
      }else{
        include "include/errormsg.php";
      }
    
    }

?>

<h1 class='text-center text-success'>You have registered successfully</h1>


<!-- 

// This code sent the data using GET method    

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php // echo $_GET['fname'].' '.$_GET['lname'];?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php// echo $_GET['speciality'];?></h6>
    <p3> Dob: <?php //echo $_GET['dob'];?></p3><br>
    <p3> Email: <?php //echo $_GET['email'];?></p3>
  </div>
</div>
 
-->

<img class="rounded-circle" src="<?php echo $destination; ?>" style="width: 20%; height: 20%;" alt="avatar">

<div class="card" style="width: 18rem; margin: auto;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['fname'].' '.$_POST['lname'];?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $_POST['speciality'];?></h6>
    <p3> Dob: <?php echo $_POST['dob'];?></p3><br>
    <p3> Email: <?php echo $_POST['email'];?></p3><br>
    <p3> Contact Number: <?php echo $_POST['phnum'];?></p3>
  </div>
</div>

<div id='footer' class='text-center'>
        <?php echo'Copyright 20'.date('y'); ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>   
<script>
  $( function() {
    $( "#dob" ).datepicker();
  } );
  </script> 
</body>
</html>