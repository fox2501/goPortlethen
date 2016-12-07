<?php
session_start();
include("includes/dbconnect.php");

$title = $_POST["editTitle"];
$mainText = $_POST["editMainText"];
$healthContentID = $_POST["editContent"];
$userID = $_SESSION['loggedIn'];

//$sql = "
//UPDATE healthContent
//SET title = '$title',
//mainText = '$mainText',
//WHERE healthcontentID = 1161;
//";
//$result = mysqli_query($db, $sql);

echo $title;
echo $mainText;
echo $healthContentID;
?>