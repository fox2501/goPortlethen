<?php
session_start();
include("includes/PDOConnect.php");

$clubCategory = $_POST['clubCategory'];

$stmt = $pdo->prepare($sql);
$stmt->execute([$clubCategory]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$clubCategory = $row["clubCategory"];
$sql = "SELECT * FROM clubs WHERE clubCategory = ?";



header ("Location: /semantic/src/inc/clubLandingPageSearched.php");
?>