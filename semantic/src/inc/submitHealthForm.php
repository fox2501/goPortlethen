<?php

include("includes/dbconnect.php");

$title = $_POST["title"];

$sql = "INSERT INTO healthContent (title, mainText, userID, contentType) VALUES ('$title', NULL, NULL, NULL)";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br"> . mysqli_error($db);
}

header("location:health.php");

?>