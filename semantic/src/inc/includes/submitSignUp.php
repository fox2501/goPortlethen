<?php
session_start();
include("dbconnect.php");

$firstName =  $_POST["firstName"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$passwordConfirm = $_POST["passwordConfirm"];
$age = $_POST["age"];
$approvalStatus = $_POST["accessRequested"];

if(empty($firstName)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
if(empty($surname)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
if(empty($email)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
//else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  //  header("Location: ../signUpForm.php?error=formError");
    //exit();
//}
if(empty($username)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
if(empty($password)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
if(empty($passwordConfirm)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
//else if (strlen($password) < 8){
  //  header("Location: ../signUpForm.php?error=formError");
    //exit();
//}
if(empty($age)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
if(empty($approvalStatus)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
} elseif($approvalStatus == 'Contributor'){
    $approvalStatus = 0;
} elseif($approvalStatus == 'Club Admin' || $approvalStatus == 'Site Admin' || $approvalStatus == 'Map Admin'){
    $approvalStatus = 1;
}
else{
    $sql = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $sql);
    $usernameCheck = mysqli_num_rows($result);
    if($usernameCheck > 0){
        header("Location: ../signUpForm.php?error=username");
        exit();
    } else if(!($password == $passwordConfirm)){
        header("Location: ../signUpForm.php?error=passwordConfirm");
        exit();
    }
    else {
        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (userName, password, emailAddress, firstName, surname, approvalStatus, age, location, aboutUser, dateCreated) 
        values('$username', '$hashpass', '$email', '$firstName', '$surname', '$approvalStatus', '$age', NULL, NULL, CURRENT_DATE)";

        $result = mysqli_query($db, $sql);

        header("location: /semantic/");
    }
}
?>