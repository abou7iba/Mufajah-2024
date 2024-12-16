<?php
include 'include/db.php';

if(isset($_COOKIE['user_id'])){
  $user_id = $_COOKIE['user_id'];
}else{
  $user_id = '';
  header('location: user/login.php');
}
include 'include/header.php';

$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? ");
$select_user->execute([$user_id]);
if($select_user->rowCount() > 0){
  while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){  
  $my_phone = $fetch_user['phone'];
}}

?>

    <main>
      <div class="copy-link">
        <input
          type="text"
          name=""
          id="inptocopy"
          value="http://abouhiba.dx.am/meot.php?"
        />
        <button id="btnCopy">نسخ الرابط الخاص بي</button>
      </div>

      <h4 class="my-message">رسائل جديده</h4>
      <div class="messages">
      <div class="messages">
        <?php

            $select_message = $conn->prepare("SELECT * FROM `message` WHERE message_to = ?  ");
            $select_message->execute([$my_phone]);
            if($select_message->rowCount() > 0){
              while($fetch_content = $select_message->fetch(PDO::FETCH_ASSOC)){  
                $message = $fetch_content['message'];
                $message_from = $fetch_content['message_from'];
                $message_to = $fetch_content['message_to'];
                $date = $fetch_content['cr_at_date'];
                $time = $fetch_content['cr_at_time'];

            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? ");
            $select_user->execute([$message_from]);
              if($select_user->rowCount() > 0){
                while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){  
                $user_name = $fetch_user['name'];

 
            
        ?>
        <div class="message">
          <div class="message-header">
          <div class="user-info">
            <span class="user-time"><?= $date  ?></span>
            <span class="user-name"><?= $user_name  ?> </span>
            <span class="user-time"><?= $time  ?></span>
            </div>
          </div>

          <div class="message-content">
            <p><?= $message ?> </p>
          </div>
          <div class="message-footer">
            <a href="#"><i class="fa-solid fa-circle-arrow-up"></i></a>
            <a href="#"><i class="fa-solid fa-circle-arrow-down"></i></a>
            <a href="#"><i class="fa-regular fa-comment"></i></a>
            <a href="#"><i class="fa-solid fa-share-from-square"></i></a>
          </div>
        </div>
      </div>
      <?php }}  }}  ?>
      </div>
<?php  include 'include/footer.php'; ?>