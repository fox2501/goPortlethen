<?php
session_start();
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

            <label>Date Posted</label>
            <div class="field">
                <input type="date" name="datePosted" placeholder="Enter the date">
            </div>

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
                    <input name="img" size="35" type="file"/><br/>
                </div>
            </div>

            <button id="submitButton" class="ui primary button" input type="submit" value="SUBMIT">Submit Content</button>
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