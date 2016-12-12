<?php
session_start();
?>
<head>
    <title>Form submission</title>
</head>


<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$from = 'From: xander19@btinternet.com';
$to = 'alexander.ladd@btinternet.com';
$subject = 'Customer Inquiry';
$body = "From: $name\n E-Mail: $email\n Message:\n $message";

if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) {
        echo '<p>Your message has been sent!</p>';
    } else {
        echo '<p>Something went wrong, go back and try again!</p>';
    }
}
?>

<body>

<form method="post" action="mailto:xander19@btinternet.com" >
    First Name: <input type="text" name="first_name"><br>
    Last Name: <input type="text" name="last_name"><br>
    Email: <input type="text" name="email"><br>
    Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
    <input type="submit" value="Send Email" />
</form>

</body>
