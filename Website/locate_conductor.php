<html>
<body>

<p id="demo">Click the button to get position.</p>
<button onclick="sp()">Refresh</button>

<div id="mapholder"></div>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script>
var x = document.getElementById("demo");

function sp() 
{

<?php
$con=mysqli_connect("mysql4.000webhost.com","a1410105_admin","sanjeevi@busdb","a1410105_busdb");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id=100;
echo $100;
//$id=$_COOKIE["cid"];
$sql = "SELECT latitude,longitude FROM conductor where id=$id";
$result = mysqli_query($con,$sql) or die(mysql_error());

while ($array = mysqli_fetch_array($result)) 
{
 $lat = $array['latitude'];
 
 $long=$array['longitude'];
 
}

?>
    lat = <? echo $lat; ?>;
    lon =  <? echo $long; ?>;
    latlon = new google.maps.LatLng(lat, lon)
    mapholder = document.getElementById('mapholder')
    mapholder.style.height = '500px';
    mapholder.style.width = '350px';

    var myOptions = {
    center:latlon,zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
    mapTypeControl:false,
    navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    }
    
    var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
    var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
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
}<? mysqli_close($con); ?>
</script>

</body>
</html>
