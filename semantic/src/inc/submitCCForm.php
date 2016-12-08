<?php
session_start();
include("includes/dbconnect.php");
$clubName = $_POST["clubName"];
$clubDescription = $_POST["clubDescription"];
$email = $_POST["email"];
$contactNumber = $_POST["phoneNumber"];
$calendarID = $_POST["calendarID"];
$feePaid = $_POST["isFee"];
$feeCost = $_POST["feeAmount"];
$clubCategory = $_POST["clubCategory"];

$img=$_FILES['img'];
    if($img['name']==''){
        echo "<h2>An Image Please.</h2>";
    }else{
        $filename = $img['tmp_name'];
        $client_id="54dbcfe7d59ad73";
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars   = array('image' => base64_encode($data));
        $timeout = 30;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close ($curl);
        $pms = json_decode($out,true);
        $url=$pms['data']['link'];
    }
$sql = "INSERT INTO club (clubName, clubDescription, email, contactNumber, calendarID, feePaid, feeCost, url, clubCategory) 
VALUES ('$clubName', '$clubDescription', '$email', '$contactNumber', '11', '0', '0.0', 'testurl','$clubCategory')";
$result = mysqli_query($db, $sql);

$sql2 ="SELECT clubID FROM club WHERE clubID = (SELECT MAX(clubID) FROM club)";
$result = mysqli_query($db, $sql2);
while($row = mysqli_fetch_assoc($result)){
    $clubID = $row['clubID'];
}

$sql1 = "INSERT INTO photos (caption,url,clubID,locationID,healthContentID,routeID) VALUES ('test','$url',$clubID,'0','0','0')";

$result = (mysqli_query($db, $sql1));

//t

header("location:clubLandingPage.php");?>