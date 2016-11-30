<?php

session_start();

include("includes/dbconnect.php");

$clubName = $_POST["clubName"];
$email = $_POST["email"];
$clubCategory = $_POST["clubCategory"];
$clubDescription = $_POST["clubDescription"];
$phoneNumber = $_POST["phoneNumber"];
$isFee = $_POST["isFee"];
$feeAmount = $_POST["feeAmount"];
$userID = $_SESSION['loggedIn'];

/*$imageID = new PreloadedFile($_POST['imageID']);
if (!$imageID->is_valid()) {
   echo "Invalid upload signature";
} else {
   $photo->image_identifier = $imageID->identifier();
}*/


$sql = "INSERT INTO club (clubName, email, clubCategory, clubDescription, contactNumber, feePaid, feeCost) VALUES ('$clubName', '$email', '$clubCategory', '$clubCategory', )";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:createClubPage.php");

?>