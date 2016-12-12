<?php

session_start();
//connects to database server
include("includes/PDOConnect.php");
if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userNamem AND userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $accessLevel = $row["accessID"];

    if ($accessLevel == 1 || $accessLevel == 4) {

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Health Form</title>
        </head>

        <!-- Nav bar -->
        <? include("includes/header.php"); ?>

        <body>
        <!-- Page header -->
        <h1 align="center">Submit Health & Wellbeing Information</h1>
        <div class="ui horizontal section divider">
            Keeping Portlethen Healthy
        </div>

        <!-- Form -->
        <div class="ui stackable container">
            <form class="ui form" action="submitHealthForm.php" enctype="multipart/form-data" method="POST"
                  onsubmit="return validateForm()">

                <div class="ui error message"></div>

                <div class="required field">
                    <label>Title</label>
                    <div class="field">
                        <input type="text" name="title" placeholder="Enter the title of your post">
                    </div>
                </div>


                <div class="required field">
                    <label>Content</label>
                    <textarea rows="8" type="text" name="mainText"
                              placeholder="Enter the content of your post"></textarea>
                </div>


                <div class="required field">
                    <label>Main Image</label>
                    <div class="ui fluid action input">
                        <input name="healthPhoto" size="35" type="file"/>
                    </div>
                </div>
                <button class="ui fluid large green submit button" id="createHealthContent" type="submit">Submit
                    Content
                </button>

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
                                },
                                photo: {
                                    identifier: 'healthPhoto',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Please choose a photo for the post'
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
    <?php } else{
        header("Location: /semantic/src/inc/health.php?restricted");
    }
} else{
    header("Location: /semantic/src/inc/health.php?restricted");
}
; ?>