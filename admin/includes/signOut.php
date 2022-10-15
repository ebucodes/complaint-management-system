<?php
session_start();
$_SESSION['adminID'] = false;
session_destroy();
header("location:../index.php");
?>