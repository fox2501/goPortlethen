<?php
session_start();

//connects to database server
include("includes/PDOConnect.php");
if (isset($_SESSION['loggedIn'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
</head>

<?php
include("includes/header.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$userID = $_SESSION['loggedIn'];
$sql = "SELECT firstName, surname, age, emailAddress FROM users WHERE userID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$userID]);
$row = $stmt ->fetch(PDO::FETCH_ASSOC);
    $firstName = $row['firstName'];
    $surname = $row['surname'];
    $age = $row['age'];
    $email = $row['emailAddress'];

?>
<!--main body-->
<body>
<div class="ui container">
    <div class="ui three column grid">
        <div class="eight wide column">
            <div class="ui huge blue header">
                User settings
            </div>
        </div>
        <div class="four wide column">
            <form>
                <button class="ui red right floated button" formaction="deleteProfile.php"><i class="remove user icon"></i>Delete Profile</button>
            </form>
        </div>
        <div class="four wide column">
            <form>
                <button class="ui right floated button" formaction="changePassword.php"><i class="settings icon"></i> Change Password</button>
            </form>
        </div>
    </div>
    <div class="ui grid">
        <div class="row">
            <div class="column">
                <form action="includes/submitEditProfile.php" class="ui form" method="post">
                    <div class="ui error message"></div>
                    <div class="field">
                        <label>First Name</label> <input name="firstName" type="text" value="<?php echo $firstName; ?>">
                    </div>
                    <div class="field">
                        <label>Surname</label> <input name="surname" type="text" value="<?php echo $surname; ?>">
                    </div>
                    <div class="field">
                        <label>Age</label> <input name="age" type="number" value="<?php echo $age; ?>">
                    </div>
                    <div class="field">
                        <label>Email Address</label> <input name="email" type="text" value="<?php echo $email; ?>">
                    </div><button class="ui fluid large green submit button" type="submit">Submit</button>
                    <script type="text/javascript">
                        ;
                        (function ($) {
                            $('.ui.form').form({
                                on: 'blur',
                                fields: {
                                    firstname: {
                                        identifier: 'firstName',
                                        rules: [
                                            {
                                                type: 'empty',
                                                prompt: 'You need to input a value for your first name!'
                                            }
                                        ]
                                    },
                                    surname: {
                                        identifier: 'surname',
                                        rules: [
                                            {
                                                type: 'empty',
                                                prompt: 'You need to input a value for surname!'
                                            }
                                        ]
                                    },
                                    age: {
                                        identifier: 'age',
                                        rules: [
                                            {
                                                type: 'empty',
                                                prompt: 'You need to input a value for age!'
                                            }
                                        ]
                                    },
                                    email: {
                                        identifier: 'email',
                                        rules: [
                                            {
                                                type: 'email',
                                                prompt: 'Please enter a valid email.'
                                            },
                                            {
                                                type: 'empty',
                                                prompt: 'Please enter an email address.'
                                            }
                                        ]
                                    }

                                }
                            })
                        })(jQuery);
                    </script>
                </form>
            </div>
        </div>
    </div>
</div><?php
include("includes/footer.php");
} else{
    header("Location: /semantic/src/inc/logIn.php?restricted");
}
?>
</body>
</html>