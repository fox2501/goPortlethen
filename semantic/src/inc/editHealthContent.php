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
$healthContentID = $_POST['editHealth'];
$sql = "SELECT * from healthContent WHERE healthContentID = $healthContentID";
$result = mysqli_query($db, $sql);
while($row = mysqli_fetch_assoc($result)){
    $title = $row['title'];
    $mainText = $row['mainText'];
};

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

<!-- Form -->
<div class="ui container">
    <header class = "ui huge blue header">Edit Health & Wellbeing Content</header>
    <form class="ui form" action="submitEditHealth.php" method="POST" onsubmit="return validateForm()">
        <div class = "field">
            <label>Edit Title</label>
            <input type="text" name="editTitle" value=
            "<?php
            $sql = "SELECT title FROM healthContent WHERE healthContentID = $healthContentID";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $title = $row['title'];
            }
            echo $title;
            ?>">
        </div>
        <div class = "field">
            <label>Edit Main Text</label>
            <textarea rows = 8 type = "text" name = "editMainText" value =
                "<?php
                $sql = "SELECT mainText FROM healthContent WHERE healthContentID = $healthContentID'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $mainText = $row['mainText'];
                }
                echo "test".$mainText;
                ?>"></textarea>
        </div>
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
<!-- Footer -->
<?php include("includes/footer.php");
}?>

    </html>