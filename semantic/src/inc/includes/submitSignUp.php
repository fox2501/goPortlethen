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
$requireApproval = $_POST["requireApproval"];
$userApproved = 0;

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
if($requireApproval = 0){
    $requireApproval = 0;
    $userApproved = 1;
} elseif(!($requireApproval = 0)){
    $requireApproval = 1;
    $userApproved = 0;
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

        $sql = "INSERT INTO users (userName, password, emailAddress, firstName, surname, requireApproval, userApproved, age, location, aboutUser, dateCreated) 
        values('$username', '$hashpass', '$email', '$firstName', '$surname', '$requireApproval', $userApproved, '$age', '', '', CURRENT_DATE)";

        $result = mysqli_query($db, $sql);

        header("location: /semantic/");
    }
}
?>