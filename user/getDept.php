<?php
include('includes/config.php');
if (!empty($_POST["deptID"])) {
    $id = intval($_POST['deptID']);
    if (!is_numeric($id)) {

        echo htmlentities("invalid industryid");
        exit;
    } else {
        $stmt = mysqli_query($conn, "SELECT departmentName FROM department WHERE facultyID ='$id'");
?>
        <option hidden>Select Department </option>
        <?php
        while ($row = mysqli_fetch_array($stmt)) {
        ?>
            <option value="<?php echo htmlentities($row['departmentName']); ?>">
                <?php echo htmlentities($row['departmentName']); ?>
            </option>
<?php
        }
    }
}
?>