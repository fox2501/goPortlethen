<?php
session_start();
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$userID = $_SESSION['loggedIn'];
include("includes/dbconnect.php");
if(isset($_SESSION['loggedIn'])) {
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
    if ($accessID == '1' || $accessID == '4') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="semantic.css">
        <title>Semantic UI</title>
    </head>

    <!-- Nav bar -->
    <? include("includes/header.php"); ?>

    <body>
    <!-- Page header -->
    <h1 align="center">Submit Health & Wellbeing Information</h1>
    <div class="ui horizontal section divider">
        Keeping Portlethen Healthy
    </div>

    <!-- Form -->
    <div class="ui container">
        <form name="healthForm" class="ui form" action="submitEditHealth.php" method="POST"
              onsubmit="return validateForm()">

            <label>Date Posted</label>
            <div class="field">
                <input type="date" name="datePosted" value=
                "<?php
                $userID = $_SESSION['loggedIn'];
                $sql = "SELECT * FROM healthContent, users WHERE healthContent.userID=users.userID";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $datePosted = $row['datePosted'];
                }
                echo $datePosted;
                ?>">
            </div>

            <label>Title</label>
            <div class="field">
                <input type="text" name="title" value=
                "<?php
                $userID = $_SESSION['loggedIn'];
                $sql = "SELECT * FROM healthContent, users WHERE healthContent.userID=users.userID";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['title'];
                }
                echo $title;
                ?>">
            </div>

            <label>Content</label>
            <div class="field">
                <textarea rows="8" type="text" name="mainText" value=
                "<?php
                $userID = $_SESSION['loggedIn'];
                $sql = "SELECT * FROM healthContent, users WHERE healthContent.userID=users.userID";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $mainText = $row['mainText'];
                }
                echo $mainText;
                ?>"></textarea>
            </div>

            <label>Main Image</label>
            <div class="field">
                <div class="ui fluid action input">
                    <input name="img" size="35" type="file"/><br/>
                </div>
            </div>

            <button id="submitButton" class="ui primary button" input type="submit" value="SUBMIT">Submit Content
            </button>
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
    <!-- Footer -->
    <?php include("includes/footer.php"); ?>
    </html>
    <?php
}
?>