<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("includes/dbconnect.php");
$clubID = $_POST["clubID"];
$clubName = $_POST["clubName"];
$clubDescription = $_POST["clubDescription"];
$email = $_POST["email"];
$contactNumber = $_POST["phoneNumber"];
$calendarID = $_POST["calendarID"];
$feePaid = $_POST["isFee"];
$feeCost = $_POST["feeAmount"]; 
$clubCategory = $_POST["clubCategory"];
$sql = "INSERT INTO club (clubID, clubName, clubDescription, email, contactNumber, calendarID, feePaid, feeCost, clubCategory) 
VALUES ('0', '$clubName', '$clubDescription', '$email', '$contactNumber', '1', '0', '0.0', '$clubCategory')";
$result = mysqli_query($db, $sql);

//test

header("location:clubPage.php");?>