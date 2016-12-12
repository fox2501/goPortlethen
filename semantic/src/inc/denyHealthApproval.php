<?php

session_start();
//connects to database server
include("includes/PDOConnect.php");

$healthContentID = htmlentities($_POST['denyHealth']);

$sql = "DELETE FROM healthcontent WHERE healthContentID = ?";
$stmt = $pdo ->prepare($sql)->execute([$healthContentID]);

header("Location: /semantic/src/inc/healthApprovals.php?contentDenied");

?>