<?php
session_start();
include("includes/PDOConnect.php");
$clubID =$_POST["deleteClub"];


$sql = "DELETE FROM club WHERE clubID = ?";
$stmt = $pdo->prepare($sql)->execute([$clubID]);

echo "$clubID";




//header('Location: /semantic/src/inc/clublandingpage.php');

?>