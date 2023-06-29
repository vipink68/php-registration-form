<?php
    $title='Edit record';
    require_once 'include/header.php';
    require_once 'db/conn.php';

    $result = $crud->getspecialities();
    
    
      if(!isset($_GET['id']))
      {
        include "include/errormsg.php";
        header("Location: viewrecords.php");
      } else{
        $id = $_GET['id'];
        $user = $crud->getuserdetails($id);

?>

<h1 class='text-center'>Edit Details</h1>

<form method='post' action="editpost.php">
    <input type="hidden" name='id' value=" <?php echo $user['user_id']?>"/>
  <div class="mb-3 gx-5">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fname" value="<?php echo $user['firstname']?>" name="fname">
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" value="<?php echo $user['lastname']?>" name='lname'>
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of birth</label>
    <input type="text" class="form-control" id="dob" value="<?php echo $user['dob']?>" name='dob'>
  </div>
  
  <div class="mb-3">
    <label for="speciality" class="form-label">Speciality</label>
    <select class="form-control" id="speciality" name='speciality'>
      <?php
        while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $user['speciality_id']?>"<?php if($r['speciality_id']==$user['speciality_id']) echo 'selected' ?>>
        <?php echo $r['speciality_name'] ?></option>
        
        <?php }?>
      ?>
    </select>
  </div>
  
  <div class="mb-3">
    <label for="phnum" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="phnum" value="<?php echo $user['phonenumber']?>" name='phnum'>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" value="<?php echo $user['email']?>" name='email' aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

    <div class='mb-3 d-grid gap-2'>
      <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
  </div>
  </div>
</form>
<?php } ?>

<?php require_once 'include/footer.php';?>