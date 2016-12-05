<?php


session_start();

include("includes/dbconnect.php");
$title = $_POST["title"];
$mainText = $_POST["mainText"];
$userID = $_SESSION["loggedIn"];
$datePosted = $_POST["datePosted"];

/*$imageID = new PreloadedFile($_POST['imageID']);
if (!$imageID->is_valid()) {
    echo "Invalid upload signature";
} else {
    $photo->image_identifier = $imageID->identifier();
}*/

if(isset($_SESSION['loggedIn'])) {
    echo "exists";
}
$sql = "INSERT INTO healthcontent (title, mainText, userID, approvalStatus, datePosted) VALUES ('$title', '$mainText', '$userID', '0', '$datePosted')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

header("location:health.php");

?>