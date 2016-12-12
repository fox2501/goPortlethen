<?php
// Session begins
session_start();

include("PDOConnect.php");

$username = htmlentities($_POST["username"]);
$password = htmlentities($_POST["password"]);

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$username]);
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$hashpass = $row['password'];
$userApproved = $row['userApproved'];
$dehashedpass = password_verify($password, $hashpass);

if($dehashedpass == 0) {
    header("Location: ../login.php?error=loginerror");
    exit();
}

if($userApproved == 0) {
    header("Location: ../login.php?error=requireApproval");
    exit();
}

else {
    $sql = "SELECT * FROM users where userName = ? AND password = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$username, $hashpass]);
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['loggedIn'] = $row['userID'];
    }
    header('Location: /semantic/');
}
?>