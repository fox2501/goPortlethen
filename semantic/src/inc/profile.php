<?php
//session begins
session_start();
if (isset($_SESSION['loggedIn'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/goportlethen/semantic/dist/semantic.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
        <title>goPortlethen</title>
    </head>
    <?php
    include("includes/header.php");
    include("includes/dbconnect.php");
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT firstName, surname, age, emailAddress FROM users WHERE userID = '$userID'";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result)) {
        $firstName = $row['firstName'];
        $surname = $row['surname'];
        $emailAddress = $row['emailAddress'];
        $age = $row['age'];
    }
    ?>
    <body>
    <div class="ui container">
        <div class = "ui two column grid">
            <div class = "ui column">

                <div class = "ui huge blue header">
                    My profile
                </div>
            </div>
            <div class = "ui column">
                <form>
                <button class = "ui right floated button" style = "height: 40px;" formaction="editProfile.php">
                    <i class="settings icon"></i>
                    Edit Profile
                </button>
                </form>
            </div>
        </div>
        <div class="ui grid">
            <div class="row">
                <div class="column">
                    <div class="ui one column grid">
                        <div class="column">
                            <div class="row">
                                <h5 class = "ui top attached header">
                                    Name
                                </h5>
                                <div class = "ui attached segment">
                                    <?php
                                    echo $firstName.' '.$surname;
                                    ?>
                                </div>
                                <h5 class = "ui top attached header">
                                    Age
                                </h5>
                                <div class = "ui attached segment">
                                    <?php
                                    echo $age;
                                    ?>
                                </div>
                                <h5 class = "ui top attached header">
                                    Email Address
                                </h5>
                                <div class = "ui attached segment">
                                    <?php
                                    echo $emailAddress;
                                    ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
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

