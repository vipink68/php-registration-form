<?php
    $title='Delete user';
    
    require_once 'db/conn.php';
    if(!$_GET['id']){
        echo 'Error';
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
