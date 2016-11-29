<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "/semantic/dist/semantic.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<body>
<div class = "ui blue inverted secondary pointing stackable menu">
    <a class = "header item" href = "/semantic">
        <i class = "home icon"></i>
        goPortlethen
    </a>
    <a class = "item" href="/semantic/src/inc/health.php">
        <i class="heartbeat icon"></i>
        Health & Wellbeing
    </a>
    <a class = "item" href = "/semantic/src/inc/clubLandingPage.php">
        <i class="users icon"></i>
        Clubs
    </a>
    <a class = "item" href = "/semantic/src/inc/mapLandingPage.php">
        <i class = "map icon"></i>
        Maps
    </a>
    <div class = "right menu">
        <?php
            if(isset($_SESSION['loggedIn'])){
                echo "  <div class = 'ui simple dropdown'>
                            <a class = 'browse item' href = '/semantic/src/inc/profile.php'>
                                <i class = 'user icon'></i>
                                    Ross
                                <i class='dropdown icon'></i>
                            </a>
                        <div class = 'ui menu'>
                            <div class = 'item' href = '/semantic/src/inc/profile.php'>My Profile</div>
                            <div class = 'item' href = '/semantic/src/inc/profile.php'>Settings</div>
                            <div class = 'item' type = 'submit' action = 'logout.php'>Log Out</div>
                        </div>
                        </div>";
            } else {
                echo "<a class = 'item' href = '/semantic/src/inc/signUpForm.php'>
                        <div class = 'ui teal button'>
                            <i class='add user icon'></i>
                                Sign up
                        </div>
                      </a>
                      <a class = 'item' href = '/semantic/src/inc/logIn.php'>
                        <div class = 'ui button'>
                            <i class='sign in icon'></i>
                                Log In
                        </div>
                      </a>";
            }
        ?>


    </div>
</div>
</body>
</html>