<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$old = $_POST['old'];
$new = $_POST['new'];
$result=mysqli_query($con,"select password from admin");
$row=mysqli_fetch_array($result);
if($old==$row[0])
{
$result = mysqli_query($con,"update admin set password=$new");
$result = mysqli_query($con,"select password from admin");
$row = mysqli_fetch_array($result);
if($row[0]==$new)
{
 echo "Password changed";
 echo "<br>";
 echo "New password is ";
 echo $new;
}
else
{
	echo "Error occured";
}
}
else
{
echo "Password does not matched";
}
mysqli_close($con);
?>