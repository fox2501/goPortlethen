<?php
session_start();
include("dbconnect.php");

$displayName =  $_POST["displayName"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$age = $_POST["age"];


$sql = "INSERT INTO users (userName, password, emailAddress, displayName, approvalStatus, age) 
values('$username', '$password', '$email', '$displayName', '0', '$age')";

$result = mysqli_query($db, $sql);

header("location: /semantic/")
?>