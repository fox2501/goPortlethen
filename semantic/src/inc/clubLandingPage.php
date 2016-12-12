<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//access levels
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userName AND userID = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$userID]);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $accessLevel = $row["accessID"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Club Landing Page</title>
</head><?
include("includes/header.php");
?>
<body>
<h1 align="center">Club Landing Page</h1>
<div class="ui horizontal section divider">
    Become More Involved
</div>
<div class="ui stackable container">
    <?php
    if(strpos($url, 'newClub') !== false){
        echo "
	            <div class='ui warning message'>
	          <div class='centered header'>
	            You have successfully created a club. Please login with your new club account! 
	          </div>
	        </div>
	        ";
    }
    ?>
    <div class="ui stackable grid">
        <div class="row">
            <?php
            if ($accessLevel == 1 || $accessLevel == 2) {
                echo "
				<div class='four wide column'>
                    <a href='createClubPage.php'>
                        <button class='ui green submit button' style='margin-right:50px'>Create a club</button>
                    </a>      
                </div>
                ";}?>
            <div class="eight wide column">
                <div class="ui form">
                    <div class="inline fields">
                        <label>Filter clubs by:</label>
                        <div class="field">
                            <div class="ui checkbox">
                                <input class="hidden" id="A-Z" tabindex="0" type="checkbox"> <label for="A-Z">Name A-Z</label>
                            </div>
                            <div class="ui checkbox">
                                <input class="hidden" id="fee" tabindex="0" type="checkbox"> <label for="fee">Fee does apply</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="four wide column">
                <div class="ui fluid category search">
                    <div class="ui right floated icon input">
                        <form action="clubLandingPageSearched.php" method="post">
                            <input class="prompt" name="search" placeholder="Search clubs..." type="text">
                            <button type="submit">
                                <i class="search icon"><?php header("Location: /semantic/src/inc/clubLandingPageSearched.php"); ?></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="ui stackable container">
    <div class="ui stackable grid">
        <div class="ui hidden divider"></div><?php
        $sql_query = "SELECT A.clubName, A.clubDescription, A.clubID, B.url FROM club A, photos B WHERE A.clubID = B.clubID";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute();
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $title = $row['clubName'];
            $mainText = $row['clubDescription'];
            $clubID = $row['clubID'];
            $photo = $row['url'];
            echo "
			                <div class = 'row'>
			                    <div class='ui raised segment'>
			                    <div class = 'ui stackable container'>
			                    <div class = 'ui stackable grid'>
			                        <div class='ui three wide column'>
			                            <div class='ui image'><img src='$photo'></div>
			                        </div>
			                        <div class='ui thirteen wide column'>
			                            <div class='header'>
			                                $title
			                            </div>
			                            <div class='description'>
			                                <p>$mainText</p>
			                            </div>
			                            <div class='extra'>
			                                <form action='/semantic/src/inc/clubPage.php' class='ui form' method='post'>
			                                    <button class='ui right floated button' onclick='/semantic/src/inc/clubPage.php' type='submit'><input name='viewClub' type='hidden' value=\"$clubID\"> For more info click here!</button>
			                                </form>
			                            </div>
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
</div><?php
include("/includes/footer.php");
?>
</body>
</html>