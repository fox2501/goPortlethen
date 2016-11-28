<?php

include("includes/dbconnect.php");
echo "here";
$title = $_POST["title"];

$sql = "INSERT INTO healthContent (title, mainText, userID, contentType, approvalStatus) VALUES ('$title', 'Blah', '21', 'Blah', '0')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

//header("location:health.php");

?>