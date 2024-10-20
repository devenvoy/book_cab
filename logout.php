<?php
session_start();
unset($_SESSION['useremail']);
header('location:login.php');
?>