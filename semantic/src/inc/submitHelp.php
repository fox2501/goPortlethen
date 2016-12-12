<?php
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$question = $_POST['question'];
$from = 'From: xander19@btinternet.com';
$to = 'alexander.ladd@btinternet.com';

$sql = "SELECT emailAddress FROM users A, useraccess B WHERE A.userName = B.userName AND b.accessID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([1]);
$emailString;
while($row = $stmt -> fetch(PDO::FETCH_ASSOC){

$emailString = $row['emailAddress'].";";
}

?>

<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["firstName"]==""||$_POST["question"]==""){
echo "Fill All Fields..";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['question'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "Invalid Sender's Email";
}
else{
$subject = $_POST['sub'];
$message = $_POST['msg'];

// Send Mail By PHP Mail Function
mail($email, $question);
echo "Your mail has been sent successfuly ! Thank you for your feedback";
}
}
}
?>
