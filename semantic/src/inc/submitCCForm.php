<?php
echo ini_set('display_errors', 1);
echo ini_set('display_startup_errors', 1);
echo error_reporting(E_ALL);
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
$sql = "INSERT INTO club (clubName, clubDescription, email, contactNumber, calendarID, feePaid, feeCost, url, clubCategory) 
VALUES ('$clubName', '$clubDescription', '$email', '$contactNumber', '11', '0', '0.0', 'testurl','$clubCategory')";
$result = mysqli_query($db, $sql);

//tes

header("location:clubPage.php");?>