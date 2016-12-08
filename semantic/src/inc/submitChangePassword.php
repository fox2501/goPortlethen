<?php
session_start();
include("dbconnect.php");

$password = $_POST["passwordOne"];
$passwordConfirm = $_POST["passwordConfirm"];
$userID = $_SESSION['loggedIn'];

if(!(empty($password)) && (!(empty($passwordConfirm)))){
    if($password == $passwordConfirm){
        $hashpass = password_hash($password, PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password = '$hashpass' WHERE userID = $userID'";
        $result = mysqli_query($db, $sql);
        header("Location: /semantic/src/inc/profile.php");

    }else{
        echo "Passwords are not the same.";
    }
} else{
    echo "Please ensure you enter a new password.";
}
