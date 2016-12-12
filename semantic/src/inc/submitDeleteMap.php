<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
//connects to database server
include("includes/PDOConnect.php");
$locationID = $_POST["deleteMap"];

echo $locationID;

$sql = "DELETE FROM locations WHERE locationID = ?";
$stmt = $pdo->prepare($sql)->execute([$locationID]);

//header('Location: /semantic/src/inc/mapLandingPage.php?DeletedMap');

?>