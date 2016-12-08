<?php
session_start();
if(isset($_SESSION['loggedIn'])){
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT userName from users WHERE userID = '$userID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = '$userName'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $accessID = $row["accessID"];
    if($accessID == '1' || $accessID == '4'){
        $canAccess = '1';
    } else{
        $canAccess = '0';
    }
}
include("includes/header.php");
?>
<body>
<h1 align="center">Map Landing Page</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class='ui container'>
    <div class='ui grid'>
        <?php
        if($canAccess == 1 || $canAccess == 0){
            echo "        <div class='three wide column'>
            <a href = 'createRoute.php'>
                <button class='ui left floating positive fluid button'>Create Route</button>
            </a>
        </div>";
        }
        ?>
        <div class='sixteen wide column'>
            <div class='ui raised segment'>
                <div class="item">
                    <i class="marker icon"></i>
                    <div class="content">
                        <a class="header"></a><a href="mapPage.php">Test Route 1</a>
                    </div>
                    4.2miles
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
</body>