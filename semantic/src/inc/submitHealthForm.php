<?php


session_start();

include("includes/dbconnect.php");
$title = $_POST["title"];
$mainText = $_POST["mainText"];
$userID = $_SESSION["loggedIn"];
$date = $_POST["date"];

if(isset($_SESSION['loggedIn'])) {
    echo "exists";
}

$sql = "INSERT INTO healthcontent (title, mainText, userID, approvalStatus, date) VALUES ('$title', '$url', '$userID', '0', '$date')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:health.php");

?>