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
    <main>
        <br> 

      <h4 class="my-message"> الهدايا  <i class="fa-solid fa-child-reaching"></i> </h4>
      <br> 

  
        <div class="gift">

            <div class="gift-header">
                <div class="gift-count">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span>3</span>
                </div>
                <div class="gift-count">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <span>3</span>
                </div>
                <div class="gift-count">
                    <i class="fa-solid fa-hand-holding-hand"></i>
                    <span>3</span>
                </div>
                <div class="gift-count">
                    <i class="fa-solid fa-wine-glass"></i>
                    <span>3</span>
                </div>
            </div>
            <div class="gift-noti">
                <p>
                    ارسل اليك الاسم 5ج هديه  
                    <a href="#"><i class="fa-solid fa-eye"></i></a>
                </p>
            </div>
            <div class="gift-noti">
                <p>
                    ارسل اليك الاسم 5ج هديه  
                    <a href="#"><i class="fa-solid fa-eye"></i></a>
                </p>
            </div>
        </div>
<?php  include 'include/footer.php'; ?>