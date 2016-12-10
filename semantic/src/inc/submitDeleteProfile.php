<?php
session_start();
include("includes/PDOConnect.php");

$userID = $_POST["deleteProfile"];

//FEE REQUIRED DOES NOT WORK

$sql = "DELETE FROM users
WHERE userID = '?'
";
$pdo->prepare($sql)->execute($userID);

header('Location: /semantic/');

?>