<?php
session_start();
include("includes/dbconnect.php");
if(isset($_SESSION['loggedIn'])){
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>goPortlethen</title>
</head>
<body>
<h2 class="ui blue header"></h2>
<div class="content">
    <h2 class="ui blue header">Log-in to your account</h2>
</div>
<div class='ui center aligned container'>
    <div class='ui middle aligned center aligned grid'>
        <div class='ui ten wide column'>
            <div class="ui large form">
                <div class='ui negative message'>
                    <h1 class='header'>ARE YOU SURE YOU WANT TO DELETE YOUR PROFILE?</h1>
                </div>
            </div><button class="ui fluid large red submit button" type="submit">Delete Profile</button>
        </div>
    </div>
</div><?php
include("includes/footer.php");
}
?>
</body>
</html>