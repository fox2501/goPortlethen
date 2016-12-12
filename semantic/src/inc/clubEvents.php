<?php
session_start();
//connects to database server
include("includes/dbconnect.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$clubID = $_POST['clubEvent'];

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT userName from users WHERE userID = '$userID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = '$userName'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $accessID = $row["accessID"];
    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
$sql = 'SELECT * FROM club WHERE clubID = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$clubID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$clubName = $row['clubName'];
?>
!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <title>GoPortlethen</title>
</head>

<? include("includes/header.php"); ?>
<!--main body-->
<body>

<h1 align="center"><?php echo $clubName;?> Events</h1>
<div class="ui horizontal section divider">
    <p>Keeping Portlethen Healthy</p>
</div>
