<?php
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
    //header("Location: ../profile.php?user=".$userID);
    ?>
    <body>
    <div class="ui container">
        <div class = "ui two column grid">
            <div class = "ui column">
                <div class = "ui huge blue header">
                    Edit profile
                </div>
            </div>
        </div>
        <div class="ui three column grid">
            <div class="row">
                <div class="column">
                    <div class="ui card">
                        <div class="image">
                            <img src="http://www.rantlifestyle.com/wp-content/uploads/2014/04/Brick-Tamland1.jpg">
                        </div>
                        <div class="content">
                            <div class = "ui header">
                                <?php
                                $userID = $_SESSION['loggedIn'];
                                $sql = "SELECT firstName, surname FROM users WHERE userID = '$userID'";
                                $result = mysqli_query($db, $sql);
                                while($row = mysqli_fetch_array($result)) {
                                    $firstName = $row['firstName'];
                                    $surname = $row['surname'];
                                }
                                echo $firstName;
                                ?>
                            </div>
                            <div class="meta">
                                <span class="date">
                                    <?php
                                    $userID = $_SESSION['loggedIn'];
                                    $sql = "SELECT year(dateCreated) as yearCreated, monthname(dateCreated) as monthCreated FROM users WHERE userID = '$userID'";
                                    $result = mysqli_query($db, $sql);
                                    while($row = mysqli_fetch_array($result)) {
                                        $yearCreated = $row['yearCreated'];
                                        $monthCreated = $row['monthCreated'];
                                    }
                                    echo "Joined in ".$monthCreated.' '.$yearCreated;
                                    ?>
                                </span>
                            </div>
                            <div class="description">
                                <?php
                                $userID = $_SESSION['loggedIn'];
                                $sql = "SELECT aboutUser FROM users WHERE userID = '$userID'";
                                $result = mysqli_query($db, $sql);
                                while($row = mysqli_fetch_array($result)) {
                                    $aboutUser = $row['aboutUser'];
                                }
                                echo $aboutUser;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "ui form">
                    <div class = "field">
                        <label>First Name</label>
                        <input type = "text" name = "firstName" value =
                        "<?php
                        $userID = $_SESSION['loggedIn'];
                        $sql = "SELECT firstName, surname FROM users WHERE userID = '$userID'";
                        $result = mysqli_query($db, $sql);
                        while($row = mysqli_fetch_array($result)) {
                            $firstName = $row['firstName'];
                            $surname = $row['surname'];
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
                            $firstName = $row['firstName'];
                            $surname = $row['surname'];
                        }
                        echo $firstName;
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
                </div>
            </div>
        </div>
    </div>
    <div class="ui fixed bottom sticky" style="width: 100%;">
        <div class="ui blue inverted footer segment">
            <div class="ui center aligned container">
                <div class="ui stackable inverted grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">Community</h4>
                        <div class="ui inverted link list">
                            <a class="item" href="https://www.transifex.com/organization/semantic-org/" target="_blank">Help
                                Translate</a>
                            <a class="item" href="https://github.com/Semantic-Org/Semantic-UI/issues" target="_blank">Submit
                                an Issue</a>
                            <a class="item" href="https://gitter.im/Semantic-Org/Semantic-UI" target="_blank">Join our
                                Chat</a>
                            <a class="item" href="/cla.html" target="_blank">CLA</a>
                        </div>
                    </div>
                    <div class="three wide column">
                        <h4 class="ui inverted header">Network</h4>
                        <div class="ui inverted link list">
                            <a class="item" href="https://github.com/Semantic-Org/Semantic-UI" target="_blank">GitHub
                                Repo</a>
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
    </div>
    </body>
    </html>
    <?php
} else{
    header("Location: /semantic/");
}
?>

