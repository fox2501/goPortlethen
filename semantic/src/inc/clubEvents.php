<?php
session_start();


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
    usleep(10000);
    $sql = "SELECT userID FROM club WHERE userID =?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $clubUserID = $row['userID'];
    if ($accessID == '1' || $userID == $clubUserID) {
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Club Events</title>
</head>

<? include("includes/header.php"); ?>
<!--main body-->
<body>

<h1 align="center"><?php echo $clubName;?> Events</h1>
<div class="ui stackable two column grid">
    <div class="fifteen wide column">
        <div class="row">

            <ul>
                <?php
                if ($canAccess == '1') {
                    echo "<div class='row'>
                            <form action='createClubEvent.php' class='ui large form' method='post'>
                                <input type='hidden' name='createClubEvent' value=$clubID>
                                <button class='ui green submit button' style='margin-right:50px'>Create Club Event</button>
                            </form>
                            
                                
                            </div>";
                }
                ?>
                <?php
                $sql= "SELECT * FROM clubevents WHERE clubID = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$clubID]);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $title = $row['title'];
                    $created = $row['date'];
                    $description = $row['description'];
                    $eventID = $row['id'];
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
                                <button class='ui right floated button' onclick='/semantic/src/inc/editClubEvent.php' type='submit'><input name='editClub' type='hidden' value='$clubID'>Edit</button> 
                            </form>
                            </div>
                            <div class='two wide column'>
                            <form action='deleteClubEvent.php' method='post'>
                                <button class='ui red right floated mini button' name='eventID' type='submit' value='$eventID'>Delete Club</button>
                            </form>
                            </div>
                            ";}
                            echo "
                        </div>
                        
                        
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
