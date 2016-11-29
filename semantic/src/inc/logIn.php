<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "/goportlethen/semantic/dist/semantic.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<?php include("includes/header.php");?>
<body>
<div class = "ui center aligned container">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui blue header">
                <div class="content">
                    Log-in to your account
                </div>
            </h2>
            <form action = "checkLogin.php" method = "POST">
                <form class="ui large form">
                    <div class="ui stacked segment">
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="email" placeholder="E-mail address">
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <button class="ui fluid large blue submit button" type = "submit">Login</button>
                    </div>
                </form>
            </form>


            <div class="ui message">
                New to us? <a href="signUpForm.php">Sign Up</a>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
<?php include("includes/footer.php");?>
</html>