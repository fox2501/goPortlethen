<?php


session_start();
//connects to database server
include("includes/PDOConnect.php");

$clubName = htmlentities($_POST["editClubName"]);
$clubID = htmlentities($_POST["clubToEdit"]);
$clubDesc = htmlentities($_POST["editDescription"]);
$contactNum = htmlentities($_POST["editNumber"]);
$websiteURL = htmlentities($_POST["editURL"]);
$feeRequired = htmlentities($_POST["editFeeRequired"]);
$feeCost = htmlentities($_POST["editCost"]);

//FEE REQUIRED DOES NOT WORK

$sql = "UPDATE club SET clubName = ?,
clubDescription =?,
contactNumber = ?,
websiteURL = ?,
feePaid = ?,
feeCost = ?
WHERE clubID = ?;
";
$pdo->prepare($sql)->execute([$clubName,$clubDesc,$contactNum,$websiteURL,1,$feeCost,$clubID]);

$img = $_FILES['img'];
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
if(empty($url)){

}
else{
    $sql3 = "DELETE FROM photos WHERE clubID =?";
    $pdo->prepare($sql3)->execute([$clubID]);
    usleep(10000);
    $caption = 'test';
    $sql1 = "INSERT INTO photos(caption,url,clubID,locationID,healthContentID,routeID, homeContentID) VALUES(?,?,?,?,?,?,?)";
    $pdo->prepare($sql1)->execute([$caption,$url,$clubID,0,0,0,0]);


}



header('Location: /semantic/src/inc/clubLandingPage.php?editedClub');

?>