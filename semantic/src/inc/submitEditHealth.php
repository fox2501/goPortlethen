<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
include("includes/PDOConnect.php");

$title = $_POST["editTitle"];
$mainText = $_POST["editMainText"];
$healthContentID = $_POST["healthContentToEdit"];
$userID = $_SESSION['loggedIn'];

$sql ="UPDATE healthcontent SET title = ?,mainText= ? WHERE healthContentID = ?";
$pdo->prepare($sql)->execute([$title,$mainText,$healthContentID]);

$title = $_POST["title"];
$mainText = $_POST["mainText"];
$userID = $_SESSION["loggedIn"];

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


$stmt = $pdo->query("SELECT FROM healthContent WHERE healthContentID = $healthContentID");

while ($row = $stmt->fetch()){
    $healthID = $row['healthContentID'];
}


$caption = 'test';
$sql1 = "INSERT INTO photos(caption,url,clubID,locationID,healthContentID,routeID) VALUES(?,?,?,?,?,?)";

$pdo->prepare($sql1)->execute([$caption,$url,0,0,$healthID,0]);

header('Location: /semantic/src/inc/health.php');
?>