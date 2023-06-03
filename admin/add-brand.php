<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

//For Adding categories
if(isset($_POST['submit']))
{
$brandname =$_POST['brandname'];
$createdby=$_SESSION['aid'];
$vehicleid =$_POST['vehicleName'];
$sql=mysqli_query($con,"insert into brand(vehicleid,brandName,createdBy) values('$vehicleid','$brandname','$createdby')");
echo "<script>alert('Brand added successfully');</script>";
echo "<script>window.location.href='manage-brands.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ozz One| Add brand</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Brand</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Brand</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post"> 

<div class="row" >
<div class="col-2">Vehicle Type Name</div>
<div class="col-4">
<select name="vehicleName" id="vehicleName" class="form-control" required>
<option value="">Select vehicleName</option> 
<?php $query=mysqli_query($con,"select * from vehicletype");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['vehicleName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Brand Name</div>
<div class="col-4"><input type="text" placeholder="Enter Brand Name"  name="brandname" class="form-control" required></div>
</div>

<!-- <div class="row" style="margin-top:1%;">
<div class="col-2">Category Description</div>
<div class="col-4"><textarea placeholder="Enter category Name"  name="description" class="form-control" required></textarea></div>
</div> -->

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
</div>

</form>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        
    </body>
</html>
<?php } ?>
