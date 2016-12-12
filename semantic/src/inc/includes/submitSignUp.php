<?php
//session begins
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

//connects to database server
include("PDOConnect.php");

//puts entered fields into variables
$firstName = (htmlentities($_POST["firstName"])) ;
$surname = htmlentities($_POST["surname"]);
$email = htmlentities($_POST["email"]);
$username = htmlentities($_POST["username"]);
$password = htmlentities($_POST["password"]);
$passwordConfirm = htmlentities($_POST["passwordConfirm"]);
$age = htmlentities($_POST["age"]);
$accessRequested = htmlentities($_POST["accessRequested"]);
$requireApproval = "1";
$userApproved = "0";
$accessLevel = "0";

//sql statement that takes username entered
$sql = "SELECT username FROM users WHERE username = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$username]);
$usernameCheck = $stmt->rowCount();
if($usernameCheck > 0){
    header("Location: ../signUpForm.php?error=usernameExists");
    exit();
}
else {
    $hashpass = password_hash($password, PASSWORD_BCRYPT);
    if($accessRequested == "contributor"){
        $requireApproval = "0";
        $userApproved = "1";
        $accessLevel = "4";
    }
    if($accessRequested == "club"){
        $accessLevel = "2";
    }
    if($accessRequested == "map"){
        $accessLevel = "3";
    }
    if($accessRequested == "site"){
        $accessLevel = "1";
    }

    $sql = "INSERT INTO users (userName, password, emailAddress, firstName, surname, requireApproval, userApproved, age, location, aboutUser, dateCreated) 
        values(?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$username, $hashpass, $email, $firstName, $surname, $requireApproval, $userApproved, $age, '', '', CURRENT_DATE]);

    $sql = "INSERT INTO useraccess (accessID, userName) VALUES (?,?)";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute([$accessLevel, $username]);

    //redirect
    header("location: /semantic/?newUser");
}
?>