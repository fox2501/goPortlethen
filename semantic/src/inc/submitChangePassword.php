<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");

$password = htmlentities($_POST["passwordOne"]);
$passwordConfirm = htmlentities($_POST["passwordConfirm"]);
$userID = $_SESSION['loggedIn'];
//checks passwords match
if(!(empty($password)) && (!(empty($passwordConfirm)))){
    if($password == $passwordConfirm){
        $hashpass = password_hash($password, PASSWORD_BCRYPT);

        $sql = "UPDATE users SET password = '$hashpass' WHERE userID = ?";
        $stmt = $pdo -> prepare($sql)->execute([$userID]);
        header("Location: /semantic/src/inc/profile.php?passwordChanged");

    }else{
        echo "Passwords are not the same.";
    }
} else{
    echo "Please ensure you enter a new password.";
}
