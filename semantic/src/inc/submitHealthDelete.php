<?php
session_start();
include("includes/PDOConnect.php");
$healthID =$_POST["deleteHealth"];


$sql = "DELETE FROM healthContent WHERE healthContentID = ?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([$healthID]);

session_destroy();

header('Location: /semantic/?accountDeleted');

?>