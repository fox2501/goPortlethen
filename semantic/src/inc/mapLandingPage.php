<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>Route</title>
</head>
<?php include("includes/header.php");?>
<div>

    <h1>
        <center>Maps</center>
    </h1>
    <div class="ui horizontal section divider">
        Walking Routes in Porthlethen
    </div>


    <div class="ui grid">
        <div class="five wide column">
            <button class="ui button"><center><a href="">Create Route</a></button></center>
        </div>
        <div class="six wide column">
            <div class="ui celled list">
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"> Test Route 1
                        </a>
                        4.2miles
                    </div>
                </div>

                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"> Test route 2</a>
                        5.1miles
                    </div>
                </div>
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"> Test route 3</a>
                        7.0 miles
                    </div>
                </div>
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"> Test route 4</a>
                        0.7 miles
                    </div>
                </div>
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"> Test route 5</a>
                        3.3 miles
                    </div>
                </div>
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"> Test route 6</a>
                        13.2 miles
                    </div>
                </div>
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"> Test route 7</a>
                        8.9 miles
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="five wide column"></div>
</div>
<div class="ui grid">
    <div class="sixteen wide column"></div>
    <div class="sixteen wide column"></div>
</div>

</div>
</div>
</div>
</div>



</div>
<?php include("includes/footer.php");?>
</html>