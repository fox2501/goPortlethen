<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");

$locationID = $_POST['approveMap'];

$sql = "UPDATE locations SET approvalStatus = ? WHERE locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([1, $locationID]);

header("Location: /semantic/src/inc/mapApprovals.php");

?>