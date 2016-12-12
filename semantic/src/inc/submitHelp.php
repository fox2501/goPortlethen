<?php
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$question = $_POST['question'];
$body = "From: $firstName\n E-Mail: $email\n Message:\n $message";

SELECT emailAddress FROM users A, useraccess B WHERE A.userName = B.userName AND b.accessID = 1

?>