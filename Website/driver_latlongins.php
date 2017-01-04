<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET['id'];
$lat=$_GET['latitude'];
$long=$_GET['longitude'];
echo $id;
mysqli_query($con,"update schedule set latitude='$lat',longitude='$long' where did='$id'");
mysqli_query($con,"update driver set latitude='$lat',longitude='$long' where id='$id'");
mysqli_close($con);
?>