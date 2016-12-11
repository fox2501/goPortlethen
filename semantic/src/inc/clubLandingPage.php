<?php
session_start();
include("includes/dbconnect.php");
if (isset($_SESSION['loggedIn'])) {
    $userID    = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql       = "SELECT userName from users WHERE userID = '$userID'";
    $result    = mysqli_query($db, $sql);
    $row       = mysqli_fetch_assoc($result);
    $userName  = $row["userName"];

    $sql      = "SELECT accessID from useraccess where userName = '$userName'";
    $result   = mysqli_query($db, $sql);
    $row      = mysqli_fetch_assoc($result);
    $accessID = $row["accessID"];
    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
?>
<head>
    <title>Club Landing Page</title>
</head>
<?
include("includes/header.php");
?>
<body>
<h1 align="center">Club Landing Page</h1>
<div class="ui horizontal section divider">
    Become more involved
</div>

<div class="ui container">
    <div class="ui grid">
        <div class="row">
            <?php
            if ($canAccess == 1) {
                echo "
	<div class='four wide column'>
		<button class='ui green submit button' style='colour: white'><a href='/semantic/src/inc/CreateClubPage.php'>Create a Club</a></button>
	</div>";
            }?>
            <div class="eight wide column">
                <div class="ui form">
                    <div class="inline fields">
                        <label>Filter clubs by: </label>
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" tabindex="0" class="hidden" id="A-Z">
                                <label for="A-Z">Name A-Z</label>
                            </div>
                            <div class="ui checkbox">
                                <input type="checkbox" tabindex="0" class="hidden" id="fee">
                                <label for="fee">Fee does apply</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="four wide column">

                <div class="ui fluid category search">
                    <div class="ui right floated icon input">
                        <input class="prompt" type="text" placeholder="Search clubs...">
                        <i class="search icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ui container">
    <div class="ui grid">
        <div class="ui hidden divider"></div>
        <?php
        $sql_query = "SELECT A.clubName, A.clubDescription, A.clubID, B.url FROM club A, photos B WHERE A.clubID = B.clubID";
        $result    = $db->query($sql_query);
        while ($row = $result->fetch_array()) {
            $title    = $row['clubName'];
            $mainText = $row['clubDescription'];
            $clubID   = $row['clubID'];
            $photo    = $row['url'];
            echo "
<div class='ui raised segment'>
    <div class='ui container'>
        <div class='ui grid'>
            <div class='ui two wide column'>
                <div class='ui image'>
                    <img src='$photo'>
                </div>
            </div>
            <div class='ui fourteen wide column'>
                <div class='header'>
                    $title
                </div>
                <div class='description'>
                    <p> $mainText </p>
                </div>
                <div class='extra'>
                    <form class='ui form' method='POST' action='/semantic/src/inc/clubPage.php'>
                        <button class='ui right floated button' type='submit' onclick='/semantic/src/inc/clubPage.php'>
                            <input type='hidden' name='viewClub' value=$clubID>
                            For more info click here!
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
";
        }
        ?>
    </div>
    <div class="ui hidden divider"></div>
</div>
</body>
<?php
include("/includes/footer.php");
?>
