<?php
    $title='Index';
    require_once 'include/header.php';
    require_once 'db/conn.php';

    $result = $crud->getspecialities();

?>

<h1 class='text-center'>Registration</h1>
<form method='post' action="success.php">
  <div class="mb-3 gx-5">
    <label for="fname" class="form-label">First Name</label>
    <input  required type="text" class="form-control" id="fname" name="fname">
  </div>
  <div class="mb-3">
    <label for="lname" class="form-label">Last Name</label>
    <input required type="text" class="form-control" id="lname" name='lname'>
  </div>
  <div class="mb-3">
    <label for="dob" class="form-label">Date of birth</label>
    <input required type="text" class="form-control" id="dob" name='dob'>
  </div>
  <div class="mb-3">
    <label for="speciality" class="form-label">Speciality</label>
    <select required class="form-control" id="speciality" name='speciality'>
      <?php
        while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $r['speciality_id']; ?>"><?php echo $r['speciality_name']; ?></option>
        
        <?php }?>
      ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="phnum" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="phnum" name='phnum'>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input required type="email" class="form-control" id="email" name='email' aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>


    <div class='mb-3 d-grid gap-2'>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
</form>


<?php require_once 'include/footer.php';?>