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

if(isset($_POST['createClub']))
{
    $sql = "INSERT INTO club (clubName, email, clubCategory, clubDescription, contactNumber, feePaid, feeCost)
    VALUES ('".$_POST["clubName"]."','".$_POST["email"]."','".$_POST["clubCategory"]."','".$_POST["clubDescription"]."','".$_POST["contactNumber"]."','".$_POST["feePaid"]."','".$_POST["feePaid"]."','".$_POST["feeCost"]."')";

    $result = mysqli_query($conn,$sql);
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:createClubPage.php");

?>