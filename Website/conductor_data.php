<html>
<body>
<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql = "SELECT * FROM schedule";
$result = mysqli_query($con,$sql) or die(mysql_error());
//$id=$_COOKIE["did"];
?>

<form action="conductor_valid.php" method="post">
  From : 
<select name="froms" id="froms">

<?
$sql = "SELECT DISTINCT froms FROM schedule";
$result = mysqli_query($con,$sql) or die(mysql_error());

while ($array = mysqli_fetch_array($result)) 
{
 $froms = $array['froms'];
?>

<option value="<?=$froms?>" selected="<?=$froms?>"><?=$froms?>  <?}?>

</select><br>

<br>To : 
<select name="tos" id="tos">
<?
$sql = "SELECT DISTINCT tos FROM schedule";
$result = mysqli_query($con,$sql) or die(mysql_error());

while ($array = mysqli_fetch_array($result)) 
{
 $tos = $array['tos'];
?>

<option value="<?=$tos?>" selected="<?=$tos?>"><?=$tos?>  <?}?>

</select><br>

<br>Bus No  : 
<select name="busno" id="busno">
<?
$sql = "SELECT busno FROM schedule";
$result = mysqli_query($con,$sql) or die(mysql_error());

while ($array = mysqli_fetch_array($result)) 
{
 $busno= $array['busno'];
?>

<option value="<?=$busno?>" selected="<?=$busno?>"><?=$busno?>  <?}?>

</select><br>

<br>Time : 
<select name="starttime" id="starttime">
<?$sql = "SELECT * FROM schedule";
$result = mysqli_query($con,$sql) or die(mysql_error());

while ($array = mysqli_fetch_array($result)) 
{
 $starttime = $array['starttime'];
?>

<option value="<?=$starttime?>" selected="<?=$starttime?>"><?=$starttime?>  <?}?>

</select><br>

<br>Started Time(HH-MM-SS):<br><input type="text" name="startedtime" id="startedtime">

<br><input type="submit" value="Submit">
</form>
<?
mysqli_close($con);
?>

</body>
</html>