<?php
session_start();
include("includes/dbconnect.php");

$clubName = $_POST["editClubName"];
$clubID = $_POST['clubToEdit'];
$clubDesc = $_POST["editDescription"];
$contactNum = $_POST["editNumber"];
$websiteURL = $_POST['editURL'];
$feeRequired = $_POST['editFeeRequired'];
$feeCost = $_POST['editCost'];

echo $clubName;
echo $clubID;
echo $clubDesc;
echo $contactNum;
echo $websiteURL;
echo $feeRequired;
echo $feeCost;

//$sql = "
//UPDATE club
//SET clubName = '$clubName',
//clubDescription = '$clubDesc',
//contactNumber = '$contactNum',
//websiteURL = '$websiteURL',
//feePaid = '$feeRequired',
//feeCost = '$feeCost',
//WHERE clubID = $clubID;
//";
//$result = mysqli_query($db, $sql);
//
//header('Location: /semantic/src/inc/clubLandingPage.php');
?>