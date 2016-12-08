<?php
session_start();
?>
<?php include("includes/header.php"); ?>
<head>
    <script type="text/javascript" src="https://goportlethencs8.azurewebsites.net/semantic/dist/routeplot.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>Map Landing Page</title>
</head>
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
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAsaPQGyO2SHJumHMC2k8RTYfy3z7OXIk&callback=initMap">

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
        <p>The Portlethen Path is a long distance walking trail, following Scotland's best known river for 184 miles (294
            Km) as it meanders from its source in the Aberdeenshire coast through several rural counties and on into the heart
            of Dundee.
        </p>
        <p>
            On its way the Trail passes peaceful water meadows rich in wildlife, historic towns and
            cities and many lovely villages, finishing at the edinburgh town just a few miles from the
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