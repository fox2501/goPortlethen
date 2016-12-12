<?php
//session begins
session_start();
//connects to database server
include("includes/PDOConnect.php");
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="goPortlethen/semantic/dist/semantic.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
        <title>Create Club Page</title>
    </head>
    <?php include("includes/header.php"); ?>
    <body>
    <div class="ui stackable container">
        <form class="ui form" action="submitCCForm.php" enctype="multipart/form-data" method="POST">
            <h1 align="center">
                <div class="content">
                    Create Your Club
                </div>
            </h1>
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
                        <input type="text" name="clubName" placeholder="Enter your club name." id="clubName">
                    </div>
                </div>
                <div class="required field">
                    <label>Email Address</label>
                    <div class="field">
                        <input type="email" name="email" placeholder="Please enter your email address." id="email">
                    </div>
                </div>
                <div class="required field">
                    <label>Club Category</label>
                    <select class="ui search dropdown" name="clubCategory">
                        <option>Select Category</option>
                        <option value="ART">Art</option>
                        <option value="E-SPORT">E-Sport</option>
                        <option value="HEALTH">Health</option>
                        <option value="SPORT">Sport</option>
                    </select>
                </div>
                <div class="required field">
                    <label>Club Description</label>
                    <textarea rows="4" name="clubDescription"></textarea>
                </div>
                <div class="field">
                    <label>Phone Number</label>
                    <input type="text" name="phoneNumber" maxlength="11" placeholder="Phone Number">
                </div>
                <div class="field">
                    <label>Website URL</label>
                    <input type="URL" name="websiteURL" placeholder="Website URL" value="http://">
                </div>
                <!--<div class="field">
                    <label>Please toggle if your club requires a fee: </label>
                    <div class="ui toggle checkbox">
                        <input type="checkbox" name="feeRequired" tabindex="0" class="hidden" id="isFee" value="0">
                        <label for="isFee">Fee does apply</label>
                    </div>
                </div>-->
                <div class="field">
                    <label>Please check if your club requires a fee: </label>
                    <div class="inline field">
                        <div class="ui checkbox">
                            <input type="checkbox" tabindex="0" class="hidden" id="isFee">
                            <label for="isFee">Requires Free</label>
                        </div>
                        <!--<div class="ui fluid right labeled input">
                            <div class="ui label">£</div>
                            <input type="number" name="feeRequired2" placeholder="Please enter your clubs fee">
                        </div>
                    </div>
                </div>-->

                        <div class="fluid field" id="feeAmount" style="display: none;">
                            <label>Please enter your clubs monthly fee (e.g. 10.00): </label>
                            <div class="ui right labeled input">
                                <div class="ui label">£</div>
                                <input type="number" placeholder="Amount" name="feeAmount">
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
                    <label>Please upload your clubs profile picture: </label>
                    <div class="ui fluid action input">
                        <input name="img" size="35" type="file"/>

                    </div>
                    <!--                    <script>-->
                    <!--                        $('input:text, .ui.button', '.ui.action.input')-->
                    <!--                            .on('click', function (e) {-->
                    <!--                                $('input:file', $(e.target).parents()).click();-->
                    <!--                            })-->
                    <!--                        ;-->
                    <!---->
                    <!--                        $('input:file', '.ui.action.input')-->
                    <!--                            .on('change', function (e) {-->
                    <!--                                var name = e.target.files[0].name;-->
                    <!--                                $('input:text', $(e.target).parent()).val(name);-->
                    <!--                            })-->
                    <!--                        ;-->
                    <!--                    </script>-->
                    <!--                    <style>-->
                    <!--                        body {-->
                    <!--                            padding: 1em;-->
                    <!--                        }-->
                    <!---->
                    <!--                        .ui.action.input input[type="file"] {-->
                    <!--                            display: none;-->
                    <!--                        }-->
                    <!--                    </style>-->
                </div>
                <div class="required inline field">
                    <div class="ui checkbox">
                        <input type="checkbox" tabindex="0" class="hidden" name="terms" id="terms">
                        <label for="terms">I agree to the terms and conditions</label>
                    </div>
                </div>
                <button class="ui fluid large green submit button" id="createClub" type="submit">Create Club
                </button>


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

        </form>

        <div class="ui bottom attached warning message">
            <i class="icon help"></i>
            Already signed up? <a href="/semantic/src/inc/logIn.php">Login here</a> instead.
        </div>
    </div>
    </body>
    <?php include("includes/footer.php"); ?>
    </html>
    <?php
    //t
}
?>