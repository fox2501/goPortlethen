<?php

//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");

$locationID = htmlentities($_POST['approveMap']);

$sql = "UPDATE locations SET approvalStatus = ? WHERE locationID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([1, $locationID]);

header("Location: /semantic/src/inc/mapApprovals.php");

?>