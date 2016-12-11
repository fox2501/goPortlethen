<?php
session_start();
include ( "includes/dbconnect.php");
include("includes/header.php");
?>
<h1 align="center">Submit Map Content</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class="ui container">
    <div id="map" style="width: 100%; height: 350px"></div>
    <script>
        var myCenter=new google.maps.LatLng(57.061681,-2.129468);
        var marker;

        function initMap() {
            var myLatLng = {lat: 0, lng: 0};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: {lat: 0, lng: 0}
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable:true
            });
            var infowindow = new google.maps.InfoWindow({
                content: '<p>Marker Location:' + marker.getPosition() + '</p>'
            });

            map.setZoom(5);
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
            google.maps.event.addDomListener(window, 'load', initialize);
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initMap">
    </script>
    <form class="ui form" action="submitCreateMap.php" enctype="multipart/form-data" method="POST">
        <div class="field">
            <label>Title</label>
            <input type="text" name="title" placeholder="Enter the title of your route.">
        </div>
        <div class="field">
            <label>Type</label>
            <select class="ui select dropdown" name="mapType">
                <option value="view">Viewpoint</option>
                <option value="LOI">Location of Interest</option>
                <option value="hist">Historical Landmark</option>
            </select>
        </div>
        <div class="field">
            <label>Longitude</label>
            <input type="text" name="long" placeholder="Enter the location longitude.">
        </div>
        <div class="field">
            <label>Latitude</label>
            <input type="text" name="lat" placeholder="Enter the location latitude.">
        </div>
        <div class="field">
            <label>Description</label>
            <textarea rows="8" type="text" name="mapDesc" placeholder="Enter a description."></textarea>
        </div>
        <button class="ui fluid large green submit button" id="createMapContent" type="submit">Submit Content</button>
    </form>
</div>