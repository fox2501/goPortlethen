<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <!--<![endif]-->
<!-- Set the viewport width to device width for mobile -->
<!-- Included CSS Files -->
<!--[if lt IE 9]>
<link rel="stylesheet" href="stylesheets/ie.css">
<![endif]-->
<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<!--<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?
//session begins
session_start();
include("PDOConnect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://dl.dropbox.com/s/fc45fa0c4s1o95c/semantic.css?dl=0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<body>
<!--Main site buttons-->
<div class="ui stackable blue inverted secondary pointing menu">
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
    <a class="item" href="/semantic/src/inc/help.php">
        <i class="help circle icon"></i>
        Help
    </a>
    <!--Access levels check for various logged in users-->
    <div class="ui stackable blue inverted right menu">
        <?php
        if (isset($_SESSION['loggedIn'])) {
            $userID = $_SESSION['loggedIn'];
            $sql = "SELECT A.userName, A.firstName, B.accessID from users A, useraccess B where A.userName = B.userName AND userID = ?";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$userID]);
            while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                $userName = $row['userName'];
                $firstName = $row['firstName'];
                $accessLevel = $row['accessID'];
            }
            if ($accessLevel == 1) {
                echo "  <div class = 'ui simple dropdown'>
                           <a class = 'browse item'>
                                <i class = 'user icon'></i>
                                $firstName
                                <i class='dropdown icon'></i>
                            </a>
                        <div class = 'ui menu'>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/profile.php'>
                                    <p style = 'color: black;'>My Profile</p>
                                </a>
                            </div>
                            <div class = 'item'>
                                <a  href = '/semantic/src/inc/healthApprovals.php'>
                                    <p style = 'color: black;'>Health Approvals</p>
                                </a>
                            </div>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/mapApprovals.php'>
                                    <p style = 'color: black;'>Map Approvals</p>
                                </a>
                            </div>
                            <div class = 'item'>
                                <a  href = '/semantic/src/inc/userApprovals.php'>
                                    <p style = 'color: black;'>Account Approvals</p>
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
                                $firstName
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
            if($accessLevel == 3){
                echo "  <div class = 'ui simple dropdown'>
                           <a class = 'browse item'>
                                <i class = 'user icon'></i>
                                $firstName
                                <i class='dropdown icon'></i>
                            </a>
                        <div class = 'ui menu'>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/profile.php'>
                                    <p style = 'color: black;'>My Profile</p>
                                </a>
                            </div>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/mapApprovals.php'>
                                    <p style = 'color: black;'>Map Approvals</p>
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
                                $firstName
                                <i class='dropdown icon'></i>
                            </a>
                        <div class = 'ui menu'>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/profile.php'>
                                    <p style = 'color: black;'>My Profile</p>
                                </a>
                            </div>
                            <div class = 'item'>
                                <a class = 'header' href = '/semantic/src/inc/myHealthSubmissions.php'>
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