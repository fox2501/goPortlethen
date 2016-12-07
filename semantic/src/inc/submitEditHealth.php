<?php
session_start();
include("dbconnect.php");

$title =  $_POST["editTitle"];
$mainText = $_POST["editMainText"];
$healthContentID = $_POST["editContent"];
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