<?php
//session begins
session_start();
//connects to database server
include("includes/dbconnect.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//access levels
if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT userName from users WHERE userID = '$userID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = '$userName'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $accessID = $row["accessID"];
    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Club Landing Page</title>
</head><?
include("includes/header.php");
?>
<body>
<?php
if(strpos($url, 'newUser') !== false){
    echo "
	            <div class='ui warning message'>
	          <div class='centered header'>
	            You have successfully craeted a club.
	          </div>
	        </div>
	        ";
}
?>
<h1 align="center">Club Landing Page</h1>
<div class="ui horizontal section divider">
    Become More Involved
</div>
<div class="ui stackable container">
    <div class="ui stackable grid">
        <div class="row">
            <?php
            if ($canAccess == 1) {
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
                        <input class="prompt" placeholder="Search clubs..." type="text"><?php header("Location: /semantic/src/inc/clubLandingPageSearched.php"); ?> <i class="search icon"></i>

                        <!-- User types in search query
                        Find corresponding clubs with that category/name
                        Echo them here -->
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
        $result = $db->query($sql_query);
        while ($row = $result->fetch_array()) {
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