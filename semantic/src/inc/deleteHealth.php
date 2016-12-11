<?php
session_start();
include("includes/dbconnect.php");
if(isset($_SESSION['loggedIn'])){
$userID = $_SESSION['loggedIn'];
include("includes/header.php");
$healthID =$_POST["healthID"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>goPortlethen</title>
</head>
<body>
<div class='ui center aligned container'>
    <div class='ui middle aligned center aligned grid'>
        <div class='ui ten wide column'>
            <form action="submitHealthDelete.php" class="ui large form" method="post">
                <div class='ui negative message'>
                    <h1 class='header'>ARE YOU SURE YOU WANT TO DELETE THIS CONTENT?</h1>
                </div>
                <input type="hidden" name="deleteHealth" value='<?php echo $healthID; ?>'>
                <button class="ui fluid large red submit button" type="submit">Delete Content</button>
            </form>
        </div>
    </div>
</div><?php
include("includes/footer.php");
}
?>
</body>
</html>