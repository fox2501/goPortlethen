<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://goportlethencs8.azurewebsites.net/semantic/dist/layout.css">
    <script type="text/javascript" src="https://goportlethencs8.azurewebsites.net/semantic/dist/routeplot.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>Map Landing Page</title>
</head>
<?php include("includes/header.php"); ?>

<h1>
    <center>Maps</center>
</h1>
<div class="ui horizontal section divider">
    Walking Routes in Porthlethen
</div>
<div class="ui equal width grid">
    <div class="four wide column"></div>
    <div class="twelve wide column">
        <body onload="load()">
        <div id="map" style="width: 600px; height: 350px"></div>
        </body>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk"
                type="text/JavaScript"></script>
        <script type="text/JavaScript">
            function load() {
                var map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(57.061681, -2.129468),
                    zoom: 14,
                    mapTypeId: 'roadmap'
                });
                downloadUrl("http://webappalexander.azurewebsites.net/week7/locations.php", function (data) {
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName("marker");
                    for (var i = 0; i < markers.length; i++) {
                        var point = new google.maps.LatLng(
                            parseFloat(markers[i].getAttribute("lat")),
                            parseFloat(markers[i].getAttribute("lng")));
                        var marker = new google.maps.Marker({
                            map: map,
                            position: point
                        });
                    }
                });

            }
            ;


            function downloadUrl(url, callback) {
                var request = window.ActiveXObject ?
                    new ActiveXObject('Microsoft.XMLHTTP') :
                    new XMLHttpRequest;

                request.onreadystatechange = function () {
                    if (request.readyState == 4) {
                        callback(request, request.status);
                    }
                };

                request.open('GET', url, true);
                request.send(null);
            }

        </script>

    </div>
    <div class="four wide column"></div>
</div>
</div>

<html class="container">
<div class="ui grid">
    <div class="four wide column"></div>
    <div class="eight wide column">
        <h3> Description</h3>
        <p>The Thames Path is a long distance walking trail, following England's best known river for 184 miles (294
            Km) as it meanders from its source in the Cotswolds through several rural counties and on into the heart
            of London.
        </p>
        <p>
            On its way the Trail passes peaceful water meadows rich in wildlife, historic towns and
            cities and many lovely villages, finishing at the Thames Barrier in Woolwich just a few miles from the
            sea.</p>
    </div>
    <div class="four wide column">
    </div>
    <div class="sixteen wide column"></div>
    <div class="sixteen wide column"></div>
    <div class="sixteen wide column"></div>
</div>

<?php include("includes/footer.php"); ?>
</html>