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
    <?php
    include("includes/header.php");
    include("includes/dbconnect.php"); ?>
    <body>
    <div class="ui container">
        <form class="ui form" action="submitCCForm.php" enctype="multipart/form-data" method="POST">
            <h2 class="ui center aligned blue header">
                <div class="content">
                    Create Your Club
                </div>
            </h2>
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
                <div class="field">
                    <label>Club Name</label>
                    <div class="field">
                        <input type="text" name="clubName" placeholder="Enter your club name.">
                    </div>
                </div>
                <div class="field">
                    <label>Email Address</label>
                    <div class="field">
                        <input type="text" name="email" placeholder="Please enter your email address." id="email">
                    </div>
                </div>
                <div class="field">
                    <label>Club Category</label>
                    <select class="ui search dropdown" name="clubCategory">
                        <option value="">Select Category</option>
                        <option value="AR">Art</option>
                        <option value="EP">E-Sport</option>
                        <option value="HE">Health</option>
                        <option value="SP">Sport</option>
                    </select>
                </div>
                <div class="field">
                    <label>Club Description</label>
                    <textarea rows="4" name="clubDescription"></textarea>
                </div>
                <div class="field">
                    <label>Phone Number</label>
                    <input type="text" name="phoneNumber" maxlength="11" placeholder="Phone Number">
                </div>
                <div class="field">
                    <label>Please toggle if your club requires a fee: </label>
                    <div class="ui toggle checkbox">
                        <input type="checkbox" tabindex="0" class="hidden" id="isFee">
                        <label for="isFee">Fee does apply</label>
                    </div>
                </div>
                <div class="field" id="feeAmount" style="display: none;">
                    <label>Please enter your clubs monthly fee: </label>
                    <div class="ui  right labeled input">
                        <div class="ui label">£</div>
                        <input type="text" placeholder="Amount" name="feeAmount">
                        <div class="ui basic label">.00</div>
                    </div>
                    <script>
                        var checker = document.getElementById('isFee');
                        var sendbtn = document.getElementById('feeAmount');
                        // when unchecked or checked, run the function
                        checker.onchange = function () {
                            if (this.checked) {
                                sendbtn.style.display = 'block';
                            } else {
                                sendbtn.style.display = 'none';
                            }

                        }
                    </script>
                </div>
                <div class="field">
                    <label>Please upload your clubs profile picture: </label>
                    <div class="ui fluid action input">
                        <input name="img" size="35" type="file"/></br>
                    </div>
                    <script>
                        $('input:text, .ui.button', '.ui.action.input')
                            .on('click', function (e) {
                                $('input:file', $(e.target).parents()).click();
                            })
                        ;

                        $('input:file', '.ui.action.input')
                            .on('change', function (e) {
                                var name = e.target.files[0].name;
                                $('input:text', $(e.target).parent()).val(name);
                            })
                        ;
                    </script>
                    <style>
                        body {
                            padding: 1em;
                        }

                        .ui.action.input input[type="file"] {
                            display: none;
                        }
                    </style>
                </div>
                <div class="required inline field">
                    <div class="ui checkbox">
                        <input type="checkbox" tabindex="0" class="hidden" name="termsAndConditions"
                               id="termsAndConditions">
                        <label for="termsAndConditions">I agree to the terms and conditions</label>
                    </div>
                </div>
            </div>
            <button class="ui fluid large green submit button" id="createClub" type="submit" name="submit">Create Club</button>
        </form>

        <script type="text/javascript">
            $('.ui.form')
                .form({
                        email: {
                            identifier: 'email',
                            rules: [
                                {
                                    type: 'email',
                                    prompt: 'Please enter a valid e-mail'
                                }
                            ]
                        },
                        checkbox: {
                            identifier: 'termsAndConditions',
                            rules: [
                                {
                                    type: 'checked',
                                    prompt: 'Please agree to the terms & conditions'
                                }
                            ]
                        }
                    }
                )
            ;
        </script>

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