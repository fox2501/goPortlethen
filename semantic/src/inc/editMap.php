<?php
session_start();
//connects to database server
include ("includes/PDOConnect.php");


$userID = $_SESSION['loggedIn'];
$sql = "SELECT UA.accessID FROM useraccess UA, users U WHERE UA.userName = U.userName AND U.userID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$userID]);
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$accessLevel = $row['accessID'];

IF($accessLevel == 1 || $accessLevel == 3 || $accessLevel == 4) {

$locationID = $_POST['editMap'];

$sql = "SELECT * FROM locations WHERE locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$locationID]);

$row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $longitude = $row['longitude'];
    $latitude = $row['latitude'];
    $locationType = $row['locationType'];
    $caption = $row['caption'];
    $locationName = $row['locationName'];

include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<!--main body-->
<body>
<h1 align="center">Submit Map Content</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class="ui container">
    <form method ="post" action ="deleteMap.php">
        <button class="ui red right floated button" type ="submit" name = "deleteMap" value = "<?php echo $locationID ?>">Delete Map</button>
    </form>
    <div id="map" style="width: 100%; height: 350px; padding-top: 10px;"></div>
    <div class='ui raised segment'>
        <h3 class='ui header' id="current">Drag the marker to select a position on the map.</h3>
        <script>
            function initialize() {
                var myLatLng = new google.maps.LatLng(<?php echo $latitude ?>, <?php echo $longitude ?>);
                var myCenter = new google.maps.LatLng(57.061681, -2.129468);

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: myLatLng
                });

                var myMarker = new google.maps.Marker({
                    position: myLatLng,
                    draggable: true
                });

                var lat = google.maps.event.addListener(myMarker, 'dragend', function(evt){
                    document.getElementById('lat').value = evt.latLng.lat().toFixed(3).toString();
                    document.getElementById('long').value = evt.latLng.lng().toFixed(3).toString();
                });

                map.setCenter(myMarker.position);
                myMarker.setMap(map);

            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initialize"></script>
        <form action="submitEditMap.php" class="ui form" enctype="multipart/form-data" method="post">
            <div class="field">
                <label>Title</label> <input name="title" placeholder="Enter the title of your route." type="text" value = "<?php echo $locationName ?>">
            </div>
            <div class="field">
                <label>Type</label> <select class="ui select dropdown" id = "mapType" name="mapType" value = "<?php $locationType ?>">
                    <option value="view">
                        Viewpoint
                    </option>
                    <option value="LOI">
                        Location of Interest
                    </option>
                    <option value="hist">
                        Historical Landmark
                    </option>
                    <script>
                        $( document ).ready(function() {
                            $("#mapType").val("<?php echo $locationType ?>");
                        });
                    </script>
                </select>
            </div>
            <div class="field">
                <label>Latitude</label>
                <input name="lat" placeholder="Enter the location longitude." id = "lat" type="text" value = "<? echo $latitude ?>">
            </div>
            <div class="field">
                <label>Longitude</label>
                <input name="long" placeholder="Enter the location latitude." id = "long" type="text" value = "<? echo $longitude ?>">
            </div>
            <div class="field">
                <label>Description</label>
                <textarea name="mapDesc" placeholder="Enter a description." rows="8"><?php echo $caption ?></textarea>
            </div>
            <div class = "field">
                <input name='editMap' type='hidden' value='<?php echo $locationID ?>'>
            </div>
            <button class="ui fluid large green submit button" id="editMapContent" type="submit">Submit Content</button>
        </form>
    </div>
</div>
<?php
include("includes/footer.php");
}

else{
    header("Location: /semantic/src/inc/mapLandingPage.php");
}?>
</body>
</html>