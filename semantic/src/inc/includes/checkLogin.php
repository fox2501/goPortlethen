<?php

include("dbconnect.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users where username = '$username' AND password = '$password'";
$result = mysqli_query($db, $sql);

if (!$row = mysqli_fetch_assoc($result)){
    echo "Your username or password is incorrect!";
} else{
    $_SESSION['loggedIn'] = $row['userID'];
}

header('Location: /semantic/');
?>