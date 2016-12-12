<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");

$userID = $_SESSION['loggedIn'];

//FEE REQUIRED DOES NOT WORK

$sql = "SELECT userAccessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userAccessID = $row['userAccessID'];

$sql = "DELETE FROM useraccess WHERE userAccessID = ?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$userAccessID]);

$sql = "DELETE FROM users WHERE userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
session_destroy();

header('Location: /semantic/?accountDeleted');

?>