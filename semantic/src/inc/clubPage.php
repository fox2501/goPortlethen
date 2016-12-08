<?php
session_start();
include("includes/dbconnect.php");
$clubID = $_POST['viewClub'];
$sql = "SELECT * FROM club WHERE clubID = '$clubID'";
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
        $clubName = $row['clubName'];
        $category = $row['clubCategory'];
        $clubDesc = $row['clubDescription'];
        $contactNum = $row['contactNumber'];
}
$sql = "SELECT * from photos WHERE clubID = $clubID";
$result = $db->query($sql);
while ($row = $result ->fetch_array()){
    $photoURL = $row['url'];
}
?>
<head>
     <meta charset="UTF-8">
     <title>Club Page</title>
</head>
<?php
include("includes/header.php");
echo "
<body>
<div class='ui container'>
    <div class = 'ui grid'>
        <div class = 'eight wide column'>
            <header class = 'ui blue huge header'>$clubName Club Profile Page</header>
        </div>
        <div class = 'eight wide column'>
        <form class = 'ui form' method = 'POST' action = 'editClubPage.php'>
            <button class = 'ui right floated button' onclick = '/semantic/src/inc/editClubPage.php' type = 'submit'>
                <input type = 'hidden' name = 'editClub' value = $clubID>
                <i class = 'ui settings icon'></i>
                    Edit Club
            </button>
        </form>
        </div>
    </div>
    <div class='ui grid'>
            <div class='four wide column'>
                <div class='ui card'>
                    <div class='image'>
                        <img
                            src='$photoURL'>
                    </div>
                    <div class='content'>
                        <a class='header'>$clubName</a>
                        <div class='meta'>
                            <span class='date '>Joined in 2016</span>
                        </div>
                        <div class='description'>
                            Best EPL team
                        </div>
                    </div>
                </div>
            </div>
            <div class = 'twelve wide column'>
            <div class='ui segment '>
                <h5 class='ui top attached header '>
                    Club Category:
                </h5>
                <div class='ui attached segment '>
                    <p>$category</p>
                </div>
                <h5 class='ui attached header '>
                    Club Description:
                </h5>
                <div class='ui attached segment '>
                    <p>$clubDesc</p>
                </div>
                <h5 class='ui attached header '>
                    Location:
                </h5>
                <div class='ui attached segment '>
                    <p>Manchester</p>
                </div>
                <h5 class='ui attached header '>
                    Contact Number:
                </h5>
                <div class='ui attached segment '>
                    <p>$contactNum</p>
                </div>
                <h5 class='ui attached header '>
                    Monthly Fee:
                </h5>
                <div class='ui bottom attached segment '>
                    <p>£1,000,000,000</p>
                </div>
            </div>
            </div>
        </div>
</div>
</body>";
include("includes/footer.php");
?>