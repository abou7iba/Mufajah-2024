<?php
include 'db.php';

$post_id = $_GET['post_id'];  // يجب أن يأتي من المستخدم
$user_id = $_COOKIE['user_id'];

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$sql = "INSERT INTO favorites (post_id, user_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$post_id, $user_id]);

header('location: ../index.php');


?>
