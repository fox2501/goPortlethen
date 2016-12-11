<?php
session_start();
include("includes/dbconnect.php");
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            <div class="ui error message"></div>
            <?php
            if (strpos($url, 'error=usernameExists') !== false) {
                echo "
                <div class='ui negative message'>
                    <div class='header'>
                        Sorry. The username you have chosen already exists.
                    </div>
                </div>
                ";
            }
            ?>
            <div class="required field">
                <label>First Name</label>
                    <input name='firstName' placeholder='Please enter your first name.' type='text'>
            </div>
            <div class="required field">
                <label>Surname</label>
                    <input name='surname' placeholder='Please enter your surname.' type='text'>
            </div>
            <div class="required field">
                <label>Age</label>
                    <input name='age' placeholder='Please enter your age.' type='number'>
            </div>
            <div class="required field">
                <label>Email Address</label>
                    <input name='email' placeholder='Please enter an email address.' type='text'>
            </div>
            <div class="required field">
                <label>Username</label>
                    <input name='username' placeholder='Please enter a username.' type='text'>
            </div>
            <div class="required field">
                <label>Password</label>
                    <input name='password' placeholder='Please enter a password.' type='password'>
            </div>
            <div class="required field">
                <label>Confirm Password</label>
                    <input name='passwordConfirm' placeholder='Please now confirm your password.' type='password'>
            </div>
            <div class="required field">
                <label>Access Requested</label>
                <select class="ui search dropdown" name="accessRequested">
                    <option value="emptyDropdown"></option>
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
        </div>
        <script type="text/javascript">
            ;
            (function ($) {
                $('.ui.form').form({
                    on: 'blur',
                    fields: {
                        firstName: {
                            identifier: 'firstName',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter your firstname.'
                                }
                            ]
                        },
                        surname: {
                            identifier: 'surname',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter your surname.'
                                }
                            ]
                        },
                        emptyDropdown: {
                            identifier: 'accessRequested',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please select a value!'
                                }
                            ]
                        },
                        email: {
                            identifier: 'email',
                            rules: [
                                {
                                    type: 'email',
                                    prompt: 'Please enter a valid email.'
                                },
                                {
                                    type: 'empty',
                                    prompt: 'Please enter an email address.'
                                }
                            ]
                        },
                        age: {
                            identifier: 'age',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter your age.'
                                }
                            ]
                        },
                        usernameEmpty: {
                            identifier: 'username',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter a username.'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [
                                {
                                    type: 'minLength[8]',
                                    prompt: 'Please ensure your password is atleast 8 characters!'
                                }
                            ]
                        },
                        matchPassword2: {
                            identifier: 'passwordConfirm',
                            rules: [
                                {
                                    type: 'match[password]',
                                    prompt: 'Please ensure your passwords match!'
                                },
                                {
                                    type: 'minLength[8]',
                                    prompt: 'Please confirm your password ensuring it is atleast 8 characters!'
                                }
                            ]
                        },
                    }
                })
            })(jQuery);
        </script>
    </form>
</div><?php include("includes/footer.php"); ?>
</body>
</html>