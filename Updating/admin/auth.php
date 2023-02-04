<?php 
    session_start();
    if(!($_SESSION['admin_email'])){
        header('Location: admin-login.php');
        exit;
    }
?>