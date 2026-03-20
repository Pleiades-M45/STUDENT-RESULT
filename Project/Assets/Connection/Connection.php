<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="algo_results";

// Create connection
$con = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$con) // if( $con === false )
{
  die("Connection failed: ".mysqli_connect_error());
}
//echo "Connected Successfully<br>"." Host info: ".mysqli_get_host_info($con);


//mysqli_close($con);
?>