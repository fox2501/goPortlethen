<?php


session_start();

include("includes/dbconnect.php");
$title = $_POST["title"];
$mainText = $_POST["mainText"];
$userID = $_SESSION["loggedIn"];

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
echo $url;
//$sql = "INSERT INTO healthcontent (title, mainText, userID, approvalStatus) VALUES ('$title', '$mainText', '$userID', '0')";
//
//$result = (mysqli_query($db, $sql));
//
//$sql2 ="SELECT healthContentID FROM healthContent WHERE healthContentID = (SELECT MAX(healthContentID) FROM healthContent)";
//
//$result = mysqli_query($db, $sql2);
//
//while($row = mysqli_fetch_assoc($result)){
//    $healthID = $row['healthContentID'];
//}
//
//$sql = "INSERT INTO photos (caption,url,clubID,locationID,healthContentID,routeID) VALUES ('test','$url','0','0','$healthID','0')";
//
//$result = (mysqli_query($db, $sql));
//
//
//header("location:health.php");
//g
?>