<?php   
session_start();
  
include("dbconnect.php");
  
$clubName = $_POST["clubName"];
 
$email = $_POST["email"];
 
$clubCategory = $_POST["clubCategory"];
 
$clubDescription = $_POST["clubDescription"];
 
$phoneNumber = $_POST["phoneNumber"];
 
$isFee = $_POST["isFee"];
 
$feeAmount = $_POST["feeAmount"];
 
$userID = $_SESSION['loggedIn'];
  /*$imageID = new PreloadedFile($_POST['imageID']); if (!$imageID->is_valid()) {    echo "Invalid upload signature"; } else {    $photo->image_identifier = $imageID->identifier(); }*/
  
$sql = "INSERT INTO club (clubName, email, clubCategory, clubDescription, contactNumber, feePaid, feeCost) 
    VALUES ('$clubName', '$email', '$clubCategory', '$clubDescription', '$phoneNumber', '$isFee', '$feeAmount', '$userID')";
  
$result = mysqli_query($db, $sql);
   
header("location:createClubPage.php");
   ?>