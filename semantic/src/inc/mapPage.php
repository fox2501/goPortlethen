<?php
session_start();
include("includes/PDOConnect.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userName AND U.userID = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$userID]);

    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $accessID = $row["accessID"];

    if ($accessID == '1' || $accessID == '3') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}


$locationID = $_POST['viewMap'];
$sql = "SELECT * FROM locations where locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$locationID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
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
<h1 class='ui centered header'>Maps</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class="ui container">
    <div class='ui grid'>
        <div class='ten wide column'></div>
        <?php
        if(strpos($url, 'mapApproval') !== false){
            echo "
            <div class='two wide column'>
								<form action='submitMapApproval.php' class='ui form' method='POST'>
									<button class='ui positive basic right floated button' onclick='/semantic/src/inc/submitMapApproval.php' type='submit'><input name='approveMap' type='hidden' value='$locationID'> Approve</button>
								</form>
							</div>
							<div class = 'two wide column'>
								<form action='denyMapApproval.php' class='ui form' method='POST'>
									<button class='ui negative basic right floated button' onclick='/semantic/src/inc/submitMapApproval.php' type='submit'><input name='denyMap' type='hidden' value='$locationID'> Deny</button>
								</form>
							</div>
							";
        }
        if($canAccess == 1){
            echo "        <div class='two wide column'>
            <form action='editMap.php' class='ui form' method='post'>
                <button class='ui right floated button' onclick='/semantic/src/inc/editMap.php' type='submit'><input name='editMap' type='hidden' value='$locationID'> Edit</button>
            </form>
        </div>";
        }
        ?>
        <div class="sixteen wide column">
            <header class='ui header'>
                <?php echo $locationName ?>
            </header>
            <div id="map" style="width: 100%; height: 350px"></div>
            <script>
                function initialize() {
                    var myLatLng = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
                    var myCenter = new google.maps.LatLng(57.061681, -2.129468);

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 13,
                        center: myLatLng
                    });


                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        map: map,
                        title: '<?php echo $locationName ?>'
                    });

                    var infowindow = new google.maps.InfoWindow({
                        content: '<p>Marker Location:' + marker.getPosition() + '<\/p>'
                    });

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map, marker);
                    });

                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initialize">
            </script>
        </div>
        <div class="sixteen wide column">
            <h3>Description</h3>
            <p><?php echo $caption ?></p>
        </div>
    </div>
</div><?php include("includes/footer.php"); ?>
</body>
</html>