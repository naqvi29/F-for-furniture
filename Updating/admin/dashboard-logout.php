<?php
session_start();
unset($_SESSION["admin_logged"]);
unset($_SESSION["admin_email"]);
header('Location: admin-login.php');
?>