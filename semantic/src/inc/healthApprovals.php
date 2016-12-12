<?php

session_start();
//connects to database server
include("includes/PDOConnect.php");

if (isset($_SESSION['loggedIn'])) {
    include("includes/header.php");
    echo "<h1 align='center'>Health Content Approvals</h1>
        <div class='ui horizontal section divider'>
        </div>";
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT accessID from users U, useraccess UA where U.userName = UA.userName AND userID = ?";
    $stmt = $pdo ->prepare($sql);
    $stmt -> execute([$userID]);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $accessLevel = $row['accessID'];

    if ($accessLevel == 1) {
        $sql = "
    SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, A.approvalStatus, C.url
    FROM healthcontent A, users B, photos C
    WHERE 
    A.userID=B.userID
    AND A.healthContentID = C.healthContentID
    AND A.approvalStatus = ?";
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([0]);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
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
							<div class='two wide column'>
								<form action='submitHealthApproval.php' class='ui form' method='POST'>
									<button class='ui positive basic right floated button' onclick='/semantic/src/inc/submitHealthApproval.php' type='submit'><input name='approveHealth' type='hidden' value='$healthContentID'> Approve</button>
								</form>
							</div>
							<div class = 'two wide column'>
								<form action='denyHealthApproval.php' class='ui form' method='POST'>
									<button class='ui negative basic right floated button' onclick='/semantic/src/inc/denyHealthApproval.php' type='submit'><input name='denyHealth' type='hidden' value='$healthContentID'> Deny</button>
								</form>
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
}
?>