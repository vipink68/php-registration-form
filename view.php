<?php 
    $title = 'View Record';

    require_once 'include/header.php';
    require_once 'db/conn.php';


    // Get all users

    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please check details again and try again</h1>";

    } else{
        $id = $_GET['id'];
        $result = $crud->getuserdetails($id);

?>
<br>
<div class="card" style="width: 18rem; margin: auto;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $result['firstname'].' '.$result['lastname'];?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $result['speciality_name'];?></h6>
    <p3> Dob: <?php echo $result['dob'];?></p3><br>
    <p3> Email: <?php echo $result['email'];?></p3><br>
    <p3> Contact Number: <?php echo $result['phonenumber'];?></p3>
  </div>
</div>
<br>
<div class="container text-center">

  <a href="view_records.php" class="btn btn-info">Back to list</a>
  <a href="edit.php?id=<?php echo $result['user_id']?>" class="btn btn-secondary">Edit</a>
  <a onclick="return confirm('Are you sure, you want to delete this user.')"; href="delete_user.php?id=<?php echo $result['user_id']?>" class="btn btn-danger">Delete User</a>
</div>
          
<?php } ?>
<br>
<br>
<br>
<?php  require_once 'include/footer.php'?>