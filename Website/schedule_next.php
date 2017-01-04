<html>
 <body>
  <h3>Bus schedule</h3>
  <br><table border=1> <tr> <th> Start time</th> <th> Started time </th> <th> End time </th> <th> Bus No</th> <th> Track </th> </tr>
  
<?php
 $con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");
 if (mysqli_connect_errno($con))
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 $froms = $_POST['froms'];
 $tos = $_POST['tos'];

 $sql = "SELECT starttime, startedtime, endtime, busno, latitude, cid, did FROM schedule where froms='$froms' and tos='$tos'";
 $result = mysqli_query($con,$sql) or die(mysql_error());

 while ($array = mysqli_fetch_array($result)) 
 {
  $starttime = $array['starttime'];
  $startedtime = $array['startedtime'];
  $endtime = $array['endtime'];
  $busno=$array['busno'];
  $latitude = $array['latitude'];
  $cid = $array['cid'];
  $did = $array['did'];
 ?>
  <tr> <td> <? echo $starttime; ?> </td> <td> <? echo $startedtime; ?> <td> <? echo $endtime;?> </td> <td> <? echo $busno; ?> </td>  
 <?
 if($latitude==null)
  {
   echo "NA";
  }
  else
  {  
   ?>
   <br><td>
   <form action="locate_driver.php" method="POST">
     <input type="hidden" name="did" value="<? echo $did; ?>">
     <input type="submit" value="Track">
   </form> </td> </tr>
  <? 
  /* $cookie_name = "did";
  $cookie_value = $did;
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  echo "<a href=http://bustracking.site50.net/locate_driver.php>Track</a>"; */ 
  }
 }
 ?> </td>
 
</table>

</body>
</html>
