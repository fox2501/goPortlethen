<?php
session_start();
include("includes/PDOConnect.php");

$title = $_POST["title"];
$mapType = $_POST["mapType"];
$long = $_POST["long"];
$lat = $_POST["lat"];
$desc = $_POST["mapDesc"];
$userID = $_SESSION["loggedIn"];

$sql = "INSERT INTO locations (longitude, latitude, locationType, caption, locationName, approvalStatus) VALUES (?, ?, ?, ?, ?, ?)";

$pdo->prepare($sql)->execute([$long,$lat,$mapType,$desc, $title, '0']);

header("location: mapLandingPage.php");
?>