<?php
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$question = $_POST['question'];
$from = 'From: xander19@btinternet.com';
$to = 'alexander.ladd@btinternet.com';
$subject = 'Customer Inquiry';
$body = "From: $firstName\n E-Mail: $emailAddress\n Message:\n $question";

$sql = "SELECT emailAddress FROM users A, useraccess B WHERE A.userName = B.userName AND b.accessID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([1]);
$emailString;
while($row = $stmt -> fetch(PDO::FETCH_ASSOC){

$emailString = $row['emailAddress'].";";
}

?>
