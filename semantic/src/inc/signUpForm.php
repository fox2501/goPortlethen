<?php
session_start();
include("includes/dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <title>goPortlethen</title>
</head><?php include("includes/header.php"); ?>
<body>
<div class="ui container">
    <form class="ui form" action="includes/submitSignUp.php" method="post">
        <h2 class="ui center aligned blue header"></h2>
        <div class="content">
            <h2 class="ui center aligned blue header">Sign up </h2>
        </div>
        <div class="ui segment">
            <div class="field">
                <label>First Name</label>
                <div class='field'>
                    <input name='firstName' placeholder='Please enter your first name.' type='text'>
                </div>
            </div>
            <div class="field">
                <label>Surname</label>
                <div class='field'>
                    <input name='surname' placeholder='Please enter your surname.' type='text'>
                </div>
            </div>
            <div class="field">
                <label>Age</label>
                <div class='field'>
                    <input name='age' placeholder='Please enter your age.' type='number'>
                </div>
            </div>
            <div class="field">
                <label>Email Address</label>
                <div class='field'>
                    <input name='email' placeholder='Please enter an email address.' type='text'>
                </div>
            </div>
            <div class="field">
                <label>Username</label>
                <div class='field'>
                    <input name='username' placeholder='Please enter a username.' type='text'>
                </div>
            </div>
            <div class="field">
                <label>Password</label>
                <div class='field'>
                    <input name='password' placeholder='Please enter a password.' type='password'>
                </div>
            </div>
            <div class="field">
                <label>Confirm Password</label>
                <div class='field'>
                    <input name='passwordConfirm' placeholder='Please now confirm your password.' type='password'>
                </div>
            </div>
            <div class="field">
                <label>Access Requested</label> <select class="ui select dropdown" name="accessRequested">
                    <option value="contributor">
                        Contributor
                    </option>
                    <option value="club">
                        Club Admin
                    </option>
                    <option value="map">
                        Map Admin
                    </option>
                    <option value="site">
                        Site Admin
                    </option>
                </select>
            </div>
            <button class="ui fluid large green submit button" type="submit">Create Account</button>
            <div class="ui error message"></div>
        </div>
        <script type = "text/javascript">
            ;(function($){
                    .form({
                        on: 'blur',
                        fields: {
                            firstName: {
                                identifier  : 'firstName',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter a value'
                                    }
                                ]
                            },
                            surname: {
                                identifier  : 'surname',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter a value'
                                    }
                                ]
                            },
                            email: {
                                identifier  : 'email',
                                rules: [
                                    {
                                        type   : 'email',
                                        prompt : 'Please enter a valid email.'
                                    }
                                ]
                            }
                        }
                    })
                ;
            })(jQuery);


        </script>
    </form>
</div><?php include("includes/footer.php"); ?>
</body>
</html>