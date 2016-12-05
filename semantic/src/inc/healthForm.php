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
        <form name="healthForm" class="ui form" action="submitHealthForm.php" method="POST"
        onsubmit="return validateForm()">

            <label>Date</label>
            <div class="field">
                <input type="date" name="date" placeholder="<?php echo date("l jS \of F Y h:i:s A");?>"
                value="<?php echo date("l jS \of F Y h:i:s A");?>">
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
                    Choose Image : <input name="img" size="35" type="file"/><br/>
                </div>
            </div>


            <br>
            <br>
            <button id="submitButton" class="ui primary button" input type="submit" value="SUBMIT">Submit Content</button>
        </form>
    </div>

    <script type="text/javascript">
        function validateForm() {
            var x = document.forms["healthForm"] ["title"].value;
            if (x == "") {
                alert("Please enter a title.")
            }
            var y = document.forms["healthForm"] ["content"].value;
            if (y == "") {
                alert("Please enter some content.")
            }
         }
    </script>
</body>
<!-- Footer -->
<?php include("includes/footer.php"); ?>

</html>