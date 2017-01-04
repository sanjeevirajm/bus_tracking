<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_COOKIE["cid"];
$message= $_GET['msg'];
$npersons= $_GET['npersons'];
mysqli_query($con,"update conductor set message='$message' where id=$id ");
mysqli_query($con,"update conductor set noofpassengers ='$npersons' where id=$id ");
mysqli_query($con,"update schedule set noofpassengers ='$npersons' where cid=$id ");
$result = mysqli_query($con,"select message from conductor where id=$id ");
$row = mysqli_fetch_array($result);
 echo "<br>";
 echo "Your message : <b>";
 //echo $message;  echo "<br>";
 echo $row[0];
 echo " </b>was sent"; 
$result = mysqli_query($con,"select noofpassengers from conductor where id=$id ");
$row = mysqli_fetch_array($result);
 echo "<br>";
 echo "Number of persons : <b>";
 //echo $npersons;  echo "<br>";
 echo $row[0];
 echo " </b>was sent"; 

echo "<br><a href=http://bustracking.site50.net/track_conductor.html> Back </a>";

mysqli_close($con);

/*old

php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_COOKIE["cid"];
$message= $_GET['msg'];
$npersons= $_GET['npersons'];
mysqli_query($con,"update conductor set message='$message', noofpersons=$npersons where id=$id ");
mysqli_query($con,"update schedule set message='$message', noofpersons=$npersons where cid=$id ");
$result = mysqli_query($con,"select message, noofpersons from conductor where id=$id ");

if($array = mysqli_fetch_array($result)) 
 {
  $m = $array['message'];
  $n = $array['noofpersons'];

 //$message = $array['message'];
 //$npersons = $array['noofpersons'];
}

 echo "<br>";
 echo "Your message : <b>";
 echo $m;  echo "<br>";
 echo " </b>was sent <br>"; 
 echo "No of persons : <b>";
 echo $n;  echo "<br>";
 echo " </b>was sent <br>"; 

echo "<br><a href=http://bustracking.site50.net/track_conductor.html> Back </a>";

mysqli_close($con);*/
?>