<?php
//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");

$userID = $_SESSION['loggedIn'];
$sql = "SELECT accessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$accessLevel = $row['accessID'];

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
?>
<body>
<div class='ui stackable container'>
    <div class='ui stackable grid'>
        <div class='eight wide column'>
            <header class='ui blue huge header'>
                <?php echo $clubName ?>Club Profile Page
            </header>
        </div>
        <?php
        if ($accessLevel == 1 || $accessLevel == 2){
            echo"
			    <div class='eight wide column'>
			        <form action='editClubPage.php' class='ui form' method='post'>
			            <button class='ui right floated button' type='submit'><input name='editClub' type='hidden' value='$clubID'> <i class='ui settings icon'></i> Edit Club</button>
			        </form>
			    </div>";
        }
        else{
            echo "<div class = 'eight wide column'></div>";
        }?>

            <div class='four wide column'>
                <div class='ui card'>
                    <div class='image'><img src='<?php echo $photoURL ?>'></div>
                </div>
            </div>
            <div class='twelve wide column'>
                <div class='ui segment'>
                    <h5 class='ui top attached header'>Club Category:</h5>
                    <div class='ui attached segment'>
                        <p><?php echo $category?></p>
                    </div>
                    <h5 class='ui attached header'>Club Description:</h5>
                    <div class='ui attached segment'>
                        <p><?php echo $clubDesc?></p>
                    </div>
                    <h5 class='ui attached header'>Contact Number:</h5>
                    <div class='ui attached segment'>
                        <p><?php echo $contactNum?></p>
                    </div>
                    <h5 class='ui attached header'>Website URL:</h5>
                    <div class='ui attached segment'>
                        <p><?php echo $websiteURL?></p>
                    </div>
                    <h5 class='ui attached header'>Fee Required?</h5>
                    <div class='ui attached segment'>
                        <p><?php echo $feeRequired?></p>
                    </div>
                    <h5 class='ui attached header'>Monthly Fee:</h5>
                    <div class='ui attached segment'>
                        <p><?php echo $feeCost?></p>
                    </div>
                </div>
            </div>
        </div>
    </div><?php

include("includes/footer.php");
?>
</body>
</html>