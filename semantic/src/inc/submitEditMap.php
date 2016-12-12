<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//connects to database server
include("includes/PDOConnect.php");

$userID = $_SESSION['loggedIn'];
$sql = "SELECT UA.accessID FROM useraccess UA, users U WHERE UA.userName = U.userName AND U.userID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$userID]);
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$accessLevel = $row['accessID'];

$locationID = $_POST['editMap'];
$title = $_POST['title'];
$mapType = $_POST['mapType'];
$lat = $_POST['lat'];
$lng = $_POST['long'];
$mapDesc = $_POST['mapDesc'];

$sql = "UPDATE locations SET locationName = ?, locationType = ?, latitude = ?, longitude = ?, caption = ? WHERE locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$title, $mapType, $lat, $lng, $mapDesc, $locationID]);


if($accessLevel == 4){
    header("Location: /semantic/src/inc/mapLandingPage.php?mapEditApproval");
}
if($accessLevel == 1 || $accessLevel == 3){
    header("Location: /semantic/src/inc/mapLandingPage.php?mapEdited");
}


?>
