<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");

$title = $_POST["title"];
$mapType = $_POST["mapType"];
$long = $_POST["long"];
$lat = $_POST["lat"];
$desc = $_POST["mapDesc"];
$userID = $_SESSION["loggedIn"];
$approvalStatus = 1;

$userID = $_SESSION['loggedIn'];;
$sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userName AND U.userID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$userID]);
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$accessID = $row["accessID"];

if ($accessID == '4'){
    $approvalStatus = 0;
}

$sql = "INSERT INTO locations (longitude, latitude, locationType, caption, locationName, approvalStatus) VALUES (?, ?, ?, ?, ?, ?)";

$pdo->prepare($sql)->execute([$long,$lat,$mapType,$desc, $title, $approvalStatus]);

if($accessID == 4){
    header("location: /semantic/src/inc/mapLandingPage.php?newMapApproval");
}
if($accessID == 1 || $accessID == 3){
    header("location: /semantic/src/inc/mapLandingPage.php?newMapSubmitted");
}

?>