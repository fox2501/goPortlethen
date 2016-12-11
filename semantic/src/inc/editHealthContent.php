<?php
session_start();
include("includes/dbconnect.php");
if (isset($_SESSION['loggedIn'])) {
$userID = $_SESSION['loggedIn'];
$sql = "SELECT A.accessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = '$userID'";
$result = mysqli_query($db, $sql);
while($row = mysqli_fetch_assoc($result)){
    $accessLevel = $row['accessID'];
}
$healthContentID = $_POST['editHealth'];
$sql = "SELECT userID from healthcontent where healthContentID = $healthContentID";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $healthUserID = $row['userID'];
}
if($accessLevel = 1) {
    $canAccess = 1;
}
if($healthUserID = $userID) {
    $canAccess = 1;
}
if ($canAccess = 1) {
$sql = "SELECT * from healthcontent WHERE healthContentID = $healthContentID";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $mainText = $row['mainText'];
    $healthContentID = $row['healthContentID'];
}
?>
<!-- Nav bar -->
<? include("includes/header.php"); ?>
<body>
<!-- Form -->
<form>
    <button class="ui red right floated button" formaction="deleteHealth.php">Delete Health Content<input type="hidden" name="healthID" value='<?php echo $healthContentID; ?>'></button>
</form>
<div class="ui container">
    <header class="ui huge blue header">
        Edit Health & Wellbeing Content
    </header>

    <form action="submitEditHealth.php" class="ui form" enctype="multipart/form-data" method="post">
        <div class="field">
            <label>Edit Title</label> <input name="editTitle" type="text" value="<?php echo $title; ?>">
        </div>
        <div class="field">
            <label>Edit Main Text</label>
            <textarea name="editMainText" rows="8"><?php echo $mainText; ?></textarea>
        </div>
        <div class="field">
            <input name="healthContentToEdit" type="hidden" value="<?php echo $healthContentID ?>">
        </div>
        <div class="field">
            <label>Choose a new image for the content</label>
            <div class="ui fluid action input">
                <input name="healthPhoto" size="35" type="file">
            </div>
        </div><button class="ui fluid large green submit button" type="submit">Submit</button>
    </form>
</div>





<!-- Footer -->
<?php
include("includes/footer.php");
} else {
    echo "You do not have permission.";
}
};
?>
</body>