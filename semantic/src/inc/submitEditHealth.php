<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
$userID = $_SESSION['loggedIn'];
$title = $_POST["editTitle"];
$mainText = $_POST["editMainText"];
$healthContentID = $_POST["healthContentToEdit"];
$approvalStatus = 1;

$sql = "SELECT accessID from useraccess UA, users U where UA.userName = U.userName AND U.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $accessLevel = $row['accessID'];
}
if($accessLevel = 4){
    $approvalStatus = 0;
}
//ACCESS LEVEL QUERY IS ABOVE. IF ACCESSLEVEL = 4 THEN NEEDS APPROVAL, SO UPDATE APPROVAL STATUS TO 0.
// IF ACCESSLEVEL = 1 THEN APPROVAL STATUS IS SET TO 1. I THINK...

$sql ="UPDATE healthcontent SET title = ?,mainText= ?, approvalStatus =? WHERE healthContentID = ?";
$pdo->prepare($sql)->execute([$title,$mainText,$approvalStatus, $healthContentID]);


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

$sql2 = "SELECT * FROM healthcontent WHERE healthContentID =?";
$stmt =$pdo->prepare($sql2);
$stmt->execute([$healthContentID]);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $healthID = $row['healthContentID'];
}

if(empty($url)){

}
else{
    $sql3 = "DELETE FROM photos WHERE healthContentID =?";
    $pdo->prepare($sql3)->execute([$healthID]);
    usleep(10000);
    $caption = 'test';
    $sql1 = "INSERT INTO photos(caption,url,clubID,locationID,healthContentID,routeID) VALUES(?,?,?,?,?,?)";
    $pdo->prepare($sql1)->execute([$caption,$url,0,0,$healthID,0]);


}


header('Location: /semantic/src/inc/health.php');
?>