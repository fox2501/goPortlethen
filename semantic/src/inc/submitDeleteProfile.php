<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("includes/PDOConnect.php");
include("includes/dbconnect.php");

$userID = $_SESSION['loggedIn'];

//FEE REQUIRED DOES NOT WORK

$sql = "SELECT userAccessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = $userID";
$stmt = $pdo->prepare($sql)->execute([$userID]);

while($row = $stmt->fetch()){
    $userAccessID = $row['userAccessID'];
}
//$result = mysqli_query($db, $sql);
//while($row = $result ->fetch_assoc()){
//    $userAccessID = $row['userAccessID'];
//}


$sql = "DELETE FROM useraccess WHERE userAccessID = '?'";
$execute = $pdo->prepare($sql)->execute([$userAccessID]);

if ($execute)
{
    $sql = "DELETE FROM users WHERE userID = '?'";
    $pdo->prepare($sql)->execute($userID);

    header('Location: /semantic/');
} else{
    header('Location: /semantic/src/inc/deleteProfile.php');
    exit();
}


?>