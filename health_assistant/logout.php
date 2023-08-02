<?php
session_start();
 session_destroy() ;
unset($_SESSION['loginid1']);
unset($_SESSION['id1']);
header("Location:home.php");
?>