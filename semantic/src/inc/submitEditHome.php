<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
$userID = $_SESSION['loggedIn'];
$title = $_POST["editTitle"];
$caption = $_POST["editCaption"];
$homeContentID = $_POST["editContent"];


$sql ="UPDATE homecontent SET title = ?,caption= ? WHERE contentID = ?";
$pdo->prepare($sql)->execute([$title,$caption, $homeContentID]);


$img = $_FILES['homePhoto'];
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
    $sql = "DELETE FROM photos WHERE homeContentID  = 1";
    $pdo->prepare($sql)->execute();
    usleep(10000);
    $sql = "INSERT INTO photos(caption,url,clubID,locationID,healthContentID,routeID, homeContentID) VALUES(?,?,?,?,?,?,?)";
    $pdo->prepare($sql)->execute(['',$url,0,0,0,0,1]);


}

header('Location: /semantic/');
?>