<?php
include 'include/db.php';
include 'include/header.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = 0;
}

?>
<main>
    <br>
      <h4 class="my-message"> ارسال رساله </h4>
      <p style="text-align: center ; color: #0B60B0;" >
      😍 سيب بصمة في حياة الغير
      </p>
      <div class="message">
        <form action="include/insert.php" method="post">
            <input type="text" required name="message_to" id="txtinpt" dir="rtl"
             placeholder=" سيب رقم الشخص اللي عايز تسيبله رساله هنا ... 📞" required>
            <textarea required name="message" id="txtmessage" dir="rtl" 
            placeholder="سيبله رساله دلوقتي وفرحه ... 😍 "></textarea>
            <input type="submit" class="button" value=" 🚀 يلا نبعت  " name="btnmessage" id="btninpt">
        </form>
      </div>

<?php  include 'include/footer.php'; ?>
