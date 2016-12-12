<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");

$clubCategory = $_POST["search"];
$clubName = $_POST["search"];

$sql = "SELECT * FROM clubs WHERE $clubCategory = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$clubCategory]);

header("Location: /semantic/src/inc/clubLandingPageSearched.php");
?>