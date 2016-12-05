<?php

use Cloudinary\PreloadedFile;

session_start();

include("includes/dbconnect.php");
$title = $_POST["title"];
$mainText = $_POST["mainText"];
$userID = $_SESSION["loggedIn"];

/*$imageID = new PreloadedFile($_POST['imageID']);
if (!$imageID->is_valid()) {
    echo "Invalid upload signature";
} else {
    $photo->image_identifier = $imageID->identifier();
}*/

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
}

if(isset($_SESSION['loggedIn'])) {
    echo "exists";
}

$sql = "INSERT INTO healthcontent (title, mainText, userID, approvalStatus) VALUES ('$title', '$mainText', '$userID', '0')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:health.php");

?>