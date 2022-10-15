<?php 
include("../includes/config.php");

$id = $_GET["id"];
$query = "DELETE FROM department WHERE departmentID = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    header('location: index.php');
}
else {
    echo "ERROR";
}

?>
