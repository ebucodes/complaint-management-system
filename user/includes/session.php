<?php
include("config.php");
session_start();
//Query to store session
if (!isset($_SESSION["userID"])) {
	header("location:../index.php");
} else {
	$session_id = $_SESSION['userID'];
	$session_query = ("SELECT * FROM user WHERE userID = '$session_id'") or die(mysqli_errno($conn));
	$session_result = mysqli_query($conn, $session_query);
	$user_info = mysqli_fetch_array($session_result);
}
