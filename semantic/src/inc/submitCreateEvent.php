<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//connects to database server
include("includes/PDOConnect.php");
$clubID = htmlentities($_POST['createClubEvent']);
$title = htmlentities($_POST['title']);
$date = htmlentities($_POST['date']);
$mainText = htmlentities($_POST['mainText']);
if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT userName from users WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userName]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $accessID = $row["accessID"];

    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    };
    $clubID = $_POST['submitCreateEvent'];
}

$sql = 'INSERT INTO clubEvents(title,date,description,clubID) VALUES(?,?,?,?)';
$stmt = $pdo->prepare($sql)->execute([$title,$date,$mainText,$clubID]);

echo $clubID;

    ?>