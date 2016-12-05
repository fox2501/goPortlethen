<?php
session_start();
include("dbconnect.php");

$title =  $_POST["title"];
$mainText = $_POST["mainText"];
$datePosted = $_POST["datePosted"];
$userID = $_SESSION['loggedIn'];

$sql = "
UPDATE healthContent 
SET title = '$title', 
mainText = '$mainText', 
datePosted = '$datePosted', 
WHERE userID = $userID;
";
$result = mysqli_query($db, $sql);

header("location:health.php");
?>