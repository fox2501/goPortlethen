<?php
session_start();
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
        <form name="healthForm" class="ui form" action="submitEditHealth.php" method="POST" onsubmit="return validateForm()">

            <label>Title</label>
            <div class="field">

                <input type = "text" name = "title" value =
                "<?php
                $userID = $_SESSION['loggedIn'];
                $sql = "SELECT title FROM healthContent WHERE userID = '$userID'";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)) {
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
                $sql = "SELECT mainText FROM healthContent WHERE userID = '$userID'";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)) {
                    $mainText = $row['mainText'];
                }
                echo $mainText;
                ?>"
                ></textarea>
            </div>

            <button id="submitButton" class="ui primary button" name = "submit" input type="submit" value="SUBMIT">Submit Content</button>
        </form>
    </div>

    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["healthForm"] ["title"].value;
            var y = document.forms["healthForm"] ["mainText"].value;

            if (x == "") {
                alert("Please enter a title.")
            }

            else if (y == "") {
                alert("Please enter some content.")
            }
        }
    </script>
    </body>
    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

    </html>