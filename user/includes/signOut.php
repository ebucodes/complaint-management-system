<?php
session_start();
$_SESSION['userID'] = false;
session_destroy();
header("location:../index.php");
?>