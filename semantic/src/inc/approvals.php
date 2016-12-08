<?php
session_start();
include("includes/dbconnect.php");
if (isset($_SESSION['loggedIn'])) {
    include("includes/header.php");
    echo "<h1 align='center'>Approvals</h1>
        <div class='ui horizontal section divider'>
        </div>";
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT userName from users where userID = '$userID'";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $userName = $row['userName'];
    }
    $sql = "SELECT accessID from useraccess WHERE userName = '$userName'";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $accessLevel = $row['accessID'];
    }
    if ($accessLevel == 1) {
        $sql_query = "
    SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, A.approvalStatus, C.url
    FROM healthcontent A, users B, photos C
    WHERE 
    A.userID=B.userID
    AND A.healthContentID = C.healthContentID
    AND A.approvalStatus = 0;";
        $result = $db->query($sql_query);
        while ($row = $result->fetch_array()) {
            $title = $row['title'];
            $mainText = $row['mainText'];
            $userName = $row['userName'];
            $datePosted = $row['datePosted'];
            $healthContentID = $row['healthContentID'];
            $photoURL = $row['url'];
        echo "
<div class='row'>
    <ul>
<div class = 'ui container'>
<div class='ui raised segment'>
    <div class='ui container'>
        <div class='ui grid'>
            <div class='sixteen wide column'>
                <form class='ui form' method='POST' action='editHealthContent.php'>
                    <button class='ui positive right floated mini button' onclick='/semantic/src/inc/editHealthContent.php'
                            type='submit'>
                        <input type='hidden' name='editHealth' value=$healthContentID> Approve
                    </button>
                </form>
            </div>
            <div class='row'>
                <div class='eight wide column'>
                    <h3 class='ui header' id='title'>
                        $title
                    </h3>
                    <p id='datePosted'>$datePosted
                        <br>
                    </p>
                    <div class='ui small image'>
                        <img src='$photoURL'>
                    </div>
                </div>
                <div class='eight wide column'>
                    <p id='mainText' style='text - align:justify'> $mainText
                        <br>
                    </p>
                    <p id='author'> By $userName
                        <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class='ui hidden section divider'></div>
";
    }
}
?>