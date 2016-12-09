<?php
session_start();
include("includes/dbconnect.php");
$locationID = $_POST['viewMap'];
$sql = "SELECT * FROM locations where locationID = '$locationID'";
$result = mysqli_query($db, $sql);
while($row = mysqli_fetch_assoc($result)){
    $locationName = $row['locationName'];
    $lat = $row['latitude'];
    $long = $row['longitude'];
    $caption = $row['caption'];
    $locationType = $row['locationType'];
}
include("includes/header.php");
?>
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
<div class="ui equal width grid">
    <header class = 'ui header'><?php echo $locationName ?></header>
    <div class="twelve wide column">
        <div id="map" style="width: 600px; height: 350px"></div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initMap">
        </script>
    </div>
</div>
<div class="ui grid">
    <div class="eight wide column">
        <h3>Description</h3>
        <p><?php echo $caption ?></p>
        <p>On its way the Trail passes peaceful water meadows rich in wildlife, historic towns and cities and many lovely villages, finishing at the edinburgh town just a few miles from the sea.</p>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>