<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $sql    = "SELECT accessID from users U, useraccess UA where U.userName = UA.userName AND userID = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$userID]);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    $accessLevel = $row['accessID'];

    //sql statement to check for correct access level
    if ($accessLevel == 4) {
        include("includes/header.php");
        echo "<h1 align='center'>Awaiting Approval</h1>
        <div class='ui horizontal section divider'>
        </div>";

        $sql = "
    SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, A.approvalStatus, C.url
    FROM healthcontent A, users B, photos C
    WHERE 
    A.userID=B.userID
    AND A.healthContentID = C.healthContentID
    AND A.approvalStatus = ?
    AND A.userID = ?;";
        $stmt = $pdo -> prepare($sql);
        $stmt->execute([0, $userID]);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $title           = $row['title'];
            $mainText        = $row['mainText'];
            $userName        = $row['userName'];
            $datePosted      = $row['datePosted'];
            $healthContentID = $row['healthContentID'];
            $photoURL        = $row['url'];
            echo "
    <div class='row'>
        <div class='ui stackable container'>
            <div class='ui raised segment'>
                <div class='ui stackable container'>
                    <div class='ui stackable grid'>
                        <div class='row'>
                            <div class='four wide column'>
                                <h3 class='ui header' id='title'>$title</h3>
                                <p id='datePosted'>$datePosted<br></p>
                                <div class='ui small image'><img src='$photoURL'></div>
                            </div>
                            <div class='twelve wide column'>
                                <p id='mainText' style='text - align:justify'>$mainText<br></p>
                                <p id='author'>By $userName<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='ui hidden section divider'></div>
    </div>
";
        }
        echo "<h1 align='center'>Approved Submissions</h1>
        <div class='ui horizontal section divider'>
        </div>";
//sql statement to get healthcontent from database
        $sql_query = "
    SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, A.approvalStatus, C.url
    FROM healthcontent A, users B, photos C
    WHERE 
    A.userID=B.userID
    AND A.healthContentID = C.healthContentID
    AND A.approvalStatus = ?
    AND A.userID = ?";
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([1, $userID]);
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $title           = $row['title'];
            $mainText        = $row['mainText'];
            $userName        = $row['userName'];
            $datePosted      = $row['datePosted'];
            $healthContentID = $row['healthContentID'];
            $photoURL        = $row['url'];
            echo "
    <div class='row'>
        <div class='ui stackable container'>
            <div class='ui raised segment'>
                <div class='ui stackable container'>
                    <div class='ui stackable grid'>
                        <div class='row'>
                            <div class='four wide column'>
                                <h3 class='ui header' id='title'>$title</h3>
                                <p id='datePosted'>$datePosted<br></p>
                                <div class='ui small image'><img src='$photoURL'></div>
                            </div>
                            <div class='eight wide column'>
                                <p id='mainText' style='text - align:justify'>$mainText<br></p>
                                <p id='author'>By $userName<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='ui hidden section divider'></div>
    </div>
";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Submissions</title>
</head>
<body>
</body>
</html>