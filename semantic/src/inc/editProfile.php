<?php
session_start();
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
    include("includes/dbconnect.php");
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $userID = $_SESSION['loggedIn'];
    //header("Location: ../profile.php?user=".$userID);
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
                            $userID = $_SESSION['loggedIn'];
                            $sql = "SELECT firstName, surname FROM users WHERE userID = '$userID'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_array($result)) {
                                $firstName = $row['firstName'];
                            }
                            echo $firstName;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>Surname</label>
                            <input type = "text" name = "surname" value =
                            "<?php
                            $userID = $_SESSION['loggedIn'];
                            $sql = "SELECT firstName, surname FROM users WHERE userID = '$userID'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_array($result)) {
                                $surname = $row['surname'];
                            }
                            echo $surname;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>Age</label>
                            <input type = "number" name = "age" value =
                            "<?php
                            $userID = $_SESSION['loggedIn'];
                            $sql = "SELECT age FROM users WHERE userID = '$userID'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_array($result)) {
                                $age = $row['age'];
                            }
                            echo $age;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>Location</label>
                            <input type = "text" name = "location" value =
                            "<?php
                            $userID = $_SESSION['loggedIn'];
                            $sql = "SELECT location FROM users WHERE userID = '$userID'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_array($result)) {
                                $location = $row['location'];
                            }
                            echo $location;
                            ?>">
                        </div>
                        <div class = "field">
                            <label>About</label>
                            <input type = "text" name = "aboutUser" value =
                            "<?php
                            $userID = $_SESSION['loggedIn'];
                            $sql = "SELECT aboutUser FROM users WHERE userID = '$userID'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_array($result)) {
                                $aboutUser = $row['aboutUser'];
                            }
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

