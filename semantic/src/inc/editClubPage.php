<?php
session_start();
include("includes/dbconnect.php");

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $clubID = $_POST['editClub'];
    $sql = "SELECT userID from club where clubID = $clubID";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['userID'] == $userID) {
            $clubID = $_POST['editClub'];
            $sql = "SELECT * FROM club WHERE clubID = '$clubID'";
            $result = $db->query($sql);
            while ($row = $result->fetch_array()) {
                $clubName = $row['clubName'];
                $category = $row['clubCategory'];
                $clubDesc = $row['clubDescription'];
                $contactNum = $row['contactNumber'];
                $feeRequired = $row['feePaid'];
                $feeCost = $row['feeCost'];
                $websiteURL = $row['websiteURL'];
            }
            if($feeRequired == 1){
                $feeRequired = 'Yes';
            } else{
                $feeRequired = 'No';
            }
            $sql = "SELECT * from photos WHERE clubID = $clubID";
            $result = $db->query($sql);
            while ($row = $result->fetch_array()) {
                $photoURL = $row['url'];
            }
            ?>
            <head>
                <meta charset="UTF-8">
                <title>Edit Club</title>
            </head>
            <?php
            include("includes/header.php");
            echo "
            <body>
            <div class='ui container'>
                <div class = 'ui grid'>
                    <div class = 'eight wide column'>
                        <header class = 'ui blue huge header'>Edit club: $clubName</header>
                    </div>
                </div>
                <div class='ui grid'>
                        <div class='four wide column'>
                            <div class='ui card'>
                                <div class='image'>
                                    <img
                                        src='$photoURL'>
                                </div>
                            </div>
                        </div>
                        <div class = 'twelve wide column'>
                        <div class='ui form' action = 'submitEditClub.php' method = 'POST'>
                            <div class = 'field'>
                                <label>Edit Club Name</label>
                                <input type = 'text' name = 'editClubName' value = '$clubName'>
                            </div>
                            <div class = 'field'>
                                <label>Edit Club Description</label>
                                <textarea rows=8 type='text' name='editDescription'>$clubDesc</textarea>
                            </div>
                            <div class = 'field'>
                                <label>Edit Contact Number</label>
                                <input type = 'number' name = 'editNumber' value = '$contactNum'>
                            </div>
                            <div class = 'field'>
                                <label>Edit Website</label>
                                <input type = 'number' name = 'editURL' value = '$websiteURL'>
                            </div>
                            <div class = 'field'>
                                <label>Edit Fee</label>
                                <input type = 'text' name = 'editFee' value = 'N/A'>
                            </div>
                            <div class = 'field'>
                                <label>Fee Required?</label>
                                <input type = 'text' name = 'editFee' value = '$feeRequired'>
                            </div>
                            <div class = 'field'>
                                <label>Monthly Cost</label>
                                <input type = 'number' name = 'editNumber' value = '$feeCost'>
                            </div>
                            <div class = 'field'>
                                <label>Edit Fee</label>
                                <input type = 'text' name = 'editFee' value = 'N/A'>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
            </body>";
            include("includes/footer.php");
        } else {
            echo "You do not have permission";
        }
    }
};
?>
