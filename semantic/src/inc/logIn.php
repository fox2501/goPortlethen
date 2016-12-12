<?php
//session begins
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>goPortlethen</title>
</head><?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("includes/header.php");
?>
<body>
<div class="ui center aligned container">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui blue header"></h2>
            <div class="content">
                <h2 class="ui blue header">Log-In to Your Account</h2>
            </div>
            <form action="includes/checkLogin.php" class="ui large form" method="post">
                <div class="ui stacked segment">
                    <div class="ui error message"></div>
                    <?php
                    if (strpos($url, 'error=loginerror') !== false) {
                        echo "
						                <div class='ui negative message'>
						                    <div class='header'>
						                        Incorrect username or password!
						                    </div>
						                </div>
						                ";
                    }
                    if (strpos($url, 'error=requireApproval') !== false) {
                        echo "
						                <div class='ui negative message'>
						                    <div class='header'>
						                        Your account still requires approval!
						                    </div>
						                </div>
						                ";
                    }
                    ?>
                    <div class='field'>
                        <div class='ui left icon input'>
                            <i class='user icon'></i> <input name='username' placeholder='Username' type='text'>
                        </div>
                    </div>
                    <div class='field'>
                        <div class='ui left icon input'>
                            <i class='lock icon'></i> <input name='password' placeholder='Password' type='password'>
                        </div>
                    </div><button class="ui fluid large green submit button" type="submit">Login</button>
                </div>
                <script type="text/javascript">
                    ;
                    (function ($) {
                        $('.ui.form').form({
                            on: 'blur',
                            fields: {
                                usernameEmpty: {
                                    identifier: 'username',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Please enter your username.'
                                        }
                                    ]
                                },
                                password: {
                                    identifier: 'password',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Please enter your password.'
                                        }
                                    ]
                                }
                            }
                        })
                    })(jQuery);
                </script>
            </form>
            <div class="ui warning message">
                New to us? <a href="signUpForm.php">Sign Up</a>

            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
</div><?php include("includes/footer.php");?>
</body>
</html>