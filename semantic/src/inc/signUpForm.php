<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<?php
include("includes/header.php");
include("includes/submitSignUp.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<?php
?>

<body>
<div class="ui container">
    <form class="ui form" action="includes/submitSignUp.php" method="POST">
        <h2 class="ui center aligned blue header">
            <div class="content">
                Sign up
            </div>
        </h2>
        <?php
        if(strpos($url, 'error=username') !== false){
            echo "<h2> That username is already taken! </h2>";
        }
        ?>
        <div class="ui segment">
            <div class="field">
                <label>Display Name</label>
                <?php
                if(strpos($url, 'error=emptyFirstName') !== false){
                    echo "<div class='field error'>
                            <input type='text' name='firstName'
                           placeholder=$emptyFirstNameError>
                            </div>";
                } else{
                    echo "<div class='field'>
                            <input type='text' name='firstName'
                           placeholder='Please enter your first name.'>
                            </div>";
                }
                ?>

            </div>
            <div class="field">
                <label>Email Address</label>
                    <?php
                    if(strpos($url, 'error=emptyEmail') !== false){
                        echo "<div class='field error'>
                    <input type='text' name='email' placeholder='Please ensure you enter an email address!'>
                </div>";
                    } else{
                        echo "<div class='field'>
                    <input type='text' name='email' placeholder='Please enter an email address.'>
                </div>";
                    }
                    ?>

            </div>
            <div class="field">
                <label>Username</label>
                <?php
                if(strpos($url, 'error=emptyUsername') !== false){
                    echo "<div class='field error'>
                    <input type='text' name='username' placeholder='Please ensure you enter a username!'>
                </div>";
                } else{
                    echo "<div class='field'>
                    <input type='text' name='username' placeholder='Please enter a username.'>
                </div>";
                }
                ?>
            </div>
            <div class="field">
                <label>Password</label>
                <?php
                if(strpos($url, 'error=emptyPassword') !== false){
                    echo "<div class='field error'>
                    <input type='password' name='password' placeholder='Please ensure you enter a password!'>
                </div>";
                } else{
                    echo "<div class='field'>
                    <input type='password' name='password' placeholder='Please enter a password.'>
                </div>";
                }
                ?>
            </div>
            <div class="field">
                <label>Age</label>
                <?php
                if(strpos($url, 'error=emptyAge') !== false){
                    echo "<div class='field error'>
                    <input type='number' name='age' placeholder='Please ensure you enter an email address!'>
                </div>";
                } else{
                    echo "<div class='field'>
                    <input type='number' name='age' placeholder='Please enter an email address.'>
                </div>";
                }
                ?>
            </div>
            <button class="ui fluid large green submit button" type="submit">Create Account</button>
        </div>
    </form>
</div>
</body>
<?php include("includes/footer.php"); ?>
</html>