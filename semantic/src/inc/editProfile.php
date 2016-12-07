<?php
session_start();
include("includes/dbconnect.php");
if (isset($_SESSION['loggedIn'])) {
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
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $userID = $_SESSION['loggedIn'];
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT firstName, surname FROM users WHERE userID = '$userID'";
    $result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result)) {
        $firstName = $row['firstName'];
        $surname = $row['surname'];
        $age = $row['age'];
        $location = $row['location'];
        $aboutUser = $row['aboutUser'];
    }
    ?>
    <body>
    <div class="ui container">
        <div class = "ui two column grid">
            <div class = "ui column">
                <div class = "ui huge blue header">
                    User settings
                </div>
            </div>
        </div>
        <div class="ui grid">
            <div class="row">
                <div class = "column">
                    <form class = "ui form" action="includes/submitEditProfile.php" method="POST">
                        <div class = "field">
                            <label>First Name</label>
                            <input type = "text" name = "firstName" value =
                            "<?php
                            echo $firstName;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>Surname</label>
                            <input type = "text" name = "surname" value =
                            "<?php
                            echo $surname;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>Age</label>
                            <input type = "number" name = "age" value =
                            "<?php
                            echo $age;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>Location</label>
                            <input type = "text" name = "location" value =
                            "<?php
                            echo $location;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>About</label>
                            <input type = "text" name = "aboutUser" value =
                            "<?php
                            echo $aboutUser;
                            ?>">
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
    header("Location: /semantic/");
}
?>

