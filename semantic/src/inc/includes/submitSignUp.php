<?php
//session begins

session_start();

//connects to database server
include("dbconnect.php");

//puts entered fields into variables
$firstName = (htmlentities($_POST["firstName"])) ;
$surname = $_POST["surname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$passwordConfirm = $_POST["passwordConfirm"];
$age = htmlentities($_POST["age"]);
$accessRequested = $_POST["accessRequested"];
$requireApproval = "1";
$userApproved = "0";
$accessLevel = "0";

//sql statement that takes username entered
$sql = "SELECT username FROM users WHERE username = '$username'";
$result = mysqli_query($db, $sql);
$usernameCheck = mysqli_num_rows($result);
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
        values('$username', '$hashpass', '$email', '$firstName', '$surname', '$requireApproval', $userApproved, '$age', '', '', CURRENT_DATE)";
    $result = mysqli_query($db, $sql);

    $sql = "INSERT INTO useraccess (accessID, userName) VALUES ('$accessLevel', '$username')";
    $result = mysqli_query($db, $sql);

    //redirect
    header("location: /semantic/?newUser");
}
?>