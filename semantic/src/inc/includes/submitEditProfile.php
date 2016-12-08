<?php
session_start();
include("dbconnect.php");

$firstName =  $_POST["firstName"];
$surname = $_POST["surname"];
$email = $_POST["emailAddress"];
$username = $_POST["username"];
$age = $_POST["age"];
$userID = $_SESSION['loggedIn'];

$sql = "
UPDATE users 
SET firstName = '$firstName', 
surname = '$surname', 
age = $age, 
emailAddress = '$email'
WHERE userID = $userID;
";
$result = mysqli_query($db, $sql);

header("location: ../profile.php");
?>