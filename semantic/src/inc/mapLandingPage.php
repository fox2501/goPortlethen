<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userName AND U.userID = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$userID]);

    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $accessID = $row["accessID"];

    if ($accessID == '1' || $accessID == '3' || $accessID == '4') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
include("includes/header.php");
?>
<head>
    <title></title>
</head>
<body>
<h1 align="center">Map Landing Page</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class='ui container'>
    <div class='ui grid'>
        <?php
        if ($canAccess == 1) {
            echo "        <div class='three wide column'>
			                        <a href = 'createMap.php'>
			                            <button class='ui left floating positive fluid button'>Create Route</button>
			                        </a>
			                    </div>";
        }
        ?><?php
        $sql = "SELECT locationID, locationName, caption, locationType FROM locations WHERE approvalStatus = ?";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([1]);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $locationName = $row['locationName'];
            $caption = $row['caption'];
            $locationType = $row['locationType'];
            $locationID = $row['locationID'];
            if($locationType == 'hist'){
                $locationType = 'Historical Landmark';
            }
            if($locationType == 'view'){
                $loctionType == 'Viewpoint';
            }
            if($locationType == 'LOI'){
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
        ?>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>