<?php
session_start();
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
    <head>
        <meta charset="UTF-8">
        <title>Club Page</title>
    </head>
<?php
include("includes/header.php");

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
?>

<body>
<div class='ui container'>
    <div class = 'ui grid'>
        <div class = 'eight wide column'>
            <header class = 'ui blue huge header'><?php echo"$clubName"?> Club Profile Page</header>
        </div>

        <?php
            if ($canAccess == '1') {
        echo "<div class = 'eight wide column'>
        <form class = 'ui form' method = 'POST' action = 'editClubPage.php' onclick = '/semantic/src/inc/editClubPage.php'>
            <button class = 'ui right floated button' onclick = '/semantic/src/inc/editClubPage.php' type = 'submit'>
                <input type = 'hidden' name = 'editClub' value = $clubID>
                <i class = 'ui settings icon'></i>
        Edit Club
        </button>
            
        </form>
        </div>"
                ?>
    </div>
    <div class='ui grid'>
            <div class='four wide column'>
                <div class='ui card'>
                    <div class='image'>
                        <img
                            src='<?php echo"$photoURL"?>'>
                    </div>
                </div>
            </div>
            <div class = 'twelve wide column'>
            <div class='ui segment '>
                <h5 class='ui top attached header '>
                    Club Category:
                </h5>
                <div class='ui attached segment '>
                    <p><?php echo"$category"?></p>
                </div>
                <h5 class='ui attached header '>
                    Club Description:
                </h5>
                <div class='ui attached segment '>
                    <p><?php echo"$clubDesc"?></p>
                </div>
                <h5 class='ui attached header '>
                    Contact Number:
                </h5>
                <div class='ui attached segment '>
                    <p><?php echo"$contactNum"?></p>
                </div>
                <h5 class='ui attached header '>
                    Website URL:
                </h5>
                <div class='ui attached segment '>
                    <p><?php echo"$websiteURL"?></p>
                </div>
                <h5 class='ui attached header '>
                    Fee Required?
                </h5>
                <div class='ui attached segment '>
                    <p><?php echo"$feeRequired"?></p>
                </div>
                <h5 class='ui attached header '>
                    Monthly Fee:
                </h5>
                <div class='ui attached segment '>
                    <p><?php echo"$feeCost"?></p>
                </div>
            </div>
            </div>
        </div>
</div>
</body>


<?php
include("includes/footer.php");
?>
</html>