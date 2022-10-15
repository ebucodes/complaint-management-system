<?php 
include("../includes/config.php");

$id = $_GET["id"];
$query = "DELETE FROM faculty WHERE facultyID = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header('location: index.php');
}
else {
    echo "ERROR";
}

?>
