<?php
session_start();
?>
<?php include("includes/header.php"); ?>
<body>
<h1 align="center">Map Landing Page</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class='ui container'>
    <div class='ui grid'>
        <div class='three wide column'>
            <button class="ui left floating positive fluid button">Create Route</button>
        </div>
        <div class='sixteen wide column'>
            <div class='ui raised segment'>
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"></a><a href="mapPage.php">Test Route 1</a>
                    </div>
                    4.2miles
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>