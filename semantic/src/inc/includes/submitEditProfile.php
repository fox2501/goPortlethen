<?php
session_start();
//connects to database
include("dbconnect.php");
//puts entered fields into varariables
$firstName =  $_POST["firstName"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$username = $_POST["username"];
$age = $_POST["age"];
$userID = $_SESSION['loggedIn'];
//sql statement to update on database based on entries
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