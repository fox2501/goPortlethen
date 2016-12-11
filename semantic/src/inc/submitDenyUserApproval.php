<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("includes/PDOConnect.php");

$userName = $_POST['denyUser'];

//
//$sql = "
//SELECT U.firstName, U.emailAddress, AL.description
//FROM users U, useraccess UA, accessLevel AL
//WHERE U.userName = UA.userName
//AND UA.accessID = AL.accessID
//AND U.userName = ?";
//$stmt = $pdo->prepare($sql);
//$stmt -> execute([$userName]);
//while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
//    $firstName = $row['firstName'];
//    $emailAddress = $row['emailAddress'];
//    $accessLevel = $row['description'];
//}
//
//$subject = "Account request for goPortlethen.org.uk DENIED";

$sql = "DELETE FROM useraccess WHERE userName = ?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$userName]);

$sql = "DELETE FROM users WHERE userName = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$userName]);

header("Location: /semantic/src/inc/userApprovals.php");
?>