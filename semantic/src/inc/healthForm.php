<?php
session_start();
include("includes/dbconnect.php");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "semantic.css">
    <title>Semantic UI</title>
</head>

<!-- Nav bar -->
<?include ("includes/header.php"); ?>

<body>
    <!-- Page header -->
    <h1 align="center">Submit Health & Wellbeing Information</h1>
    <div class="ui horizontal section divider">
        Keeping Portlethen Healthy
    </div>

    <!-- Form -->
    <div class="ui container">
        <form name="healthForm" class="ui form" action="submitHealthForm.php" method="POST" onsubmit="return validateForm()">



            <label>Title</label>
            <div class="field">
                <input type="text" name="title" placeholder="Enter the title of your post">
            </div>

            <label>Content</label>
            <div class="field">
                <textarea rows="8" type="text" name="mainText" placeholder="Enter the content of your post"></textarea>
            </div>

            <label>Main Image</label>
            <div class="field">
                <div class="ui fluid action input">
                    <input name="healthPhoto" size="35" type="file"/>
                </div>
            </div>
            <button class="ui fluid large green submit button" id="createHealthContent" type="submit">Submit Content</button>
        </form>
    </div>

    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["healthForm"] ["title"].value;
            var y = document.forms["healthForm"] ["mainText"].value;
            var z = document.forms["healthForm"] ["datePosted"].value;

            if (x == "") {
                alert("Please enter a title.")
            }

            else if (y == "") {
                alert("Please enter some content.")
            }

            else if (z == "") {
                alert("Please enter a date.")
            }
         }
    </script>
</body>
<!-- Footerccc -->
<?php include("includes/footer.php"); ?>

</html>
<?php }; ?>