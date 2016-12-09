<?php
session_start();
include("includes/dbconnect.php");
$locationID = $_POST['viewMap'];
$sql = "SELECT * FROM locations where locationID = '$locationID'";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $locationName = $row['locationName'];
    $lat = $row['latitude'];
    $long = $row['longitude'];
    $caption = $row['caption'];
    $locationType = $row['locationType'];
}
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>

    <script src="https://goportlethencs8.azurewebsites.net/semantic/dist/routeplot.js" type="text/javascript">
    </script>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css" rel="stylesheet" type="text/css">
    <title>Map Landing Page</title>
</head>
<body>
<header class='ui centered header'>
    Maps
</header>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class="ui container">
    <header class='ui header'>
        <?php echo $locationName ?>
    </header>
    <div class='ui grid'>
        <div class="sixteen wide column">
            <div id="map" style="width: 600px; height: 350px"></div>
            <script>
                function initMap() {
                    var myLatLng = {lat: <?php echo $lat ?>, lng: <?php echo $long ?>};

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: {lat: <?php echo $lat ?>, lng: <?php echo $long ?>}
                    });

                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        title: 'Hello World!'
                    });
                }

                function loadScript() {
                    var script = document.createElement("script");
                    script.type = "text/javascript";
                    script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize";
                    document.body.appendChild(script);
                }

                window.onload = loadScript;
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initMap">
            </script>

        </div>
    </div>
    <div class="ui grid">
        <div class="eight wide column">
            <h3>Description</h3>
            <p><?php echo $caption ?></p>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>
</html>