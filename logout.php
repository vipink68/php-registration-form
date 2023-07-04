<?php 
    require_once 'include/session.php';
?>

<?php 
session_destroy();
header('Location: index.php');  ?>