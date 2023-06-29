<?php
    $title='View Records';
    
    require_once 'include/header.php';
    require_once 'db/conn.php';

    $results = $crud->getusers();
?>
<table class="table">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Specialty</th>
        <th>Actions</th>
    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>

        <tr>
            <td><?php echo $r['user_id']?></td>
            <td><?php echo $r['firstname']?></td>
            <td><?php echo $r['lastname']?></td>
            <td><?php echo $r['speciality_name']?></td>
            <td>
                <a href="view.php?id=<?php echo $r['user_id']?>" class="btn btn-primary">View</a>
                <a href="edit.php?id=<?php echo $r['user_id']?>" class="btn btn-secondary">Edit</a>
                <a onclick="return confirm('Are you sure, you want to delete this user.')"; href="delete_user.php?id=<?php echo $r['user_id']?>" class="btn btn-danger">Delete User</a>
            </td>
        </tr>
    <?php  }?>
</table>



<br>
<br>
<br>
<?php require_once 'include/footer.php';?>