<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "goPortlethen/semantic/dist/semantic.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<?php include("includes/header.php");?>
<body>
<div class = "ui container">
    <form class = "ui form" action = "submitSignUp.php" method = "POST">
        <h2 class="ui center aligned blue header">
            <div class="content">
                Sign up
            </div>
        </h2>
        <div class = "ui segment">
        <div class = "field">
            <label>Display Name</label>
            <div class = "field">
                <input type = "text" name = "displayName" placeholder = "Enter your display name. This can just be your first name.">
            </div>
        </div>
        <div class = "field">
            <label>Email Address</label>
            <div class = "field">
                <input type = "text" name = "email" placeholder = "Please enter your email address.">
            </div>
        </div>
        <div class = "field">
            <label>Username</label>
            <div class = "field">
                <input type = "text" name = "username" placeholder = "Please enter a username. You will use this to login.">
            </div>
        </div>
        <div class = "field">
            <label>Password</label>
            <div class = "field">
                <input type = "password" name = "password" placeholder = "Please create a password.">
            </div>
        </div>
            <div class = "field">
                <label>Age</label>
                <div class = "field">
                    <input type = "text" name = "age" placeholder = "Please enter your age."
                </div>
            </div>
            <div class="ui fluid large green submit button">Create Account</div>
        </div>
    </form>
</div>
</body>
<?php include("includes/footer.php");?>
</html>