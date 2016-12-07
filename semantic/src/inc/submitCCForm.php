<?php
echo ini_set('display_errors', 1);
echo ini_set('display_startup_errors', 1);
echo error_reporting(E_ALL);
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
if(isset($_POST['submit'])){
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
if($url!=""){
    echo "<h2>Uploaded Without Any Problem</h2>";
    echo "<img src='$url'/>";
    }else{
        echo "<h2>There's a Problem</h2>";
        echo $pms['data']['error'];
    }
    }
    $sql1 = "INSERT INTO photos (caption,url,clubID,locationID,healthContentID,routeID) VALUES ('test','$url','1','1','1','1')";

    if (mysqli_query($db, $sql1)) {
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($db);
    }


$sql = "INSERT INTO club (clubName, clubDescription, email, contactNumber, calendarID, feePaid, feeCost, url, clubCategory) 
VALUES ('$clubName', '$clubDescription', '$email', '$contactNumber', '11', '0', '0.0', 'testurl','$clubCategory')";
$result = mysqli_query($db, $sql);

//t

header("location:clubPage.php");?>