<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("includes/PDOConnect.php");
$clubID = $_POST['clubEvent'];

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';

    $sql = "SELECT userName from users WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userName]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $accessID = $row["accessID"];
    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
else{
    $canAccess = 0;
}
$sql = 'SELECT * FROM club WHERE clubID = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$clubID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$clubName = $row['clubName'];
?>
!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <title>GoPortlethen</title>
</head>

<? include("includes/header.php"); ?>
<!--main body-->
<body>

<h1 align="center"><?php echo $clubName;?> Events</h1>
<div class="ui stackable two column grid">
    <div class="ten wide column">
        <?php
        if ($canAccess == '1') {
            echo "<div class='row'>
                            <a href='createClubEvent.php'.php'>
                                <button class='ui green submit button' style='margin-right:50px'>Create Club Event</button>
                            </a>
                            </div>";
        }
        ?>

        <div class="row">
            <ul>
                <?php
                $sql= "SELECT * FROM clubevents WHERE clubID = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$clubID]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $title = $row['title'];
                    $created = $row['created'];
                    $description = $row['description'];
                        echo "
            <div class='ui raised segment'>
                <div class='ui stackable container'>
                    <div class='ui stackable grid'>
                        <div class='four wide column'>
                            <h3 class='ui header' id='title'>$title</h3>
                            <h4 class='ui header' id='datePosted'>$created</h4>
                        </div>
                        <div class='seven wide column'>
                            <p id='mainText' style='text - align:justify'>$description<br></p>
                        </div>";
                        if($canAccess == 1){
                        echo "<div class='two wide column'>
                            <form action='editClubEvent.php' class='ui form' method='post'>
                                <button class='ui right floated mini button' onclick='/semantic/src/inc/editClubEvent.php' type='submit'><input name='editClub' type='hidden' value='$clubID'>Edit</button> 
                            </form>
                        </div>
                        }
                        
                    </div>
                </div>
            </div>
            <div class='ui hidden section divider'></div>
        ";


                } ?>
            </ul>
        </div>
    </div>
</div>
