<?php
session_start();
include("includes/dbconnect.php");
if(isset($_SESSION['loggedIn'])){
    $userID = $_SESSION['loggedIn'];
    $healthContentID = $_POST['editHealth'];
    $sql = "SELECT userID from healthcontent where healthContentID = $healthContentID";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_assoc($result)){
        if($row['userID'] == $userID) {
            $sql = "SELECT * from healthcontent WHERE healthContentID = $healthContentID";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $mainText = $row['mainText'];
                $healthContentID = $row['healthContentID'];
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
<? include("includes/header.php");?>

<body>

<!-- Form -->
<div class="ui container">
    <header class = "ui huge blue header">Edit Health & Wellbeing Content</header>
    <form class="ui form" action="submitEditHealth.php" method="POST">
        <div class = "field">
            <label>Edit Title</label>
            <input type="text" name="editTitle" value=
            "<?php
            echo $title;
            ?>">
        </div>
        <div class = "field">
            <label>Edit Main Text</label>
            <textarea rows = 8 type = "text" name = "editMainText"><?php echo $mainText; ?></textarea>
        </div>
        <input type = "hidden" name = "healthContentToEdit" value = "1171">
        <button class="ui fluid large green submit button" type="submit">Submit</button>
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
</html>
<!-- Footer -->
<?php
            include("includes/footer.php");
        } else{
            echo "You do not have permission.";
        }
    }
};
?>