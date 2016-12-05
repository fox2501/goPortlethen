<?php
session_start();
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
            <div class="four wide column">
                <button class="ui button"><a href="/semantic/src/inc/CreateClubPage.php">Create Club</a></button>
            </div>
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

            $sql_query = "SELECT * FROM club, users WHERE club.userID=users.userID";
            $result = $db->query($sql_query);
            while ($row = $result->fetch_array()) {
                $title = $row['title'];
                $mainText = $row['mainText'];
                echo "<div>

            <div class='item'>
                <div class='ui small image'>
                    <img src='http://secure.cache.images.core.optasports.com/soccer/teams/150x150/961.png'>
                </div>
                <div class='middle aligned content''>
                    <div class='header'>
                        $title
                    </div>
                    <div class='description'>
                        <p> $mainText </p>
                    </div>
                    <div class='extra'>
                        <div class='ui right floated button'>
                            <a href='/semantic/src/inc/clubPage.php'>For more info click here!</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>"; }
            ?>
        </div>
    </div>
    <div class="ui hidden divider"></div>
</div>
</body>
<?php include("includes / footer . php"); ?>
</html>