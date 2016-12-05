<?php
session_start();
include("includes/dbconnect.php");
  
$clubName = $_POST["clubName"];
$clubDescription = $_POST["clubDescription"];
$email = $_POST["email"];
$contactNumber = $_POST["phoneNumber"];
$calendarID = $_POST["calendarID"];
$feePaid = $_POST["isFee"];
$feeCost = $_POST["feeAmount"]; 
$clubCategory = $_POST["clubCategory"];

  /*$imageID = new PreloadedFile($_POST['imageID']); if (!$imageID->is_valid()) {    echo "Invalid upload signature"; } else {    $photo->image_identifier = $imageID->identifier(); }*/
  
$sql = "
INSERT INTO club (clubName, clubDescription, email, contactNumber, calendarID, feePaid, feeCost, clubCategory) 
VALUES ('$clubName', '$clubDescription', '$email', '$contactNumber', '$calendarID', '$feePaid', '$feeCost', '', '$clubCategory')
";
$result = mysqli_query($db, $sql);

header("location: ../clubPage.php");
   ?>