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

$sql = "INSERT INTO club (clubName, clubDescription, email, contactNumber, calendarID, feePaid, feeCost, clubCategory) 
VALUES ('$clubName', '$clubDescription', '$email', '$contactNumber', '0', '0', '0.0', '$clubCategory')";
$result = mysqli_query($db, $sql);

//test

header("location: ../clubPage.php");?>