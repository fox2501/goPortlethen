<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("includes/PDOConnect.php");
include("includes/dbconnect.php");

$userID = $_SESSION['loggedIn'];

//FEE REQUIRED DOES NOT WORK

$sql = "SELECT userAccessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userAccessID = $row['userAccessID'];

echo $userAccessID;
echo $userID;

//$sql = "DELETE FROM useraccess WHERE userAccessID = '?'";
//$stmt = $pdo->prepare($sql);
//$stmt -> execute([$userAccessID]);
//
//$sql = "DELETE FROM users WHERE userID = '?'";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$userID]);
//header('Location: /semantic/?accountDeleted');

?>