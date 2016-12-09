<?php
session_start();
include ( "includes/dbconnect.php");

if(isset($_SESSION['loggedIn'])){
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
    if($accessID == '1' || $accessID == '4'){
        $canAccess = '1';
    } else{
        $canAccess = '0';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <title>Semantic UI</title>
</head>

<!-- Nav bar -->
<?include ( "includes/header.php"); ?>

<body>
<!-- Page header -->
<h1 align="center">Health & Wellbeing</h1>
<div class="ui horizontal section divider">
    <p>Keeping Portlethen Healthy</p>
</div>

<!-- Submit content button -->
<!-- Takes user to SubmitHealth.php -->
<!-- Only visible to admin/contributor -->
<!-- When ordinary user on site/not logged in, hide this div -->
<div class="ui container">
    <div class="ui two column grid">
        <div class="ten wide column">
            <?php
            if($canAccess == '1'){
                echo "<div class='row'>
                <a href='healthForm.php'>
                    <button class='ui green submit button' style='margin-right:50px'>Submit Content</button>
                </a>
            </div>";
            }
            ?>

            <!-- Info section -->
            <!-- Sections added as users add info through form -->
            <!-- Blank area to input info through form -->
            <div class="row">
                <ul>
                    <?php $sql_query="
SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, C.url
FROM healthcontent A, users B, photos C
WHERE 
A.userID=B.userID
AND A.healthContentID = C.healthContentID
AND A.approvalStatus = 1;";
                    $result=$db->query($sql_query);
                    while($row = $result-> fetch_array()){
                        $title = $row['title'];
                        $mainText = $row['mainText'];
                        $userName = $row['userName'];
                        $datePosted = $row['datePosted'];
                        $healthContentID = $row['healthContentID'];
                        $photoURL = $row['url'];
                        if($canAccess == '1'){
                            echo "
<div class='ui raised segment' style = 'height: 250px;'>
		<div class='ui container'>
			<div class='ui grid'>
				<div class='sixteen wide column'>
					<form action='editHealthContent.php' class='ui form' method='post'>
						<button class='ui right floated mini button' onclick='/semantic/src/inc/editHealthContent.php' type='submit'><input name='editHealth' type='hidden' value=\"$healthContentID\"> Edit</button>
					</form>
				</div>
				<div class='row'>
					<div class='four wide column'>
						<div class='ui small image' style='height: 100%; width: 100%;'><img src='$photoURL' style='height: 100%; width: 100%;'></div>
					</div>
					<div class='four wide column'>
						<h3 class='ui header' id='title'>$title</h3>
						<h4 class='ui header' id='datePosted'>$datePosted</h4>
					</div>
					<div class='eight wide column'>
						<p id='mainText' style='text - align:justify'>$mainText<br></p>
						<p id='author'>By $userName<br></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='ui hidden section divider'></div>
";
                        } else {
                            echo "
	<div class='ui raised segment' style = 'height: 250px;'>
		<div class='ui container'>
			<div class='ui grid'>
				<div class='four wide column'>
					<div class='ui small image' style='height: 100%; width: 100%;'><img src='$photoURL' style='height: 100%; width: 100%;'></div>
				</div>
				<div class='four wide column'>
					<h3 class='ui header' id='title'>$title</h3>
					<h4 class='ui header' id='datePosted'>$datePosted</h4>
				</div>
				<div class='eight wide column'>
					<p id='mainText' style='text - align:justify'>$mainText<br></p>
					<p id='author'>By $userName<br></p>
				</div>
			</div>
		</div>
	</div>
	<div class='ui hidden section divider'></div>
                                ";
                        }
                        } ?>
                </ul>
            </div>
        </div>
        <div class="six wide column">
            <div data-tockify-component="mini" data-tockify-calendar="healthevents"></div>
            <script data-tockify-script="embed" src="https://public.tockify.com/browser/embed.js"></script>
            <button class="ui button"><a href="https://tockify.com/tkf2/submitEvent/42648d506ec74f769ce92685c0fe921e" target="_blank">Submit an Event</a></button>
            <div style="height:600px">
                <a class="twitter-timeline" data-height="500" href="https://twitter.com/BoringMilner">Tweets by James Milner</a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</div>

</body>

<!-- Footer -->
<?php include( "includes/footer.php"); ?>

</html>