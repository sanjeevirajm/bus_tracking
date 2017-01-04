<?php
$did = $_POST[did];
//echo $did; echo "<br>";
//echo "Hello"; echo "<br>";

$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT busno, latitude, longitude, noofpassengers FROM schedule where did=$did";
    $result = mysqli_query($con,$sql) or die(mysql_error());

    while ($array = mysqli_fetch_array($result)) 
    {
     $busno=$array['busno'];
     echo "<b> Bus No : ";
     echo $busno; echo "<br>";
     $lat = $array['latitude'];
     echo "Latitude        : ";
     echo $lat; echo "<br>";
     $long=$array['longitude'];
     echo "Longitude        : ";
     echo $long; echo "<br>";
     $nop=$array['noofpassengers'];
     echo "<b> No of passengers : ";
     echo $nop; echo "<br>";
     

    }

?>

<!DOCTYPE html>
<html>
<body onload="sp()">

<p id="demo"></p>

<form action="locate_driver.php" method="POST">
     <input type="hidden" name="did" value="<? echo $did; ?>">
     <input type="submit" value="Refresh">
</form> 

<div id="mapholder"></div>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script>
var x = document.getElementById("demo");

function sp() {
    lat = <? echo $lat; ?>;
    lon = <? echo $long; ?>;
    latlon = new google.maps.LatLng(lat, lon)
    mapholder = document.getElementById('mapholder')
    mapholder.style.height = '320px';
    mapholder.style.width = '270px';

    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    
    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,title:"Bus is here!"});
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
</script>

</body>
</html>
