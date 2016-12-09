<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "C:\Users\ross1\Documents\PHPStormProjects\goPortlethen\semantic\dist\semantic.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<?php include("includes/header.php");?>
<body>
<header>Help Page</header>
<div class = "ui container">
    <div class = "ui horizontal section divider">FAQs</div>
    <div class = "ui three column grid">
        <div class = "row">
            <div class = "column">
                <div class = "ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam. Vestibulum a convallis diam.</p>
            </div>
            <div class = "column">
                <div class = "ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam. Vestibulum a convallis diam.</p>
            </div>
            <div class = "column">
                <div class = "ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam. Vestibulum a convallis diam.</p>
            </div>
        </div>
        <div class = "row">
            <div class = "column">
                <div class = "ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam. Vestibulum a convallis diam.</p>
            </div>
            <div class = "column">
                <div class = "ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam. Vestibulum a convallis diam.</p>
            </div>
        <div class = "column">
            <div class = "ui header">
                How do I create an account?
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam. Vestibulum a convallis diam.</p>
        </div>
        </div>
    </div>
    <br>
    <div class = "ui container">
        <div class = "ui grid">
            <div class = "eleven wide column">
                <div class = "ui centered header">If these didn't help then please send a message to one of our Site Administrators:</div>
            </div>
            <div class = "five wide column">
                <button class="positive ui button" id = "helpMessage">Send Message</button>
            </div>
        </div>
    </div>
</div>
<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Send a message to a Site Administrator for help
    </div>
    <div class = "ui segment">
        <div class="ui form">
            <div class="three fields">
                <div class="field">
                    <label>First name</label>
                    <input type="text" placeholder="First Name">
                </div>
                <div class="field">
                    <label>Last name</label>
                    <input type="text" placeholder="Middle Name">
                </div>
                <div class="field">
                    <label>Contact Number</label>
                    <input type="text" placeholder="Contact Number">
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cancel
        </div>
        <div class="ui positive right labeled icon button">
            Send Message
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>
</body>
<?php include("includes/footer.php");?>
<script>
    $(document).ready(function(){
        $("#helpMessage").click(function(){
            $('.ui.modal')
                    .modal('show')
            ;
        });
    });
</script>
</html>