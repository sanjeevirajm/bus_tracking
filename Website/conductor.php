<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_POST[id];
$password = $_POST['password'];
$result = mysqli_query($con,"SELECT password FROM conductor where id=$id");
$row = mysqli_fetch_array($result);
if($row[0]!=$password)
{
echo "Enter correct username and password";

}
else
{
 echo "Login successful";
echo "<a href='http://bustracking.site50.net/conductor_data.php'> Touch here</a>";	
 $cookie_name = "cid";
 $cookie_value = $id;
 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
 
 if(!isset($_COOKIE[$cookie_name])) 
 {
   echo "Error occured, login again";
 }
 
}
mysqli_close($con);
?>