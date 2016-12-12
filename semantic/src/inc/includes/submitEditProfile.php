<?php
//session begins
session_start();

//connects to database
include("dbconnect.php");

//puts entered fields into variables
$firstName =  htmlentities($_POST["firstName"]);
$surname = htmlentities($_POST["surname"]);
$email = htmlentities($_POST["email"]);
$username = htmlentities($_POST["username"]);
$age = htmlentities($_POST["age"]);
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

//redirect
header("location: ../profile.php");
?>