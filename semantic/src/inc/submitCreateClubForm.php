<?php   
session_start();
include("..includes/dbconnect.php");
  
$clubName = $_POST["clubName"];
$email = $_POST["email"];
$clubCategory = $_POST["clubCategory"];
$clubDescription = $_POST["clubDescription"];
$phoneNumber = $_POST["phoneNumber"];
$contactNumber = $_POST["contactNumber"];
$calendarID = $_POST["calendarID"];
$feePaid = $_POST["feePaid"];
$feeCost = $_POST["feeCost"];
 
  /*$imageID = new PreloadedFile($_POST['imageID']); if (!$imageID->is_valid()) {    echo "Invalid upload signature"; } else {    $photo->image_identifier = $imageID->identifier(); }*/
  
$sql = "
INSERT INTO club (clubName, clubDescription, email, contactNumber, calendarID, feePaid, feeCost, url, clubCategory) 
    VALUES ('$clubName', '$clubDescription', '$email', '$contactNumber', '$calendarID', '$feePaid', '$feeCost', '', '$clubCategory')";
  
$result = mysqli_query($db, $sql);
   
header("location: ../clubpage.php");
   ?>