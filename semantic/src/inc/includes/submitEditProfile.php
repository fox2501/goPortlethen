<?php
//session begins
session_start();

//connects to database
include("PDOConnect.php");

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
    SET firstName = ?, 
    surname = ?, 
    age = ?, 
    emailAddress = ?
    WHERE userID = ?;
";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$firstName, $surname, $age, $email, $userID]);

//redirect
header("location: ../profile.php?editedProfile");
?>