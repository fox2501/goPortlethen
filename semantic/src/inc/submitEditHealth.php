<?php
session_start();
include("dbconnect.php");

$title =  $_POST["title"];
$mainText = $_POST["mainText"];
$healthContentID = $_POST["healthContentID"];
$userID = $_SESSION['loggedIn'];

$sql = "
UPDATE healthContent 
SET title = '$title', 
mainText = '$mainText',
WHERE healthContentID = $healthContentID;
";
$result = mysqli_query($db, $sql);

header("location:health.php");
?>