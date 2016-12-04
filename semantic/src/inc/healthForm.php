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
        <form class="ui form" action="submitHealthForm.php" method="POST">

            <label>Date of Post</label>
            <div class="field">
                <input type="date" name="date" placeholder="Enter the date">
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
                    <input type="file" name="image">
                    <?php //echo cl_image_upload_tag('imageID',array("callback" => $cors_location));?>
                </div>
            </div>

            <label>Content Type</label>
            <br>
            <div class="ui selection dropdown">
                <input name="contentType" type="hidden">
                <i class="dropdown icon"></i>
                <div class="default text">Select a content type of the post
                </div>
                <div class="menu">
                    <div class="item" data-value="0">Sport</div>
                    <div class="item" data-value="1">Dance</div>
                    <div class="item" data-value="2">Outdoors</div>
                </div>
            </div>
            <br>
            <br>
            <button id="submitButton" class="ui primary button" input type="submit" value="SUBMIT">Submit Content</button>
        </form>
    </div>
</body>
<!-- Footer -->
<?php include("includes/footer.php"); ?>

</html>