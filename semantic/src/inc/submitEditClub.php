<?php
session_start();
include("includes/dbconnect.php");

$title = $_POST["editTitle"];
$mainText = $_POST["editMainText"];
$healthContentID = $_POST["healthContentToEdit"];
$userID = $_SESSION['loggedIn'];

$sql = "
UPDATE healthcontent
SET title = '$title',
mainText = '$mainText',
WHERE healthContentID = $healthContentID;
";
$result = mysqli_query($db, $sql);

header('Location: /semantic/src/inc/health.php');
?>