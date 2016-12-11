<?php

session_start();
include("includes/dbconnect.php");

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT accessID from useraccess UA, users U where UA.userName = U.userName AND U.userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $accessLevel = $row['accessID'];
    }
    if ($accessLevel == 3) {
        echo "<h1 align='center'>Map Content Approvals</h1>
        <div class='ui horizontal section divider'>
        </div>";
        $sql = "SELECT locationID, locationName, caption, locationType FROM locations";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $locationName = $row['locationName'];
            $caption = $row['caption'];
            $locationType = $row['locationType'];
            $locationID = $row['locationID'];
            if ($locationType == 'hist') {
                $locationType = 'Historical Landmark';
            }
            if ($locationType == 'view') {
                $loctionType == 'Viewpoint';
            }
            if ($locationType == 'LOI') {
                $locationType = 'Location of Interest';
            }
            echo "
	<div class='sixteen wide column'>
		<div class='ui raised segment'>
			<div class='ui two column grid'>
				<div class='column'>
					<h2 class='ui header'>
						$locationName
						<div class='sub header'>$locationType</div>
					</h2>
					<p>$caption</p>
				</div>
				<div class='column'>
					<div class='extra'>
						<form action='/semantic/src/inc/mapPage.php' class='ui form' method='post'>
							<button class='ui right floated button' onclick='/semantic/src/inc/mapPage.php' type='submit'><input name='viewMap' type='hidden' value='$locationID'>Click here to view this on a map</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class='ui hidden section divider'></div>
	</div>
			        ";
        }
    }
}
?>