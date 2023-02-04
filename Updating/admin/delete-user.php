<?php
include('../connect.php');
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE user_id = '$id'";
$run = mysqli_query($conn,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>