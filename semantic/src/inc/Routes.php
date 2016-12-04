<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="http://webappalexander.azurewebsites.net/maps/routeplot.js"></script>
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
        <div id="map"></div>
        <!-- Replace the value of the key parameter with your own API key. -->
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