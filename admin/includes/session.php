<?php
include("config.php");
session_start();
//Query to store session
if (!isset($_SESSION["adminID"])) {
	header("location:../index.php");
} else {
	$session_id = $_SESSION['adminID'];
	$session_query = ("SELECT * FROM admin WHERE adminID = '$session_id'") or die(mysqli_errno($conn));
	$session_result = mysqli_query($conn, $session_query);
	$admin_info = mysqli_fetch_array($session_result);
}
