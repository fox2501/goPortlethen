<?php
//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");

$userID = $_SESSION['loggedIn'];
$sql = "SELECT userAccessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userAccessID = $row['userAccessID'];

$clubID = $_POST['viewClub'];
$sql = "SELECT * FROM club WHERE clubID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$clubID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $clubName = $row['clubName'];
    $category = $row['clubCategory'];
    $clubDesc = $row['clubDescription'];
    $contactNum = $row['contactNumber'];
    $feeRequired = $row['feePaid'];
    $feeCost = $row['feeCost'];
    $websiteURL = $row['websiteURL'];
}
if ($feeRequired == 1) {
    $feeRequired = 'Yes';
} else {
    $feeRequired = 'No';
}
$sql = "SELECT * from photos WHERE clubID = ?";
$stmt = $pdo -> prepare($sql);
$stmt->execute([$clubID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $photoURL = $row['url'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Club Page</title>
</head><?php
include("includes/header.php");
//checks user access level can view club
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
    if ($accessID == '1' || $accessID == '4') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
//echoes out club page main body
echo "
<body>
<div class='ui stackable container'>
    <div class = 'ui stackable grid'>
        <div class = 'eight wide column'>
            <header class = 'ui blue huge header'>$clubName Club Profile Page</header>
        </div>
        <div class = 'eight wide column'>
        <form class = 'ui form' method = 'POST' action = 'editClubPage.php' onclick = '/semantic/src/inc/editClubPage.php'>
            
            if ($canAccess = '1'){
            <button class = 'ui right floated button' onclick = '/semantic/src/inc/editClubPage.php' type = 'submit'>
                <input type = 'hidden' name = 'editClub' value = $clubID>
                <i class = 'ui settings icon'></i>
                    Edit Club
            </button>
            }
        </form>
        </div>
    </div>
    <div class='ui stackable grid'>
            <div class='four wide column'>
                <div class='ui card'>
                    <div class='image'>
                        <img
                            src='$photoURL'>
                    </div>
                </div>
            </div>
            <div class = 'twelve wide column'>
            <div class='ui segment '>
                <h5 class='ui top attached header '>
                    Club Category:
                </h5>
                <div class='ui attached segment '>
                    <p>$category</p>
                </div>
                <h5 class='ui attached header '>
                    Club Description:
                </h5>
                <div class='ui attached segment '>
                    <p>$clubDesc</p>
                </div>
                <h5 class='ui attached header '>
                    Contact Number:
                </h5>
                <div class='ui attached segment '>
                    <p>$contactNum</p>
                </div>
                <h5 class='ui attached header '>
                    Website URL:
                </h5>
                <div class='ui attached segment '>
                    <p>$websiteURL</p>
                </div>
                <h5 class='ui attached header '>
                    Fee Required?
                </h5>
                <div class='ui attached segment '>
                    <p>$feeRequired</p>
                </div>
                <h5 class='ui attached header '>
                    Monthly Fee:
                </h5>
                <div class='ui attached segment '>
                    <p>$feeCost</p>
                </div>
            </div>
            </div>
        </div>
</div>  
</body>";



include("includes/footer.php");
?>
<body>
</body>
</html>