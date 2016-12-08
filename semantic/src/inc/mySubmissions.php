<?php
session_start();
include("includes/dbconnect.php");
if (isset($_SESSION['loggedIn'])) {
    include("includes/header.php");
    echo "<h1 align='center'>My Submissions</h1>
        <div class='ui horizontal section divider'>
        </div>";
    $userID = $_SESSION['loggedIn'];
    $sql = "
    SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, A.approvalStatus, C.url
    FROM healthcontent A, users B, photos C
    WHERE 
    A.userID=B.userID
    AND A.healthContentID = C.healthContentID
    AND A.approvalStatus = 0
    AND A.userID = $userID;";
        $result = $db->query($sql_query);
        while ($row = $result->fetch_array()) {
            $title = $row['title'];
            $mainText = $row['mainText'];
            $userName = $row['userName'];
            $datePosted = $row['datePosted'];
            $healthContentID = $row['healthContentID'];
            $photoURL = $row['url'];
            echo "
	<div class='row'>
		<div class='ui container'>
			<div class='ui raised segment'>
				<div class='ui container'>
					<div class='ui grid'>
						<div class='row'>
							<div class='four wide column'>
								<h3 class='ui header' id='title'>$title</h3>
								<p id='datePosted'>$datePosted<br></p>
								<div class='ui small image'><img src='$photoURL'></div>
							</div>
							<div class='eight wide column'>
								<p id='mainText' style='text - align:justify'>$mainText<br></p>
								<p id='author'>By $userName<br></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='ui hidden section divider'></div>
	</div>
";
        }
}
?>