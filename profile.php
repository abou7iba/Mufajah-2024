<?php
include 'include/db.php';

if(isset($_COOKIE['user_id'])){
  $user_id = $_COOKIE['user_id'];
}else{
  $user_id = '';
  header('location: user/login.php');
}
include 'include/header.php';
$page_name = $user_id;
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$sql = "INSERT INTO visits (page_name, visitor_ip) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$page_name, $visitor_ip]);

$select_visit = $conn->prepare("SELECT COUNT(*) AS visit_count FROM visits WHERE page_name = ?");
$select_visit->execute([$page_name]);
  if($select_visit->rowCount() > 0){
    while($fetch_visit = $select_visit->fetch(PDO::FETCH_ASSOC)){  
    $visit_count = $fetch_visit['visit_count'];
}}


?>
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/popup.css">
    <link rel="stylesheet" href="./style.css">
    <main>
    <div class="profile-header">
    <?php
        $select_user = $conn->prepare("SELECT * FROM users WHERE id = ? ");
        $select_user->execute([$user_id]);
        if($select_user->rowCount() > 0){
        while($user = $select_user->fetch(PDO::FETCH_ASSOC)){
            $name = $user['name'];
            $username = $user['username'];
            $birth_of_date = $user['birth_of_date'];
            $img = $user['img'];
            $phone = $user['phone'];
            $cr_at_date = $user['cr_at_date'];
            $twitter = $user['twitter'];
            $instagram = $user['instagram'];
            $linkedin = $user['linkedin'];
            $whatsapp = $user['whatsapp'];
            $github = $user['github'];
            $behance = $user['behance'];
    ?>
    <div class="profile-img">
        <img src="up_file/<?= $img ?>" alt="">
        <i onclick="document.getElementById('changeImg').style.display='block'"
        class="fa-solid fa-camera"></i>
  
        
        <div id="changeImg" class="modal">
        <span onclick="document.getElementById('changeImg').style.display='none'"
        class="close" title="Close Modal">&times;</span>

        <form method="post" class="modal-content animate" action="include/edit.php" enctype="multipart/form-data">
 <br><br>
        <h2>اختر صوره</h2>
        <input type="file" placeholder="" value=""  name="image" accept="image/*" >
        <br><br>
        <input type="submit" class="button" value="تغيير" name="user_ch_img" id="btnlog">
        
        <button type="button" onclick="document.getElementById('changeImg').style.display='none'" 
        class="cancelbtn">إغلاق</button>
        </div>
    </form>
</div>
        
        <a href="edit_profile.php" class="edit">
            <i class="fa-solid fa-edit"></i>
        </a>

        <h3><?= $name ?></h3>
        <h5 class="username" ><?php            if($username == '' ) {
                echo '';
            }else{
                echo  $username;
            } ?></h5>
        <div class="profile-social">

            <?php 
            if($whatsapp == '' ) {
                echo '';
            }else{
                echo '<a href="https://wa.me/'. $whatsapp . '"><i class="fab fa-whatsapp"></i></a>';
            }
            
            if($instagram == '' ) {
                echo '';
            } else{
                echo '<a href="#"><i class="fab fa-instagram"></i></a>';
            }
            
            if($twitter == '' ) {
                echo '';
            } else{
                echo '<a href="#"><i class="fab fa-twitter"></i></a>';
            }
            
            if($linkedin == '' ) {
                echo '';
            } else{
                echo '<a href="#"><i class="fab fa-linkedin"></i></a>';
            }
            
            if($github == '' ) {
                echo '';
            } else{
                echo '<a href="#"><i class="fab fa-github"></i></a>';
            }
            
             if($behance == '' ) {
                echo '';
            } else{
                echo '<a href="#"><i class="fab fa-behance"></i></a>';
            }
            ?>

        </div>
        <span>
            <?php
            if($birth_of_date == '' ) {
                echo '';
            } else{
                echo $birth_of_date. " &nbsp;";
                echo  '<i class="fa-solid fa-calendar-alt"></i> &nbsp;&nbsp';
            }
           
            ?>
            
        </span>

        <?php }} ?>
    </div>
    <div class="account-info">
        <div class="info">
          <?php
          $select_message_count = $conn->prepare("SELECT COUNT(*) AS message_count FROM message WHERE message_to = ?");
          $select_message_count->execute([$phone]);
            if($select_message_count->rowCount() > 0){
              while($fetch_message_count= $select_message_count->fetch(PDO::FETCH_ASSOC)){  
              $message_count = $fetch_message_count['message_count'];
          }}

          ?>
            <h4> <i class="fa-solid fa-envelope-open-text"></i>  <span><?= $message_count ?></span> </h4>
        </div>
        <div class="info">
        <h4> <i class="fa-solid fa-eye"></i> <span><?= $visit_count ?></span> </h4>
        </div>
        <!-- <div class="info">
        <h4><i class="fa-solid fa-dollar-sign"></i> <span>566</span> </h4>
        </div> -->
        
    </div>

    

<?php  include 'include/footer.php'; ?>