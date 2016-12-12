<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"
          href="C:\Users\ross1\Documents\PHPStormProjects\goPortlethen\semantic\dist\semantic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<?php include("includes/header.php"); ?>
<body>
<h2 class="ui center aligned header">Help Page</h2>
<div class="ui container">
    <div class="ui horizontal section divider">FAQs</div>
    <div class="ui three column grid">
        <div class="row">
            <div class="column">
                <div class="ui header">
                    How do I create an account?
                </div>
                <p>Please use the sign up button at the top right hand side of the page.</p>
            </div>
            <div class="column">
                <div class="ui header">
                    How do I add a club to the site as a club admin?
                </div>
                <p>Please sign up first as a club admin from the sign up page and then navigate to the clubs page. Once
                    signed in as a club admin you will be able to create a club from the create new club button</p>
            </div>
            <div class="column">
                <div class="ui header">
                    What are the different access levels?
                </div>
                <p>There are 4 different types of account you may hold. Contributor, Club admin Map admin and Site
                    admin. The most common account is contributor.</p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit
                    eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo
                    tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam.
                    Vestibulum a convallis diam.</p>
            </div>
            <div class="column">
                <div class="ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit
                    eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo
                    tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam.
                    Vestibulum a convallis diam.</p>
            </div>
            <div class="column">
                <div class="ui header">
                    How do I create an account?
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tellus, porta efficitur blandit
                    eget, lobortis eget libero. Aliquam id augue a sapien efficitur consequat. Pellentesque commodo
                    tempor rutrum. Vestibulum sit amet mi quis purus viverra viverra. Mauris sit amet molestie quam.
                    Vestibulum a convallis diam.</p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="ui container">
        <div class="ui grid">
            <div class="eleven wide column">
                <div class="ui centered header">If these didn't help then please send a message to one of our Site
                    Administrators:
                </div>
            </div>
            <div class="five wide column">
                <button class="positive ui button" id="helpMessage">Send Message</button>
            </div>
        </div>
    </div>
</div>
<div class="ui modal">
    <i class="close icon"></i>
    <div class="header">
        Send a message to a Site Administrator for help
    </div>
    <div class="ui segment">
        <div class="ui form">
            <div class="ui grid">
                <div class="four wide column">
                    <div class="field">
                        <label>First name</label>
                        <input type="text" placeholder="First Name">
                    </div>
                </div>
                <div class="four wide column">
                    <div class="field">
                        <label>Last name</label>
                        <input type="text" placeholder="Middle Name">
                    </div>
                </div>
                <div class="four wide column">
                    <div class="field">
                        <label>Contact Number</label>
                        <input type="text" placeholder="Contact Number">
                    </div>
                </div>
                <div class="sixteen wide column">
                    <div class="field">
                        <div class="field">
                            <label>Enter your question here : </label>
                            <textarea></textarea>
                        </div>
                    </div>
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
<?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function () {
        $("#helpMessage").click(function () {
            $('.ui.modal')
                .modal('show')
            ;
        });
    });
</script>
</html>