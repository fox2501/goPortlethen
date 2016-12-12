<?php

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
    $sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userName AND userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $accessID = $row["accessID"];

    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    };

}

$sql = 'UPDATE clubEvents SET title =? ,date =?,description = ? WHERE clubID = ?';
$stmt = $pdo->prepare($sql)->execute([$title,$date,$mainText,$clubID]);

header("location: /semantic/src/inc/clublandingpage.php");

    ?>