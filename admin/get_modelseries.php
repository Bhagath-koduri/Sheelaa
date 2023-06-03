<?php
include('includes/config.php');
if(!empty($_POST["brand_id"])) 
{
 $id=intval($_POST['brand_id']);


$query=mysqli_query($con,"SELECT * FROM modalseries WHERE brandid=$id");
?>
<option value="">Select Model Series</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['modelseriesName']); ?></option>
  <?php
 }
}
?>