<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("includes/PDOConnect.php");
$userID          = $_SESSION['loggedIn'];
$clubName        = $_POST["clubName"];
$clubDescription = $_POST["clubDescription"];
$email           = $_POST["email"];
$contactNumber   = $_POST["phoneNumber"];
//$feePaid         = $_POST["feeRequired"];
if (empty($feePaid)) {
    $feePaid = 0;
}
$feeCost = $_POST["feeAmount"];
if (empty($feeCost)) {
    $feeCost = 0;
}
$clubCategory = $_POST["clubCategory"];


$img = $_FILES['img'];
if ($img['name'] == '') {
    echo "<h2>An Image Please.</h2>";
} else {
    $filename  = $img['tmp_name'];
    $client_id = "54dbcfe7d59ad73";
    $handle    = fopen($filename, "r");
    $data      = fread($handle, filesize($filename));
    $pvars     = array(
        'image' => base64_encode($data)
    );
    $timeout   = 30;
    $curl      = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Authorization: Client-ID ' . $client_id
    ));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close($curl);
    $pms = json_decode($out, true);
    $url = $pms['data']['link'];
}

$timestamp = time();

$sql    = "INSERT INTO club (clubName, clubDescription, email, contactNumber, feePaid, feeCost, websiteURL, clubCategory,TIMESTAMP, userID)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$pdo->prepare($sql)->execute([$clubName,$clubDescription,$email,$contactNumber,$feePaid,$feeCost,'',$clubCategory,$timestamp,$userID]);

usleep(10000);

$clubID = $pdo->lastInsertId();

$sql1 = "INSERT INTO photos (caption,url,clubID,locationID,healthContentID,routeID) VALUES (?,?,?,?,?,?)";

$pdo->prepare($sql1)->execute(['',$url,$clubID,0,0,0]);


    header("location:clubLandingPage.php");

?>