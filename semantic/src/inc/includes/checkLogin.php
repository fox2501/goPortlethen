<?php

includes("dbconnect.php");

$username = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM user where username = '$username' AND password = '$password'";
$result = mysqli_query($db, $sql);

if (!$row = mysqli_fetch_assoc($result)){
    echo "Your username or password is incorrect!";
} else{
    echo "You are logged in!";
}
//header('Location: logginIn.php');
?>