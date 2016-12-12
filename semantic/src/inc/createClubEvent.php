<?php

session_start();
//connects to database server
include("includes/PDOConnect.php");
if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT userName from users WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userName]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $accessID = $row["accessID"];

    if ($accessID == '1' || $accessID == '2') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    };
    $clubID = $_POST['createClubEvent']
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="semantic.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
        <title>Semantic UI</title>
    </head>

    <!-- Nav bar -->
    <? include("includes/header.php"); ?>

    <body>
    <!-- Page header -->
    <h1 align="center">Submit Event for club</h1>
    <div class="ui horizontal section divider">
        Keeping Portlethen Healthy
    </div>

    <!-- Form -->
    <div class="ui container">
        <form class="ui form" action="submitCreateEvent.php" enctype="multipart/form-data" method="POST"
              onsubmit="return validateForm()">

            <div class="ui error message"></div>

            <div class="required field">
                <label>Title</label>
                <div class="field"><input type="text" name="title" placeholder="Enter the title of your Event">
                </div>
            </div>
            <div class="required field">
                <label>Event Date</label><input type="date" name ="date">
                </div>
            </div>
            <div class="required field">
                <label>Description</label>
                <textarea rows="8" name="mainText" placeholder="Enter the content of your event"></textarea>
            </div>
            <button class="ui fluid large green submit button" id="createClubEvent" type="submit">Submit Event</button>
            <script type="text/javascript">

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
                            },
                            date: {
                                identifier: 'date',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please choose a date for the event'
                                    }
                                ]
                            }
                        }
                    })
                })(jQuery);
            </script>

        </form>
    </div>
    </body>
    <!-- Footerccc -->
    <?php include("includes/footer.php"); ?>

    </html>
<?php }; ?>