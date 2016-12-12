<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
$eventID = htmlentities($_POST["deleteClubEvent"]);

//deletes club
$sql = "DELETE FROM clubEvents WHERE id = ?";
$stmt = $pdo->prepare($sql)->execute([$eventID]);





header('Location: /semantic/src/inc/clublandingpage.php?deletedEvent');

?>