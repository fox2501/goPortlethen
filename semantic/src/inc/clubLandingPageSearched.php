<?php
//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");

$clubCategory = $_POST["search"];



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
    <title>goPortlethen</title>
</head><?

include("includes/header.php");
?>
<body>
<h1 align="center">Club Search Results</h1>
<div class="ui horizontal section divider">
    Become More Involved
</div>

<div class="ui stackable container">
    <div class="ui stackable grid">
        <div class="ui hidden divider"></div><?php
        $sql_query = "SELECT A.clubName, A.clubDescription, A.clubID, B.url FROM club A, photos B
                      WHERE A.clubID = B.clubID
                      AND $clubCategory = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$clubCategory]);
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