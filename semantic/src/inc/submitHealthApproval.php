<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("includes/dbconnect.php");

$healthContentID = $_POST['approveHealth'];

$sql = "UPDATE healthcontent SET approvalStatus = 1 WHERE healthContentID = $healthContentID";
$result = mysqli_query($db, $sql);

header("Location: /semantic/src/inc/approvals.php");

?>