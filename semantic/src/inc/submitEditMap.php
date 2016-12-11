<?php
session_start();
include("includes/PDOConnect.php");

$locationID = $_POST['editMap'];
$title = $_POST['title'];
$mapType = $_POST['mapType'];
$lat = $_POST['lat'];
$lng = $_POST['long'];
$mapDesc = $_POST['mapDesc'];

$sql = "UPDATE locations SET locationName = ?, mapType = ?, latitude = ?, longitude = ?, caption = ? WHERE locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$title, $mapType, $lat, $lng, $mapDesc, $locationID]);

header("Location: ../mapLandingPage.php");

?>
