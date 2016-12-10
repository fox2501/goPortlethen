<?php
session_start();
include("includes/PDOConnect.php");

$userID = $_SESSION['loggedIn'];

//FEE REQUIRED DOES NOT WORK

$sql = "SELECT userAccessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = '$userID'";
$result = mysqli_query($db, $sql);
while($row = mysqli_fetch_assoc($result)){
    $userAccessID = $row['userAccessID'];
}

$sql = "DELETE FROM useraccess WHERE userAccessID = '?'";
$pdo->prepare($sql)->execute($userAccessID);

$sql = "DELETE FROM users WHERE userID = '?'";
$pdo->prepare($sql)->execute($userID);

header('Location: /semantic/');

?>