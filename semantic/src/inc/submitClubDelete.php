<?php
session_start();
include("includes/PDOConnect.php");
$clubID =$_POST["deleteClub"];


$sql = "DELETE FROM clubs WHERE clubID = ?";
$stmt = $pdo->prepare($sql)->execute([$clubID]);




header('Location: /semantic/src/inc/clublandingpage.php');

?>