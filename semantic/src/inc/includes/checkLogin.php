<?php

$username = $_POST["email"];
$password = $_POST["password"];

if ($username == "email" && $password == "password") {
    setcookie('access_level_cookie', 'standarduser');
}
header('Location: logginIn.php');

?>