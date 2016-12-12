<?php
//session begins
session_start();
//connects to database server
include ("includes/dbconnect.php");
$userID = $_SESSION['loggedIn'];

$sql = "SELECT UA.accessID FROM useraccess UA, users U WHERE UA.userName = U.userName AND U.userID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$userID]);
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$accessLevel = $row['accessID'];

IF($accessID == 1 || $accessID == 3) {

    include("includes/header.php");
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
    </head>
    <body>
    <h1 align="center">Submit Map Content</h1>
    <div class="ui horizontal section divider">
        Discover Portlethen
    </div>
    <div class="ui container">
        <div id="map" style="width: 100%; height: 350px"></div>
        <div class='ui raised segment'>
            <h3 class='ui header' id="current">Drag the marker to select a position on the map.</h3>
            <script>
                function initialize() {
                    var latlng = new google.maps.LatLng(57.061681, -2.129468);

                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 13,
                        center: latlng
                    });

                    var myMarker = new google.maps.Marker({
                        position: latlng,
                        draggable: true
                    });

                    var lat = google.maps.event.addListener(myMarker, 'dragend', function (evt) {
                        document.getElementById('lat').value = evt.latLng.lat().toFixed(3).toString();
                        document.getElementById('long').value = evt.latLng.lng().toFixed(3).toString();
                    });

                    map.setCenter(myMarker.position);
                    myMarker.setMap(map);

                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initialize"></script>
            <form action="submitCreateMap.php" class="ui form" enctype="multipart/form-data" method="post">
                <div class="ui error message"></div>

                <div class="field">
                    <label>Title</label> <input name="title" placeholder="Enter the title of your route." type="text">
                </div>
                <div class="field">
                    <label>Type</label> <select class="ui select dropdown" name="mapType">
                        <option></option>
                        <option value="view">
                            Viewpoint
                        </option>
                        <option value="LOI">
                            Location of Interest
                        </option>
                        <option value="hist">
                            Historical Landmark
                        </option>
                    </select>
                </div>
                <div class="field">
                    <label>Latitude</label>
                    <input name="lat" placeholder="Enter the location longitude." id="lat" type="text">
                </div>
                <div class="field">
                    <label>Longitude</label>
                    <input name="long" placeholder="Enter the location latitude." id="long" type="text">
                </div>
                <div class="field">
                    <label>Description</label>
                    <textarea name="mapDesc" placeholder="Enter a description." rows="8"></textarea>
                </div>
                <button class="ui fluid large green submit button" id="createMapContent" type="submit">Submit Content
                </button>
                <script type="text/javascript">
                    ;
                    (function ($) {
                        $('.ui.form').form({
                            on: 'blur',
                            fields: {
                                locationName: {
                                    identifier: 'title',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Please enter your a name for your map.'
                                        }
                                    ]
                                },
                                lat: {
                                    identifier: 'lat',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'There must be a latitude value.'
                                        }
                                    ]
                                },
                                long: {
                                    identifier: 'long',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'There must be a longitude value.'
                                        }
                                    ]
                                },
                                mapType: {
                                    identifier: 'mapType',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Please select a value for map type.'
                                        }
                                    ]
                                }
                            }
                        })
                    })(jQuery);
                </script>
            </form>
        </div>
    </div>
    </body>
    </html>
    <?php
}else{
    header("Location: ../mapLandingPage.php");
}
    ?>