<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("includes/PDOConnect.php");

$locationID = $_POST['denyMap'];

$sql = "DELETE FROM locations WHERE locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$locationID]);

header("Location: /semantic/src/inc/mapApprovals.php");

?>