<?php

include("includes/dbconnect.php");

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
}