<?php
//error reporting / debug

session_start();
//connects to database server
include("includes/PDOConnect.php");

$locationID = $_POST['denyMap'];

$sql = "DELETE FROM locations WHERE locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$locationID]);

header("Location: /semantic/src/inc/mapApprovals.php?contentApproved");

?>