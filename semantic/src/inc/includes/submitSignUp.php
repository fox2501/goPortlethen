<?php
session_start();
include("dbconnect.php");

$displayName =  $_POST["displayName"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$age = $_POST["age"];

if(empty($displayName)){
    header("Location: ../signUpForm.php?error=empty");
    exit();
}
if(empty($email)){
    header("Location: ../signUpForm.php?error=empty");
    exit();
}
if(empty($username)){
    header("Location: ../signUpForm.php?error=empty");
    exit();
}
if(empty($password)){
    header("Location: ../signUpForm.php?error=empty");
    exit();
}
if(empty($age)){
    header("Location: ../signUpForm.php?error=empty");
    exit();
}

$sql = "INSERT INTO users (userName, password, emailAddress, displayName, approvalStatus, age) 
values('$username', '$password', '$email', '$displayName', '0', '$age')";

$result = mysqli_query($db, $sql);

header("location: /semantic/")
?>