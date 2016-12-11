<?php

session_start();

include("PDOConnect.php");

$username = $_POST["username"];
$password = $_POST["password"];

//$sql = "SELECT * FROM users WHERE username = ?";
//$stmt = $pdo -> prepare($sql);
//$stmt -> execute([$username]);
//$result = mysqli_query($db, $sql);
//$row = $stmt -> fetch(PDO::FETCH_ASSOC);

$hashpass = $row['password'];
$dehashedpass = password_verify($password, $hashpass);

if($dehashedpass == 0){
    header("Location: ../login.php?error=loginerror");
    exit();
}else{
    $sql = "SELECT * FROM users where username = ? AND password = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$username, $hashpass]);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);

    if (!$row){
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