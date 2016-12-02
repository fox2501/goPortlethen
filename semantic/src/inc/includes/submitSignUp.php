<?php
session_start();
include("dbconnect.php");

$firstName =  $_POST["firstName"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$age = $_POST["age"];

if(empty($firstName)){
    header("Location: ../signUpForm.php?error=formError");

    exit();
}
if(empty($surnameName)){
    header("Location: ../signUpForm.php?error=formError");

    exit();
}
if(empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
    header("Location: ../signUpForm.php?error=formError");
    exit();
}
if(empty($username)){
    header("Location: ../signUpForm.php?error=formError");

    exit();
}
if(empty($password)){
    header("Location: ../signUpForm.php?error=formError");

    exit();
} else if (strlen($password) < 8){
    header("Location: ../signUpForm.php?error=passwordError");

    exit();
}
if(empty($age)){
    header("Location: ../signUpForm.php?error=formError");

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

        $sql = "INSERT INTO users (userName, password, emailAddress, firstName, surname, approvalStatus, age) 
        values('$username', '$hashpass', '$email', '$firstName', '$surname', '0', '$age')";

        $result = mysqli_query($db, $sql);

        header("location: /semantic/");
    }
}
?>