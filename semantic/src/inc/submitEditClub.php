<?php
session_start();
include("includes/dbconnect.php");

$clubName = $_POST["editClubName"];
$clubID = $_POST["clubToEdit"];
$clubDesc = $_POST["editDescription"];
$contactNum = $_POST["editNumber"];
$websiteURL = $_POST["editURL"];
$feeRequired = $_POST["editFeeRequired"];
$feeCost = $_POST["editCost"];

//FEE REQUIRED DOES NOT WORK

$sql = "
UPDATE club
SET clubName = '$clubName',
clubDescription = '$clubDesc',
contactNumber = '$contactNum',
websiteURL = '$websiteURL',
feePaid = 1,
feeCost = '$feeCost'
WHERE clubID = '$clubID';
";
$result = mysqli_query($db, $sql);

if($result){
    header('Location: /semantic/src/inc/clubLandingPage.php');
} else{
    echo $clubName."<br>";
    echo $clubID."<br>";
    echo $clubDesc."<br>";
    echo $contactNum."<br>";
    echo $websiteURL."<br>";
    echo $feeRequired."<br>";
    echo $feeCost."<br>";
}

?>