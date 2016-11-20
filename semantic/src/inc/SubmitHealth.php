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
        <form class="ui form">
            <div class="field">
                <label>Title</label>
                <div class="field">
                    <input type="text" name="title" placeholder="Enter the title of your post">
                </div>
                <label>Content</label>
                <div class="field">
                    <textarea rows="8" input type="text" name="content" placeholder="Enter the content of your post"></textarea>
                </div>
                <label>Main Image</label>
                <div class="field">
                    <!-- Should be able to select image -->
                    <input type="text" name="image" placeholder="Select an image for your post">
                </div>
            </div>
        </form>
    </div>













    <p>User creating a new post:
    <br>User inputs title, text and image(s) into form
    <br>Name and date are automatically addded</p>

    <p>User editing a post:
    <br>Can edit title, text and image(s) on form (original information is displayed when "edit" is clicked
    <br>Name stays the same but date changes
    <br>Can also delete post</p>
</body>

<!-- Footer -->
<?php include("includes/footer.php"); ?>

</html>