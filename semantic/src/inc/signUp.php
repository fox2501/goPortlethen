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
    <form class = "ui form">
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
            <div class="ui fluid large green submit button">Create Account</div>
        </div>
    </form>
</div>
<div class="ui blue inverted footer segment" style = "position: absolute">
    <div class="ui center aligned container">
        <div class="ui stackable inverted grid">
            <div class="three wide column">
                <h4 class="ui inverted header">Community</h4>
                <div class="ui inverted link list">
                    <a class="item" href="https://www.transifex.com/organization/semantic-org/" target="_blank">Help Translate</a>
                    <a class="item" href="https://github.com/Semantic-Org/Semantic-UI/issues" target="_blank">Submit an Issue</a>
                    <a class="item" href="https://gitter.im/Semantic-Org/Semantic-UI" target="_blank">Join our Chat</a>
                    <a class="item" href="/cla.html" target="_blank">CLA</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Network</h4>
                <div class="ui inverted link list">
                    <a class="item" href="https://github.com/Semantic-Org/Semantic-UI" target="_blank">GitHub Repo</a>
                    <a class="item" href="https://forums.semantic-ui.com" target="_blank">User Forums</a>
                    <a class="item" href="http://1.semantic-ui.com">1.x Docs</a>
                    <a class="item" href="http://legacy.semantic-ui.com">0.x Docs</a>
                </div>
            </div>
            <div class="seven wide right floated column">
                <h4 class="ui inverted header">Help Preserve This Project</h4>
                <p> Support for the continued development of Semantic UI comes directly from the community.</p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="7ZAF2Q8DBZAQL">
                    <button type="submit" class="ui large button">Donate Today</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>