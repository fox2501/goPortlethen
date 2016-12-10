<?php
session_start();
include("includes/PDOConnect.php");

$userID = $_SESSION['loggedIn'];

//FEE REQUIRED DOES NOT WORK

$sql = "SELECT userAccessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = '?'";
$stmt =$pdo->prepare($sql);
$stmt->execute([$userID]);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $userAccessID= $row['userAccessID'];
}

$sql = "DELETE FROM useraccess WHERE userAccessID = '?'";
$pdo->prepare($sql)->execute($userAccessID);
usleep(10000);
$sql = "DELETE FROM users WHERE userID = '?'";
$pdo->prepare($sql)->execute($userID);

header('Location: /semantic/');

?>