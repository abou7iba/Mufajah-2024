<?php
    include 'include/db.php';
    
    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
        header('location: user/login.php');
    }
    include 'include/header.php';
?>
    <title>تعديل البيانات</title>
    <link rel="stylesheet" href="./user/login.css">

    <?php
        $select_user = $conn->prepare("SELECT * FROM users WHERE id = ? ");
        $select_user->execute([$user_id]);
        if($select_user->rowCount() > 0){
        while($user = $select_user->fetch(PDO::FETCH_ASSOC)){
            $name = $user['name'];
            $username = $user['username'];
            $birth_of_date = $user['birth_of_date'];
            $phone = $user['phone'];
            $cr_at = $user['cr_at_date'];
            $twitter = $user['twitter'];
            $instagram = $user['instagram'];
            $linkedin = $user['linkedin'];
            $whatsapp = $user['whatsapp'];
            $github = $user['github'];
            $behance = $user['behance'];
    ?>
        <form class="form"  method="post" action="include/edit.php" dir="rtl" enctype="multipart/form-data" >
        <h2 class="hello">تعديل البيانات </h2>

            <input id="txtinpt" type="text" placeholder="الاسم" value="<?= $name ?>" name="name" >
            <input id="txtinpt" type="text" placeholder="اسم المستخدم" value="<?= $username ?>"  name="username"  >
            <input id="txtinpt" type="date" placeholder="" value="<?= $birth_of_date ?>"  name="birth_of_date" >
            <input id="txtinpt" type="text" placeholder="رقم الموبايل" value="<?= $phone ?>"  name="phone" >
            <input id="txtinpt" type="text" placeholder="رقم الواتساب" value="<?= $whatsapp ?>"  name="whatsapp" >

            <input type="submit" class="button" value="تعديل" name="user_edit" id="btninpt">
        </form>
        <br><br><br>

    <?php }} ?>

    

    <?php include 'include/footer.php';?>