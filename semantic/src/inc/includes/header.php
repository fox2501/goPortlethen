<?
session_start();
include("dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "/semantic/dist/semantic.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
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
                $userID = $_SESSION['loggedIn'];
                $sql = "SELECT userName from user where userID = '$userID'";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $userName = $row['userName'];
                }
                $sql = "SELECT accessID from useraccess WHERE userName = '$userName'";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $accessLevel = $row['accessID'];
                }
                if($accessLevel == 1 || $accessLevel == 3){
                    echo "  <div class = 'ui simple dropdown'>
                           <a class = 'browse item'>
                                <i class = 'user icon'></i>
                                " .$_SESSION['name']. "
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
                } else if($accessLevel == 2 || $accessLevel == 4){
                    echo "  <div class = 'ui simple dropdown'>
                           <a class = 'browse item'>
                                <i class = 'user icon'></i>
                                " .$_SESSION['name']. "
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