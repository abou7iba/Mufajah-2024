<?php
include 'db.php';

if(isset($_COOKIE['user_id'])){
$user_id = $_COOKIE['user_id'];
}else{
$user_id = '';
header('location: ../user/login.php');
}
    // edit user
if(isset($_POST['user_edit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    $phone = $_POST['phone'];
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);

    $birth_of_date = $_POST['birth_of_date'];
    $birth_of_date = filter_var($birth_of_date, FILTER_SANITIZE_STRING);
   

    $whatsapp = $_POST['whatsapp'];
    $whatsapp = filter_var($whatsapp, FILTER_SANITIZE_STRING);


    $update_user = $conn->prepare("UPDATE users SET name = ? , username = ? , phone = ? , birth_of_date = ?  ,  whatsapp = ? WHERE id = ? ");
    $update_user->execute([$name, $username , $phone  , $birth_of_date  , $whatsapp , $user_id ]);

    header('location: ../profile.php');

}
if(isset($_POST['user_ch_img']) ){

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = $user_id.'.'.$ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../up_file/'.$rename;

    $update_img= $conn->prepare("UPDATE users SET img = ? WHERE id = ? ");
    $update_img->execute([ $rename , $user_id ]);
    move_uploaded_file($image_tmp_name, $image_folder);

    header('location: ../profile.php');

}

?>