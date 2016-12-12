<?php
//session begins
session_start();
if (isset($_SESSION['loggedIn'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>My Profile</title>
    </head>
    <?php
    include("includes/header.php");
    include("includes/PDOConnect.php");
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT firstName, surname, age, emailAddress FROM users WHERE userID = ?";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([$userID]);
    $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $firstName = $row['firstName'];
        $surname = $row['surname'];
        $emailAddress = $row['emailAddress'];
        $age = $row['age'];
    ?>
    <body>
    <div class="ui container">
        <?php
        if(strpos($url, 'editedProfile') !== false){
            echo "
	            <div class='ui message'>
	          <div class='centered header'>
	            You have successfully edited your profile information.
	          </div>
	        </div>
	        ";
        }
        ?>
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

    <?php
    include("includes/footer.php");
} else{
    header("Location: /semantic/src/inc/logIn.php?restricted");
}
?>
</html>


