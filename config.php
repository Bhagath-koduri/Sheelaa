<?php

define('DB_SERVER','localhost:3301');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'sheelaa_db');


// define('DB_SERVER','localhost');
// define('DB_USER','u406176785_updatd_ozz_use');
// define('DB_PASS' ,'+xBNC|e8D[6');
// define('DB_NAME', 'u406176785_updatd_ozz_db');


$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>