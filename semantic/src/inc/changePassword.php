<?php
//session begins
session_start();
//connects to database server
include("includes/dbconnect.php");
if (isset($_SESSION['loggedIn'])) {
include("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>goPortlethen</title>
</head>
<body>
<div class="ui container">
    <div class="ui two column grid">
        <div class="ui column">
            <div class="ui huge blue header">
                Change Password
            </div>
        </div>
    </div><!--changing password logic-->
    <div class="ui grid">
        <div class="row">
            <div class="column">
                <form action="submitChangePassword.php" class="ui form" method="post">
                    <div class="ui error message"></div>
                    <div class="field">
                        <label>New Password</label> <input name="passwordOne" type="password" value=''>
                    </div>
                    <div class="field">
                        <label>Confirm Password</label> <input name="passwordConfirm" type="password" value=''>
                    </div><button class="ui fluid large green submit button" type="submit">Submit</button>
                    <script type="text/javascript">
                        ;
                        (function ($) {
                            $('.ui.form').form({
                                on: 'blur',
                                fields: {
                                    passwordOne: {
                                        identifier: 'passwordOne',
                                        <!--checks password is atleast 8 chars and if not gives error message-->
                                        rules: [
                                            {
                                                type: 'minLength[8]',
                                                prompt: 'Please ensure your password is atleast 8 characters!'
                                            }
                                        ]
                                    },
                                    passwordConfirm: {
                                        identifier: 'passwordConfirm',
                                        <!--makes sure same passwords are entered-->
                                        rules: [
                                            {
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
                        })(jQuery);
                    </script>
                </form>
            </div>
        </div>
    </div>
</div><?php
include("includes/footer.php");
} else{
    header("Location: /semantic/src/inc/logIn.php");
}
?>
</body>
</html>