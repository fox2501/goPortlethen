<?php
session_start();
include("dbconnect.php");

$firstName =  $_POST["firstName"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$age = $_POST["age"];

global $firstNameError;
global $surnameError;
global $ageError;
global $usernameError;
global $passwordError;
global $passwordCriteriaError;
global $emailError;

$firstNameError = false;
$surnameError = false;
$ageError = false;
$usernameError = false;
$passwordError = false;
$passwordCriteriaError = false;
$emailError = false;

if(empty($firstName)){
    header("Location: ../signUpForm.php?error=formError");
    $firstNameError = true;
    exit();
}
if(empty($surnameName)){
    header("Location: ../signUpForm.php?error=formError");
    $surnameError = true;
    exit();
}
if(empty($email)){
    header("Location: ../signUpForm.php?error=formError");
    $emailError = true;
    exit();
}
if(empty($username)){
    header("Location: ../signUpForm.php?error=formError");
    $ageError = true;
    exit();
}
if(empty($password)){
    header("Location: ../signUpForm.php?error=formError");
    $usernameError = true;
    exit();
} else if (strlen($password) < 8){
    header("Location: ../signUpForm.php?error=passwordError");
    $passwordCriteriaError = true;
    exit();
}
if(empty($age)){
    header("Location: ../signUpForm.php?error=formError");
    $passwordError = true;
    exit();
}
else{
    $sql = "SELECT username FROM users WHERE username = '$username'";
    global $result;
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