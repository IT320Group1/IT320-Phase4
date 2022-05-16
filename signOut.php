<?php 

session_start();

session_unset();

session_destroy();
echo "<script>alert('loged out successfully');</script>";
header("Location: login.php");

