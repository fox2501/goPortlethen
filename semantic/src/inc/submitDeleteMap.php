<?php
session_start();
include("includes/PDOConnect.php");
$locationID =$_POST["deleteMap"];


$sql = "DELETE FROM locations WHERE locationID = ?";
$stmt = $pdo->prepare($sql)->execute([$locationID]);

header('Location: /semantic/src/inc/mapLandingPage.php');

?>