<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
$healthID =$_POST["deleteHealth"];


$sql = "DELETE FROM healthContent WHERE healthContentID = ?";
$stmt = $pdo->prepare($sql)->execute([$healthID]);

echo "$healthID";


header('Location: /semantic/src/inc/health.php?contentDeleted');

?>