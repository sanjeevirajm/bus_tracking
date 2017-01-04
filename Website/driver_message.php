<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_COOKIE["did"];
$message= $_GET['msg'];
mysqli_query($con,"update driver set message='$message' where id=$id ");
mysqli_query($con,"update schedule set message='$message' where did=$id ");
$result = mysqli_query($con,"select message from driver where id=$id ");
$row = mysqli_fetch_array($result);
 echo "<br>";
 echo "Your message : <b>";
 echo $message;  echo "<br>";
echo $row[0];
 echo " </b>was sent"; 

echo "<br><a href=http://bustracking.site50.net/track_driver.html> Back </a>";

mysqli_close($con);
?>