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
<div class='ui center aligned container'>
    <div class='ui middle aligned center aligned grid'>
        <div class = 'four wide column'></div>
        <div class='ui column'>
            <div class="ui large form">
                <div class='ui negative message'>
                    <h1 class='header'>ARE YOU SURE YOU WANT TO DELETE YOUR PROFILE?</h1>
                </div>
            </div><button class="ui fluid large red submit button" type="submit">Delete Profile</button>
        </div>
        <div class = 'four wide column'></div>
    </div>
</div><?php
include("includes/footer.php");
}
?>
</body>
</html>