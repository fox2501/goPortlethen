<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
//connects to database server
include("includes/PDOConnect.php");

$userName = $_POST['approveUser'];

$sql = "UPDATE users SET userApproved = ? WHERE userName = ?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([1, $userName]);

header("Location: /semantic/src/inc/userApprovals.php");

?>