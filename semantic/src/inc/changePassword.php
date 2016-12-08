<?php
session_start();
include("includes/dbconnect.php");
if (isset($_SESSION['loggedIn'])) {
    include("includes/header.php");
    ?>
    <body>
    <div class="ui container">
        <div class = "ui two column grid">
            <div class = "ui column">
                <div class = "ui huge blue header">
                    Change Password
                </div>
            </div>
        </div>
        <div class="ui grid">
            <div class="row">
                <div class = "column">
                    <form class = "ui form" action="submitChangePassword.php" method="POST">
                        <div class = "field">
                            <label>New Password</label>
                            <input type = "password" name = "passwordOne" value = ''/>
                        </div>
                        <div class = "field">
                            <label>Confirm Password</label>
                            <input type = "password" name = "passwordConfirm" value = ''/>
                        </div>
                        <button class="ui fluid large green submit button" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
    include("includes/footer.php");
} else{
    header("Location: /semantic/src/inc/logIn.php");
}
?>

