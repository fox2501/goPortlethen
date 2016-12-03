<?php
session_start();
include("dbconnect.php");

$firstName =  $_POST["firstName"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$username = $_POST["username"];
$age = $_POST["age"];
$location = $_POST["location"];
$aboutUser = $_POST["aboutUser"];
$userID = $_SESSION['loggedIn'];

//$sql = "INSERT INTO users (userName, password, emailAddress, firstName, surname, approvalStatus, age, dateCreated)
       //values('$username', '$hashpass', '$email', '$firstName', '$surname', '0', '$age', CURRENT_TIMESTAMP)";

$sql = "UPDATE users SET firstName = $firstName, surname = $surname, age = $age, location = $location, aboutUser = $aboutUser
        WHERE userID = $userID";

$result = mysqli_query($db, $sql);

header("location: ../editProfile.php");
?>