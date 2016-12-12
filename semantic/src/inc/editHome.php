<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");
if (isset($_SESSION['loggedIn'])) {
$userID = $_SESSION['loggedIn'];
$sql = "SELECT A.accessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$accessLevel = $row['accessID'];

$contentID = $_POST['editHome'];

if ($accessLevel == 1) {
$sql = "SELECT * from homeContent WHERE $contentID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$contentID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $title = $row['title'];
    $caption = $row['caption'];
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
        Edit Home Page Content
    </h1>
    <div class="ui horizontal section divider">
        <p>Give users a good first impression!</p>
    </div>

    <form action="submitEditHome.php" class="ui form" enctype="multipart/form-data" method="post">
        <div class="field">
            <label>Edit Title</label> <input name="editTitle" type="text" value="<?php echo $title; ?>">
        </div>
        <div class="field">
            <label>Edit Caption</label>
            <textarea name="editCaption" rows="8"><?php echo $caption; ?></textarea>
        </div>
        <div class="field">
            <input name="editContent" type="hidden" value="<?php echo $contentID ?>">
        </div>
        <div class="field">
            <label>Choose a new image for the home page</label>
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
    echo "You do not have permission.";
}
};
?>
</body>