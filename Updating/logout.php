<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["useremail"]);
unset($_SESSION["usereid"]);
header("Location: index.php");
?>