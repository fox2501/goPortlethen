<?php
//session begins
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js">
    </script>
    <title>goPortlethen</title>
</head><?php include("includes/header.php"); ?>
<!--main body-->
<body>
<h1 align="center">FAQS</h1>
<div class="ui horizontal section divider">
    <p>Here to help!</p>
</div>
<div class="ui stackable container">
    <div class="ui stackable three column grid">
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
                <p>Please sign up first as a club admin from the sign up page and then navigate to the clubs page. Once signed in as a club admin you will be able to create a club from the create new club button</p>
            </div>
            <div class="column">
                <div class="ui header">
                    What are the different access levels?
                </div>
                <p>There are 4 different types of account you may hold. Contributor, Club admin Map admin and Site admin. The most common account is contributor.</p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="ui header">
                    How do I see a map/route in the area?
                </div>
                <p>Click on the maps button at the top of the page and then click on click here to view this map</p>
            </div>
            <div class="column">
                <div class="ui header">
                    How do I create a point of interest on the map?
                </div>
                <p>Firstly login on a Map admin account or create one <a href="signUpForm.php">here.</a> Then navigate to the map page and click create route. From here you can add a marker to the map which will give you the coordinates. You can also determine if it is a Viewpoint, Location of Interest or a Historical Landmark</p>
            </div>
            <div class="column">
                <div class="ui header">
                    How do I add in health content?
                </div>
                <p>Firstly login with any account or create one <a href="signUpForm.php">here.</a> Next go to the Health and wellbeing page from the top menu bar. Click submit content</p>
            </div>
        </div>
    </div><br>
    <br>
    <div class="ui container">
        <div class="ui grid">
            <div class="eleven wide column">
                <div class="ui centered header">
                    If these didn't help then please send a message to one of our Site Administrators:
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
        <form class="ui form" method = "post">
            <div class="ui grid">
                <div class="four wide column">
                    <div class="field">
                        <label>First name</label> <input name = "firstName" placeholder="First Name" type="text">
                    </div>
                </div>
                <div class="four wide column">
                    <div class="field">
                        <label>Last name</label> <input name = "lastName" placeholder="Last Name" type="text">
                    </div>
                </div>
                <div class="four wide column">
                    <div class="field">
                        <label>Email Address</label> <input name = "EmailAddress" placeholder="Email Address" type="text">
                    </div>
                </div>
                <div class="sixteen wide column">
                    <div class="field">
                        <div class="field">
                            <label>Enter your question here :</label> <input name="question" type="text">
                        </div>
                    </div>
                    <button class="ui positive right labeled icon button" id= "createEmail" type="submit">
                        <a href="submitHelp.php">Send Message</a> <i class="checkmark icon"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="ui black deny button">
            Cancel
        </div>

    </div>
</div><?php include("includes/footer.php"); ?>
<script>
    $(document).ready(function () {
        $("#helpMessage").click(function () {
            $('.ui.modal')
                .modal('show')
            ;
        });
    });
</script>
</body>
</html>