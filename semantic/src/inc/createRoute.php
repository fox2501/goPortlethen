<?php
session_start();
include ( "includes/dbconnect.php");
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1 align="center">Submit Map Content</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class="ui container">
    <div id="map" style="width: 100%; height: 350px"></div>
<!--    <script>-->
<!--        var myCenter=new google.maps.LatLng(57.061681,-2.129468);-->
<!--        var marker;-->
<!---->
<!--        function initMap() {-->
<!--            var mapProp = {-->
<!--                center:myCenter,-->
<!--                zoom:12,-->
<!--                mapTypeId:google.maps.MapTypeId.HYBRID-->
<!--            };-->
<!---->
<!--            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);-->
<!---->
<!--            marker = new google.maps.Marker({-->
<!--                position:myCenter,-->
<!--                draggable:true,-->
<!--            });-->
<!---->
<!--            var myLatLng = {lat: 57.061681, lng: -2.129468};-->
<!---->
<!--            var map = new google.maps.Map(document.getElementById('map'), {-->
<!--                zoom: 4,-->
<!--                center: {lat: 57.061681, lng: -2.129468}-->
<!--            });-->
<!---->
<!--            var marker = new google.maps.Marker({-->
<!--                position: myLatLng,-->
<!--                map: map,-->
<!--                draggable:true-->
<!--            });-->
<!--            var infowindow = new google.maps.InfoWindow({-->
<!--                content: '<p>Marker Location:' + marker.getPosition() + '<\/p>'-->
<!--            });-->
<!--            map.setZoom(5);-->
<!--            google.maps.event.addListener(marker, 'click', function() {-->
<!--                infowindow.open(map, marker);-->
<!--            });-->
<!--            google.maps.event.addDomListener(window, 'load', initialize);-->
<!--        }-->
<!--    </script>-->
    <script>
        var myCenter=new google.maps.LatLng(49.716,-2.196);
        var marker;

        function initMap() {
            var mapProp = {
                center:myCenter,
                zoom:13,
                mapTypeId:google.maps.MapTypeId.HYBRID
            };

            var map = new google.maps.Map(document.getElementById("map"),mapProp);

            marker = new google.maps.Marker({
                position:myCenter,
                draggable:true,
            });

            marker.setMap(map);

            google.maps.event.addListener(marker, "drag", function(){
                document.getElementById("grid").value=marker.position.toUrlValue();
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
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