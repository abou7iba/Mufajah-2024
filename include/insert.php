<?php

include 'db.php';
if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
    header('location: ../index.php');
}else{
    $user_id = 1;
}

if(isset($_POST['btnmessage'])){

   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $message_to = $_POST['message_to'];


    $insert_user = $conn->prepare("INSERT INTO `message`( message, message_from, message_to) VALUES(?,?,?)");
    $insert_user->execute([ $message, $user_id ,$message_to ]);

    header('location: ../index.php');
}