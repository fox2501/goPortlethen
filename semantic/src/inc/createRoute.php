<?php
session_start();
include ("includes/dbconnect.php");
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
    <div class = 'ui raised segment'>
        <h3 class = 'ui header' id="current">
                Drag the marker to select a position on the map.
        </h3>
    </div>
    <div id="current">
        Nothing yet...
    </div>
    <script>
        function initMap() {
            var latlng = new google.maps.LatLng(57.061681, -2.129468);

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var myMarker = new google.maps.Marker({
                position: latlng,
                draggable: true
            });

            google.maps.event.addListener(myMarker, 'dragend', function(evt){
                document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '<\/p>';
            });

            google.maps.event.addListener(myMarker, 'dragstart', function(evt){
                document.getElementById('current').innerHTML = '<p>Currently dragging marker...<\/p>';
            });
            map.setCenter(myMarker.position);
            myMarker.setMap(map);
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initMap">
    </script>
    <form action="submitCreateMap.php" class="ui form" enctype="multipart/form-data" method="post">
        <div class="field">
            <label>Title</label> <input name="title" placeholder="Enter the title of your route." type="text">
        </div>
        <div class="field">
            <label>Type</label> <select class="ui select dropdown" name="mapType">
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
            <label>Longitude</label> <input name="long" placeholder="Enter the location longitude." type="text">
        </div>
        <div class="field">
            <label>Latitude</label> <input name="lat" placeholder="Enter the location latitude." type="text">
        </div>
        <div class="field">
            <label>Description</label>
            <textarea name="mapDesc" placeholder="Enter a description." rows="8"></textarea>
        </div><button class="ui fluid large green submit button" id="createMapContent" type="submit">Submit Content</button>
    </form>
</div>
</body>
</html>