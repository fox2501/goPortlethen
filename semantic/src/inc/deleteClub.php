<?php
//session begins
session_start();
//connects to database server
include("includes/dbconnect.php");
if(isset($_SESSION['loggedIn'])){
$userID = $_SESSION['loggedIn'];
include("includes/header.php");
$clubID =$_POST["clubID"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Club</title>
</head>
<!--main body-->
<body>
<div class='ui stackable center aligned container'>
    <div class='ui stackable middle aligned center aligned grid'>
        <div class='ui ten wide column'>
            <form action="submitClubDelete.php" class="ui large form" method="post">
                <div class='ui negative message'>
                    <h1 class='header'>ARE YOU SURE YOU WANT TO DELETE THIS CLUB?<input type="hidden" name="deleteClub" value='<?php echo $clubID; ?>'></h1>
                </div>
                <button class="ui fluid large red submit button" type="submit">Delete Club</button>
            </form>
        </div>
    </div>
</div><?php
include("includes/footer.php");
}
?>
</body>
</html>