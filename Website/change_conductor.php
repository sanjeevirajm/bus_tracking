<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_POST['id'];
$password = $_POST['password'];
$result = mysqli_query($con,"update conductor set password=$password where id=$id ");
$result = mysqli_query($con,"select password from conductor where id=$id ");
$row = mysqli_fetch_array($result);
if($row[0]==$password)
{
 echo "Password changed";
 echo "New password is ";
 echo $password;
}
else
{
	echo "Error occured";
}
mysqli_close($con);
?>