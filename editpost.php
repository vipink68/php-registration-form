<?php

    require_once 'db/conn.php';

//Get valuew from post operation
if(isset($_POST['submit'])){
    //extract values from the $_POST array
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $speciality = $_POST['speciality'];
    $contact = $_POST['phnum'];
    $email = $_POST['email'];


    //Call crud function
    $result = $crud->edituser($id,$fname,$lname,$dob,$contact,$email,$speciality);
    
    //Redirect to index.php
    if($result){
        header("Location: view_records.php");
    }else{
        echo 'error';
    }

} else{
    echo 'error';
}

?>