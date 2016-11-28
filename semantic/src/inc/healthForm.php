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

    <div class="ui container">
        <form class="ui form" action="submitHealthForm.php" method="POST">
            <div class="field">
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
                        <input type="file" name="image">
                        <div class="ui icon button">
                            <i class="cloud upload icon"></i>
                        </div>
                    </div>
                </div>
                <button id="submitButton" class="ui primary button" input type="submit" value="SUBMIT">Submit Content</button>
            </div>
        </form>
    </div>


    <!--<p>User editing a post:
    <br>Can edit title, text and image(s) on form (original information is displayed when "edit" is clicked)
    <br>Name stays the same but date changes
    <br>Can also delete post</p>-->
</body>

<!-- Footer -->
<?php include("includes/footer.php"); ?>

</html>