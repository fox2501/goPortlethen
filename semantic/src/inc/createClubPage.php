<?php
//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (isset($_SESSION['loggedIn'])) {
$userID = $_SESSION['loggedIn'];
$canAccess = '0';
$sql = "SELECT accessID from users U, useraccess UA WHERE U.userName = UA.userName AND userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$accessLevel = $row["accessID"];

if ($accessLevel == 1 || $accessLevel == 2) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Club Page</title>
</head><?php include("includes/header.php"); ?>
<body>
<div class="ui stackable container">
    <form action="submitCCForm.php" class="ui form" enctype="multipart/form-data" method="post">
        <h1 align="center"></h1>
        <div class="content">
            <h1 align="center">Create Your Club </h1>
        </div>
        <div class="ui horizontal section divider">
            Inspire your local community
        </div>
        <div class="ui attached message">
            <div class="header">
                Welcome to goPortlethen!
            </div>
            <p>Please fill out the form below to create your club page</p>
        </div>
        <div class="ui form attached fluid segment">
            <div class="ui error message"></div>
            <div class="required field">
                <label>Club Name</label>
                <div class="field">
                    <input id="clubName" name="clubName" placeholder="Enter your club name." type="text">
                </div>
            </div>
            <div class="required field">
                <label>Email Address</label>
                <div class="field">
                    <input id="email" name="email" placeholder="Please enter your email address." type="email">
                </div>
            </div>
            <div class="required field">
                <label>Club Category</label> <select class="ui search dropdown" name="clubCategory">
                    <option>
                        Select Category
                    </option>
                    <option value="ART">
                        Art
                    </option>
                    <option value="E-SPORT">
                        E-Sport
                    </option>
                    <option value="HEALTH">
                        Health
                    </option>
                    <option value="SPORT">
                        Sport
                    </option>
                </select>
            </div>
            <div class="required field">
                <label>Club Description</label>
                <textarea name="clubDescription" rows="4"></textarea>
            </div>
            <div class="field">
                <label>Phone Number</label> <input maxlength="11" name="phoneNumber" placeholder="Phone Number" type="text">
            </div>
            <div class="field">
                <label>Website URL</label> <input name="websiteURL" placeholder="Website URL" type="url" value="http://">
            </div>
            <div class="field">
                <label>Please check if your club requires a fee:</label>
                <div class="inline field">
                    <div class="ui checkbox">
                        <input class="hidden" id="isFee" name="isFee" tabindex="0" type="checkbox"> <label for="isFee">Requires Free</label>
                    </div>
                    <div class="fluid field" id="feeAmount" style="display: none;">
                        <label>Please enter your clubs monthly fee (e.g. 10.00):</label>
                        <div class="ui right labeled input">
                            <div class="ui label">
                                £
                            </div><input name="feeAmount" placeholder="Amount" type="number">
                        </div>
                        <script>
                            var checker = document.getElementById('isFee');
                            var sendbtn = document.getElementById('feeAmount');
                            // when unchecked or checked, run the function
                            checker.onchange = function () {
                                if (this.checked) {
                                    sendbtn.style.display = 'block';
                                    checker.value = 1;
                                } else {
                                    sendbtn.style.display = 'none';
                                    checker.value = 0;
                                }

                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Please upload your clubs profile picture:</label>
                <div class="ui fluid action input">
                    <input name="img" size="35" type="file">
                </div>
            </div>
            <div class="required inline field">
                <div class="ui checkbox">
                    <input class="hidden" id="terms" name="terms" tabindex="0" type="checkbox"> <label for="terms">I agree to the terms and conditions</label>
                </div>
            </div><button class="ui fluid large green submit button" id="createClub" type="submit">Create Club</button>
            <script type="text/javascript">

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
                                        type: 'email',
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
                                optional: true,
                                rules: [
                                    {
                                        type: 'url',
                                        prompt: 'Please enter a url'
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
                            },
                            photo: {
                                identifier: 'img',
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
        </div>
    </form>
    <div class="ui bottom attached warning message">
        <i class="icon help"></i> Already signed up? <a href="/semantic/src/inc/logIn.php">Login here</a> instead.
    </div>
</div><?php include("includes/footer.php"); ?><?php
} else{
    header("Location: /semantic/src/inc/logIn.php?restricted");
}
} else{
    header("Location: /semantic/src/inc/logIn.php?restricted");
}
?>
</body>
</html>