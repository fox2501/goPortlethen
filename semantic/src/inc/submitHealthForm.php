<?php

include("dbconnect.php");

$title = $_POST["title"];

$sql = "INSERT INTO healthContent (title) VALUES ('$title')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br"> . mysqli_error($db);
}

header("location:health.php");

?>