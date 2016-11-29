<?php
session_start();
?>
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
<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("includes/header.php");
?>
<body>
<div class = "ui center aligned container">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui blue header">
                <div class="content">
                    Log-in to your account
                </div>
            </h2>
            <form class="ui large form" action = "includes/checkLogin.php" method = "POST">
                    <div class="ui stacked segment">
                        <?php
                        if(strpos($url, 'error=password') !== false){
                            echo "
                                  <div class='field warning'>
                                    <div class='ui left icon input'>
                                        <i class='user icon'></i>
                                        <input type='text' name='username' placeholder='test'>
                                    </div>
                                  </div>
                                  <div class='field warning'>
                                    <div class='ui left icon input'>
                                        <i class='lock icon'></i>
                                        <input type='password' name='password' placeholder='Password'>
                                    </div>
                                  </div>";
                        } else{
                            echo "
                                  <div class='field'>
                                    <div class='ui left icon input'>
                                        <i class='user icon'></i>
                                        <input type='text' name='username' placeholder='Username'>
                                    </div>
                                  </div>
                                  <div class='field'>
                                    <div class='ui left icon input'>
                                        <i class='lock icon'></i>
                                        <input type='password' name='password' placeholder='Password'>
                                    </div>
                                  </div>";
                        }

                        ?>

                        <button class="ui fluid large blue submit button" type = "submit">Login</button>
                    </div>
            </form>


            <div class="ui message">
                New to us? <a href="signUpForm.php">Sign Up</a>
            </div>
        </div>
    </div>
    </div>
<div class="ui bottom attached warning message">
    <i class="icon help"></i>
    Already signed up? <a href="/semantic/src/inc/logIn.php">Login here</a> instead.
</div>
</div>
</body>
<?php include("includes/footer.php");?>
</html>