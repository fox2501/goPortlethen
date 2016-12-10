<?php

session_start();

include("dbconnect.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$hashpass = $row['password'];
$dehashedpass = password_verify($password, $hashpass);

if($dehashedpass == 0){
    header("Location: ../login.php?error=loginerror");
    exit();
}else{
    $sql = "SELECT * FROM users where username = '$username' AND password = '$hashpass'";
    $result = mysqli_query($db, $sql);

    if (!$row = mysqli_fetch_assoc($result)){
        header("Location: ../login.php?error=loginerror");
        exit();
    } else{
        $_SESSION['loggedIn'] = $row['userID'];
        $_SESSION['name'] = $row['firstName'];
        $_SESSION['surname'] = $row['surname'];
    }

    header('Location: /semantic/');
}
?>