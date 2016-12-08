<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <!--<![endif]-->
<!-- Set the viewport width to device width for mobile -->
<!-- Included CSS Files -->
<!--[if lt IE 9]>
<link rel="stylesheet" href="stylesheets/ie.css">
<![endif]--><script type="text/javascript" src="/semantic/dist/modernizr.foundation.js"></script>
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?
session_start();
include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../semantic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <title>goPortlethen</title>
</head>
<body>
<div class="ui blue inverted secondary pointing stackable menu">
    <a class="header item" href="/semantic">
        <i class="home icon"></i>
        goPortlethen
    </a>
    <a class="item" href="/semantic/src/inc/health.php">
        <i class="heartbeat icon"></i>
        Health & Wellbeing
    </a>
    <a class="item" href="/semantic/src/inc/clubLandingPage.php">
        <i class="users icon"></i>
        Clubs
    </a>
    <a class="item" href="/semantic/src/inc/mapLandingPage.php">
        <i class="map icon"></i>
        Maps
    </a>
    <div class="right menu">
        <?php
        if (isset($_SESSION['loggedIn'])) {
            $userID = $_SESSION['loggedIn'];
            $sql = "SELECT userName from users where userID = '$userID'";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $userName = $row['userName'];
            }
            $sql = "SELECT accessID from useraccess WHERE userName = '$userName'";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $accessLevel = $row['accessID'];
            }
            if ($accessLevel == 1 || $accessLevel == 3) {
                echo "  <div class = 'ui simple dropdown'>
                           <a class = 'browse item'>
                                <i class = 'user icon'></i>
                                " . $_SESSION['name'] . "
                                <i class='dropdown icon'></i>
                            </a>
                        <div class = 'ui menu'>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/profile.php'>
                                    <p style = 'color: black;'>My Profile</p>
                                </a>
                            </div>
                            <div class = 'item'>
                                <a  href = '/semantic/src/inc/approvals.php'>
                                    <p style = 'color: black;'>Approvals</p>
                                </a>
                            </div>
                        </div>
                        </div>
                        <form action = '/semantic/src/inc/includes/logout.php'>
                            <button class = 'ui fluid submit button' type = 'submit'>Log Out</div>
                        </form>
                        ";
            }
            if ($accessLevel == 2) {
                echo "  <div class = 'ui simple dropdown'>
                           <a class = 'browse item'>
                                <i class = 'user icon'></i>
                                " . $_SESSION['name'] . "
                                <i class='dropdown icon'></i>
                            </a>
                        <div class = 'ui menu'>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/profile.php'>
                                    <p style = 'color: black;'>My Profile</p>
                                </a>
                            </div>
                        </div>
                        </div>
                        <form action = '/semantic/src/inc/includes/logout.php'>
                            <button class = 'ui fluid submit button' type = 'submit'>Log Out</div>
                        </form>
                        ";
            }
            if ($accessLevel == 4) {
                echo "  <div class = 'ui simple dropdown'>
                           <a class = 'browse item'>
                                <i class = 'user icon'></i>
                                " . $_SESSION['name'] . "
                                <i class='dropdown icon'></i>
                            </a>
                        <div class = 'ui menu'>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/profile.php'>
                                    <p style = 'color: black;'>My Profile</p>
                                </a>
                            </div>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/mySubmissions.php'>
                                    <p style = 'color: black;'>My Health Submissions</p>
                                </a>
                            </div>
                        </div>
                        </div>
                        <form action = '/semantic/src/inc/includes/logout.php'>
                            <button class = 'ui fluid submit button' type = 'submit'>Log Out</div>
                        </form>
                        ";
            }
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