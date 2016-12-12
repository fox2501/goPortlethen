<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
if (isset($_SESSION['loggedIn'])) {
$canAccess = 0;
$userID = $_SESSION['loggedIn'];
$sql = "SELECT A.accessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$accessLevel = $row['accessID'];

$healthContentID = $_POST['editHealth'];
$sql = "SELECT userID from healthcontent where healthContentID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$healthContentID]);

while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $healthUserID = $row['userID'];
}

if($accessLevel == 1) {
    $canAccess = 1;
}
if($healthUserID == $userID) {
    $canAccess = 1;
}
if ($canAccess == 1) {
$sql = "SELECT * from healthcontent WHERE healthContentID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$healthContentID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $title = $row['title'];
    $mainText = $row['mainText'];
    $healthContentID = $row['healthContentID'];
}
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
</head>
<!-- Nav bar -->
<? include("includes/header.php"); ?>
<body>
<!--main body-->
<!-- Form -->


<div class="ui container">
    <h1 align="center">
        Edit Health & Wellbeing Content
    </h1>
    <div class="ui horizontal section divider">
        <p>Keeping Portlethen Healthy</p>
    </div>

    <form method ="post" action ="deleteHealth.php">
        <button class="ui red right floated button" type ="submit" name = "healthID" value = "<?php echo $healthContentID; ?>">Delete Health Content</button>
    </form>

    <br>

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

        <script type="text/javascript">
            ;
            (function ($) {
                $('.ui.form').form({
                    fields: {
                        Title: {
                            identifier: 'title',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter a title'
                                }
                            ]
                        },
                        mainText: {
                            identifier: 'mainText',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter text to populate the main text section'
                                }
                            ]
                        }
                    }
                })
            })(jQuery);
        </script>
        </form>

</div>


<!-- Footer -->
<?php
include("includes/footer.php");
} else {
    header("Location: /semantic/src/inc/health?restricted");
}
};
?>
</body>