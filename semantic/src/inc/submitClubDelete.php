<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
$clubID = htmlentities($_POST["deleteClub"]);

//deletes club
$sql = "DELETE FROM club WHERE clubID = ?";
$stmt = $pdo->prepare($sql)->execute([$clubID]);





header('Location: /semantic/src/inc/clublandingpage.php?deletedClub');

?>