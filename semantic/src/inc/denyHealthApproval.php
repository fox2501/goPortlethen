<?php
//error reporting / debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
//connects to database server
include("includes/dbconnect.php");

$healthContentID = $_POST['denyHealth'];

$sql = "DELETE FROM healthcontent WHERE healthContentID = $healthContentID";
$result = mysqli_query($db, $sql);

header("Location: /semantic/src/inc/healthApprovals.php");

?>