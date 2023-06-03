<?php
include('includes/config.php');
if(!empty($_POST["vehicle_id"])) 
{
 $id=intval($_POST['vehicle_id']);


$query=mysqli_query($con,"SELECT * FROM brand WHERE vehicleid=$id");
?>
<option value="">Select Brand</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['brandName']); ?></option>
  <?php
 }
}
?>