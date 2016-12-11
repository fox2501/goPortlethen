<?php
session_start();
include("includes/PDOConnect.php");
$healthID =$_POST["deleteHealth"];


$sql = "DELETE FROM healthContent WHERE healthContentID = ?";
$stmt = $pdo->prepare($sql)->execute([$healthID]);

echo "$healthID";


//header('Location: /semantic/');

?>