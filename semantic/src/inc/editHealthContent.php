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
    <form name="healthForm" class="ui form" action="submitEditHealthForm.php" method="POST"
          onsubmit="return validateForm()">

        <label>Date of Post</label>
        <div class="field">
            <input type="date" name="date" value="<?php echo date('Y-m-d');?>">
        </div>

        <label>Title</label>
        <div class="field">
            <input type="text" name="title" value="
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
            <textarea rows="8" type="text" name="mainText" value="
            <?php
            $userID = $_SESSION['loggedIn'];
            $sql = "SELECT mainText FROM healthContent WHERE userID = '$userID'";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $mainText = $row['mainText'];
            }
            echo $mainText;
            ?>
            ">
            </textarea>
        </div>

        <label>Main Image</label>
        <div class="field">
            <div class="ui fluid action input">
                <input type="file" name="image">
                <?php //echo cl_image_upload_tag('imageID',array("callback" => $cors_location));?>
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