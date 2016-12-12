<?php
session_start();
include("includes/dbconnect.php");

if(isset($_SESSION['loggedIn'])){
$userID = $_SESSION['loggedIn'];
include("includes/header.php");
$healthID = $_POST["healthID"];
$canAccess = '0';
$sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userName AND userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$accessLevel = $row["accessID"];

if ($accessLevel == 1 || $accessLevel == 4) {
?>
<!DOCTYPE html>
<html>

<head>
    <title>goPortlethen</title>
</head>

<body>
<!-- Begin container -->
<div class='ui stackable center aligned container'>
    <!-- Main body -->
    <div class='ui stackable middle aligned center aligned grid'>
        <div class='ui ten wide column'>
            <form action="submitHealthDelete.php" class="ui large form" method="post">
                <div class='ui negative message'>
                    <h1 class='header'>
                        ARE YOU SURE YOU WANT TO DELETE THIS CONTENT?
                        <input type="hidden" name="deleteHealth" value='<?php echo $healthID; ?>'>
                    </h1>
                </div>
                <button class="ui fluid large red submit button" type="submit">Delete Content</button>
            </form>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
}else{
    header("Location: /semantic/src/inc/mapLandingPage.php?restricted");
}
}else{
    header("Location: /semantic/src/inc/mapLandingPage.php?restricted");
}
?>
</body>
</html>