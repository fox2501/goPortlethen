<?php
session_start();
include("includes/PDOConnect.php");

$healthContentID = $_POST['approveHealth'];

$sql = "UPDATE healthcontent SET approvalStatus = ? WHERE healthContentID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([1, $healthContentID]);

header("Location: /semantic/src/inc/healthApprovals.php");

?>