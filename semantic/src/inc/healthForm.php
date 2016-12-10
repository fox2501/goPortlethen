<?php

session_start();
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
    if ($accessID == '1' || $accessID == '4') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
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
    <? include("includes/header.php"); ?>

    <body>
    <!-- Page header -->
    <h1 align="center">Submit Health & Wellbeing Information</h1>
    <div class="ui horizontal section divider">
        Keeping Portlethen Healthy
    </div>

    <!-- Form -->
    <div class="ui container">
        <form class="ui form" action="submitHealthForm.php" enctype="multipart/form-data" method="POST"
              onsubmit="return validateForm()">


            <div class="field">
                <label>Title</label>
                <input type="text" name="title" placeholder="Enter the title of your post">
            </div>


            <div class="field">
                <label>Content</label>
                <textarea rows="8" type="text" name="mainText" placeholder="Enter the content of your post"></textarea>
            </div>


            <div class="field">
                <label>Main Image</label>
                <div class="ui fluid action input">
                    <input name="healthPhoto" size="35" type="file"/>
                </div>
            </div>
            <button class="ui fluid large green submit button" id="createHealthContent" type="submit">Submit Content</button>

            <script type="text/javascript">
                ;
                (function ($) {
                    $('.ui.form').form({
                        fields: {
                            clubName: {
                                identifier: 'clubName',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter your clubs name'
                                    }
                                ]
                            },
                            clubEmail: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty' + 'email',
                                        prompt: 'Please enter a valid email address'
                                    }
                                ]
                            },
                            clubCategory: {
                                identifier: 'clubCategory',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please select a club category'
                                    }
                                ]
                            },
                            clubDescription: {
                                identifier: 'clubDescription',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please select a club category'
                                    }
                                ]
                            },
                            number: {
                                identifier: 'phoneNumber',
                                rules: [
                                    {
                                        type: 'number',
                                        prompt: 'Please enter a valid phone number'
                                    }
                                ]
                            },
                            url: {
                                identifier: 'websiteURL',
                                optional   : true,
                                rules: [
                                    {
                                        type: 'url',
                                        prompt: 'Please enter a valid url'
                                    }
                                ]
                            },
                            terms: {
                                identifier: 'terms',
                                rules: [
                                    {
                                        type: 'checked',
                                        prompt: 'You must agree to the terms and conditions'
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