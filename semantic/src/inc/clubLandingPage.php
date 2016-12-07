<?php
session_start();
include("includes/dbconnect.php");
if(isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT userName from users WHERE userID = '$userID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = '$userName'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $accessID = $row["accessID"];
    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>Club Landing Page</title>
</head>
<? include("includes/header.php"); ?>
<body>

<h1 align="center">Club Landing Page</h1>
<div class="ui horizontal section divider">
    Become more involved
</div>

<div class="ui container">
    <div class="ui grid">
        <div class="row">
        </div>
        <div class="row">
            <?php
            if($canAccess == 1){
                echo "<div class='four wide column''>
                <button class='ui button'><a href='/semantic/src/inc/CreateClubPage.php'>Create Club</a></button>
            </div>";
            }
            ?>

            <div class="eight wide column">
                <div class="ui form">
                    <div class="inline fields">
                        <label>Filter clubs by: </label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="Club" checked="" tabindex="0" class="hidden" id="A-Z">
                                <label for="A-Z">Name A-Z</label>
                            </div>
                        </div>
                        <div class="ui radio checkbox">
                            <input type="radio" name="Club" tabindex="0" class="hidden" id="fee">
                            <label for="fee">Fee does apply</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="four wide column">
                <div class="ui fluid category search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search clubs...">
                        <i class="search icon"></i>
                    </div>
                    <div class="results"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ui container">
    <div class="ui grid">
        <div class="ui hidden divider"></div>
        <div class="ui divided items">

            <?php

            $sql_query = "SELECT clubName, clubDescription, clubID FROM club";
            $result = $db->query($sql_query);
            while ($row = $result-> fetch_array()) {
                $title = $row['clubName'];
                $mainText = $row['clubDescription'];
                $clubID = $row['clubID'];
                echo "
<div class = 'ui container'>
    <div class = 'ui grid'>
    <div class = 'ui two wide column'>
        <div class='ui small image'>
                    <img src='http://secure.cache.images.core.optasports.com/soccer/teams/150x150/961.png'>
        </div>
    </div>
    <div class = 'ui ten wide column'>
        <div class='content''>
            <div class='header'>
                        $title
                        $clubID
            </div>
            <div class='description'>
                   <p> $mainText </p>
            </div>
            <div class='extra' >
            <form method = 'POST'>
                   <button class='ui right floated button' type = 'submit'>
                      <input type = 'hidden' name = 'viewClub' value = '$clubID'>
                      <a href='/semantic/src/inc/clubPage.php'>For more info click here!</a>
                   </button>
            </form>

            </div>
     </div>
</div>
</div>
<div class = 'ui divider'></div>
"; }
            ?>
        </div>
    </div>
    <div class="ui hidden divider"></div>
</div>
</body>
</html>
<?php include("includes /footer.php"); ?>