<?php

session_start();

include("includes/PDOConnect.php");
$userID = $_SESSION["loggedIn"];
$title = $_POST["title"];
$mainText = $_POST["mainText"];

$sql = "SELECT userName from users WHERE userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$userName = $row["userName"];

$sql = "SELECT accessID from useraccess where userName = ? ";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userName]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$accessID = $row["accessID"];
$accessLevel = $row["accessID"];

$img = $_FILES['healthPhoto'];
if(empty($img)){
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

$approvalLvl = 0;
$sql = "INSERT INTO healthcontent (title, mainText, userID, approvalStatus) VALUES (?, ?, ?, ?)";
if($accessLevel == 1){
    $approvalLvl = 1;

}
if($accessLevel == 4){
    $approvalLvl = 0;
}
$pdo->prepare($sql)->execute([$title,$mainText,$userID,$approvalLvl]);

$healthID = $pdo->lastInsertId();

$sql = "INSERT INTO photos (caption,url,clubID,locationID,healthContentID,routeID) VALUES (?,?,?,?,?,?)";
$pdo->prepare($sql)->execute(['',$url,0,0,$healthID,0]);



header("location:health.php");
?>