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
if ($locationType == 'hist') {
    $locationType = "Historical Landmark";
}
if ($locationType == 'view') {
    $loctionType == 'Viewpoint';
}
if ($locationType == 'LOI') {
    $locationType = 'Location of Interest';
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
<h1 class='ui centered header'>
    Maps
</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class="ui container">
    <div class='ui grid'>
        <div class='two wide column'></div>
        <div class="twelve wide column">
            <header class='ui header'>
                <?php echo $locationName ?>
            </header>
            <div id="map" style="width: 100%; height: 350px"></div>
            <script>
                function initMap() {
                    var myLatLng = {lat: <?php echo $lat ?>, lng: <?php echo $long ?>};

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 4,
                        center: {lat: <?php echo $lat ?>, lng: <?php echo $long ?>}
                    });

                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        title: '<?php echo $locationName ?>'
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initMap">
            </script>

        </div>
    </div>
    <div class='two wide column'></div>
    <div class="ui grid">
        <div class='two wide column'></div>
        <div class="eight wide column">
            <h3>Description</h3>
            <p><?php echo $caption ?></p>
        </div>
        <div class='two wide column'></div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>
</html>