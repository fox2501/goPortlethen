<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "C:\Users\ross1\Documents\PHPStormProjects\goPortlethen\semantic\dist\semantic.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>goPortlethen</title>
</head>
<body>
<div class = "ui blue inverted secondary pointing stackable menu">
    <a class = "header item" href = "Index.php">
        <i class = "home icon"></i>
        goPortlethen
    </a>
    <a class = "item">
        <i class="heartbeat icon"></i>
        Health & Wellbeing
    </a>
    <a class = "item">
        <i class="users icon"></i>
        Clubs
    </a>
    <a class = "item">
        <i class = "map icon"></i>
        Maps
    </a>
    <div class = "right menu">
        <div class = "ui simple dropdown">
            <a class = "browse item" href = "profile.php">
                <i class = "user icon"></i>
                Ross
                <i class="dropdown icon"></i>
            </a>
            <div class = "ui menu">
                <div class = "item">My Profile</div>
                <div class = "item" href = "profile.html">Settings</div>
                <div class = "item" href = "index.html">Log Out</div>
            </div>
        </div>
        <a class = "item" href = "signUp.php">
            <div class = "ui teal button">
                <i class="add user icon"></i>
                Sign up
            </div>
        </a>
        <a class = "item" href = "logIn.php">
            <div class = "ui button">
                <i class="sign in icon"></i>
                Log In
            </div>
        </a>
    </div>
</div>
</body>
</html>