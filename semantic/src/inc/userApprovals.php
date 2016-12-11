<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("includes/PDOConnect.php");

if (isset($_SESSION['loggedIn'])) {
    include("includes/header.php");
    echo "<h1 align='center'>Account approvals</h1>
        <div class='ui horizontal section divider'>
        </div>";
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT userName from users where userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $userName = $row['userName'];

    $sql = "SELECT accessID from useraccess WHERE userName = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$userName]);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $accessLevel = $row['accessID'];

    if ($accessLevel == 1) {
        $sql = "
    SELECT U.userName, U.firstName, U.surname, AL.description 
    FROM users U, useraccess UA, accesslevel AL
    WHERE U.userName = UA.userName 
    AND UA.accessID = AL.accessID
    AND U.userApproved = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([0]);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $userName = $row['userName'];
            $firstName = $row['firstName'];
            $surname = $row['surname'];
            $accessRequired = $row['description'];
            echo "
         <div class = 'row'>
            <div class = 'ui container'>
                <div class = 'ui raised segment'>
                 <div class = 'ui grid'>
                    <div class = 'twelve wide column'>
                        <div class = 'row'>
                            <h3 class = 'ui header' id = 'userName'>Username: $userName</h3>
                        </div>
                        <div class = 'row'>
                            <h3 class = 'ui header' id = 'firstName'>First Name: $firstName</h3>
                        </div>
                        <div class = 'row'>
                            <h3 class = 'ui header' id = 'firstName'>Surname: $surname</h3>
                        </div>
                        <div class = 'row'>
                            <h3 class = 'ui header' id = 'firstName'>Access Requested: $accessRequired</h3>
                        </div>
                    </div>
                    <div class='two wide column'>
							<form action='submitUserApproval.php' class='ui form' method='POST'>
								<button class='ui positive basic right floated button' onclick='/semantic/src/inc/submitUserApproval.php' type='submit'><input name='approveUser' type='hidden' value='$userName'> Approve</button>
							</form>
							</div>
					<div class = 'two wide column'>
							<form action='denyUserApproval.php' class='ui form' method='POST'>
								<button class='ui negative basic right floated button' onclick='/semantic/src/inc/denyUserApproval.php' type='submit'><input name='denyUser' type='hidden' value='$userName'> Deny</button>
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