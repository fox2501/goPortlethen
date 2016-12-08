<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
include("includes/PDOConnect.php");

$title = $_POST["editTitle"];
$mainText = $_POST["editMainText"];
$healthContentID = $_POST["healthContentToEdit"];
$userID = $_SESSION['loggedIn'];

$sql ="UPDATE healthcontent SET title = ?,mainText= ? WHERE healthContentID = ?";
$pdo->prepare($sql)->execute([$title,$mainText,$healthContentID]);


//$sql = "
//UPDATE healthcontent
//SET title = '$title',
//mainText = '$mainText',
//WHERE healthContentID = $healthContentID;
//";
//$result = mysqli_query($db, $sql);

header('Location: /semantic/src/inc/health.php');
?>