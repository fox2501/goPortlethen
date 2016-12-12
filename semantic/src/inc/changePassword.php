<?php
session_start();
include("includes/dbconnect.php");

if (isset($_SESSION['loggedIn'])) {
    include("includes/header.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
</head>

<body>
    <!-- Begin container -->
    <div class="ui stackable container">
        <!-- Heading -->
        <div class="ui stackable two column grid">
            <div class="ui column">
                <div class="ui huge blue header">Change Password</div>
            </div>
        </div>
        <!-- Main body -->
        <div class="ui stackable grid">
            <div class="row">
                <div class="column">
                    <form action="submitChangePassword.php" class="ui form" method="post">
                        <div class="field">
                            <label>New Password</label>
                            <input name="passwordOne" type="password" value=''>
                        </div>
                        <div class="field">
                            <label>Confirm Password</label>
                            <input name="passwordConfirm" type="password" value=''>
                        </div>
                        <button class="ui fluid large green submit button" type="submit">Submit</button>

                        <!-- Begin validation -->
                        <script type="text/javascript">
                            (function ($) {
                                $('.ui.form').form({
                                    on: 'blur',
                                    fields: {
                                        passwordOne: {
                                            identifier: 'passwordOne',
                                            rules: [
                                                {
                                                    // Password must be at least 8 characters long
                                                    type: 'minLength[8]',
                                                    prompt: 'Please ensure your password is at least 8 characters!'
                                                }
                                            ]
                                        },
                                            passwordConfirm: {
                                                identifier: 'passwordConfirm',
                                                rules: [
                                                    {
                                                        // Passwords entered must match
                                                        type: 'match[passwordOne]',
                                                        prompt: 'Please ensure your passwords match!'
                                                    },
                                                    {
                                                        type: 'minLength[8]',
                                                        prompt: 'Please confirm your password ensuring it is atleast 8 characters!'
                                                    }
                                                ]
                                            }
                                        }
                                    })
                                })
                            (jQuery);
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
include("includes/footer.php");
}
else {
    header("Location: /semantic/src/inc/logIn.php");
}
?>
</body>
</html>