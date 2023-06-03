<?php
include('includes/config.php');
if(!empty($_POST["modelseries_id"])) 
{
 $id=intval($_POST['modelseries_id']);


$query=mysqli_query($con,"SELECT * FROM model WHERE modelseriesid=$id");
?>
<option value="">Select Model</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['modelName']); ?></option>
  <?php
 }
}
?>