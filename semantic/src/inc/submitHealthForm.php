<?php

session_start();

include("includes/dbconnect.php");
$title = $_POST["title"];
$mainText = $_POST["mainText"];

$sql = "INSERT INTO healthContent (title, mainText, userID, contentType, approvalStatus) VALUES ('$title', '$mainText', '21', 'Blah', '0')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:health.php");

?>