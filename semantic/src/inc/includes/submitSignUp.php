<?php
session_start();
include("dbconnect.php");

$firstName =  $_POST["firstName"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$age = $_POST["age"];

$error = false;

if(empty($firstName)){
    header("Location: ../signUpForm.php?error=emptyFirstName");
    $error = true;
    $EmptyirstNameError = "Please enter a first name!";
    exit();
}
if(empty($email)){
    header("Location: ../signUpForm.php?error=emptyEmail");
    $error = true;
    $emptyEmailError = "Please enter an Email Address!";
    exit();
}
if(empty($username)){
    header("Location: ../signUpForm.php?error=emptyUsername");
    $error = true;
    $emptyUsernameError = "Please enter a username!";
    exit();
}
if(empty($password)){
    header("Location: ../signUpForm.php?error=emptyPassword");
    $error = true;
    $emptyPasswordError = "Please enter a password!";
    exit();
} else if(strlen($password) < 8){
    header("Location: ../signUpForm.php?error=passwordCriteria");
    $error = true;
    $passwordCriteriaError = "Your password is shorter than 8 characters!";
}
if(empty($age)){
    header("Location: ../signUpForm.php?error=emptyAge");
    $error = true;
    $emptyAgeError = "Please enter your age!";
    exit();
}

else{
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $sql);
    $usernameCheck = mysqli_num_rows($result);
    if($usernameCheck > 0){
        header("Location: ../signUpForm.php?error=username");
        exit();
    }
    else {
        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (userName, password, emailAddress, firstName, approvalStatus, age) 
        values('$username', '$hashpass', '$email', '$firstName', '0', '$age')";

        $result = mysqli_query($db, $sql);

        header("location: /semantic/");
    }
}
?>