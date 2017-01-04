<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_COOKIE["cid"];
$froms = $_POST['froms'];
$tos = $_POST['tos'];
$starttime = $_POST['starttime'];
$startedtime = $_POST['startedtime'];

/*echo $id; used for verification
echo "<br>";
echo $froms;
echo "<br>";
echo $tos;
echo "<br>";
echo $starttime;
echo "<br>";
echo $startedtime;
echo "<br>";
*/


$sql = "SELECT routeno,tripno FROM schedule where froms='$froms' and tos='$tos' and starttime='$starttime' and busno='$busno' ";
$result = mysqli_query($con,$sql) or die(mysql_error());

while ($array = mysqli_fetch_array($result)) 
{
 $routeno = $array['routeno'];
 $tripno = $array['tripno'];
 //echo $routeno; used for verification
 //echo $tripno;
}

if($routeno!=null)
{
$sql = "update conductor set froms='$froms', tos='$tos',busno='$busno', time='$starttime', routeno='$routeno', tripno='$tripno', startedtime='$startedtime' where id='$id' ";
$result = mysqli_query($con,$sql) or die(mysql_error());

$sql = "update schedule set startedtime='$startedtime', cid='$id' where routeno='$routeno' and tripno='$tripno' ";
$result = mysqli_query($con,$sql) or die(mysql_error());

echo "<br>";echo "DATA INSERTED"; echo "<br>";
echo "<a href='http://bustracking.site50.net/track_conductor.html'> Start tracking</a>";
}
else
{
	echo "Error occured";
}

?>