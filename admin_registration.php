<?php
    $title='Admin registration';
    require_once 'include/header.php';
    require_once 'db/conn.php';

    
?>
<div class="p-3">

  <h1 class="text-center p-3 ">Admin Registration</h1>
  <form  action="admin_success.php" method="post">
  <div class="mb-3">
    <label for="admin_name" class="form-label">Admin Name</label>
    <input required type="text" class="form-control" id="admin_name" name="admin_name">
  </div>
    <div class="mb-3">
      <label for="admin_email" class="form-label">Email address</label>
      <input required type="email" class="form-control" id="admin_email" name="admin_email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="admin_password" class="form-label">Password</label>
    <input required type="password" class="form-control" id="admin_password" name="admin_password">
  </div>
  <div class='mb-3 d-grid gap-2'>
    <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
</div>
  </form>

</div>
</div>


<?php require_once 'include/footer.php';?>