<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

if(isset($_GET['del']))
{
mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-products.php'</script>";
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
        <title>Shopping Portal | Manage Products</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Products Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Product Name</th>
                                            <th>vehicle type</th>
                                            <th>brand </th>
                                            <th>model series </th>
                                            <th>model</th>
                                            <th>price</th>
                                            <th>product availability</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>#</th>
                                            <th>Product Name</th>
                                            <th>vehicle type</th>
                                            <th>brand </th>
                                            <th>model series </th>
                                            <th>model</th>
                                            <th>price</th>
                                            <th>product availability</th>
                                            <th>Creation date</th>
                                            <th>Last Updated</th>
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
$query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productName,products.productPrice,products.productAvailability,vehicletype.vehicleName,brand.brandName as brandname,modalseries.modelseriesName as modelseriesname,model.modelName as modelname, products.postingDate,products.updationDate,vehicletype.id as vehicleid,tbladmin.username from products join vehicletype on products.vehiceltypeid=vehicletype.id join brand on products.brandid=brand.id join modalseries on products.modelseriesid= modalseries.id join model on products.modelid= model.id join tbladmin on tbladmin.id=products.addedBy order by pid desc");
$cnt=1;
while($row=mysqli_fetch_assoc($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <!-- <td><img src="productimages/<?php echo htmlentities($row['productImage1']);?>" width="120"></td> -->

                                               <td> <?php echo htmlentities($row['productName']);?></td>
                                            <td><?php echo htmlentities($row['vehicleName']);?></td>
                                            <td><?php echo htmlentities($row['brandname']);?></td>
                                            <td><?php echo htmlentities($row['modelseriesname']);?></td>
                                            <td><?php echo htmlentities($row['modelname']);?></td>
                                            <td><?php echo htmlentities($row['productPrice']);?></td>
                                            <td><?php echo htmlentities($row['productAvailability']);?></td>    
                                            <td> <?php echo htmlentities($row['postingDate']);?></td>
                                            <td><?php echo htmlentities($row['updationDate']);?></td>
                                            <td><?php echo htmlentities($row['username']);?></td>
                                            <td>
                                            <a href="edit-product.php?id=<?php echo $row['pid']?>"><i class="fas fa-edit"></i></a> | 
                                            <a href="manage-products.php?id=<?php echo $row['pid']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
