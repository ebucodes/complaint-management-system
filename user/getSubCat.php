<?php
include('includes/config.php');
if(!empty($_POST["subID"])) 
{
 $id=intval($_POST['subID']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($conn,"SELECT subcategoryName FROM subcategory WHERE categoryID ='$id'");
 ?><option hidden>Select Subcategory </option><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['subcategoryName']); ?>"><?php echo htmlentities($row['subcategoryName']); ?></option>
  <?php
 }
}

}
?>
