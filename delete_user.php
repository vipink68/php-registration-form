<?php
    $title='Delete user';
    
    include_once 'include/auth_check.php';
    require_once 'db/conn.php';
    if(!$_GET['id']){
        include 'include/errormsg.php';
        header("Location: view_records.php");
    } else{
        //get id value
        $id = $_GET['id'];

        //Call Delete function
        $result = $crud->deleteuser($id);


        //Redirect to list
        if($result)
        {
            header("Location: view_records.php");
        } else{
            echo 'err';
        }
    }
    ?>
