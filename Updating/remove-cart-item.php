<?php
    require ('connect.php');
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['userid'];
    $delete_query="DELETE FROM cart WHERE user_id = '$user_id' AND item_id = '$item_id'";
    $delete_query_result=mysqli_query($conn,$delete_query) or die(mysqli_error($conn));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>