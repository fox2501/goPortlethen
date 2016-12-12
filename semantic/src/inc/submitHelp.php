<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$firstname = htmlentities($_POST['firstName']);
$lastname = htmlentities($_POST['lastName']);
$emailAddress = htmlentities($_POST['emailAddress']);
$question = htmlentities($_POST['question']);
$from = 'From: xander19@btinternet.com';
$to = 'alexander.ladd@btinternet.com';

$sql = "SELECT emailAddress FROM users A, useraccess B WHERE A.userName = B.userName AND b.accessID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([1]);
$emailString;
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){

    echo $row;
//$emailString = $emailString.$row['emailAddress'].";";

}

echo $emailString;

?>

<?php
//if(isset($_POST["submit"])){
//// Checking For Blank Fields..
//if($_POST["firstName"]==""||$_POST["question"]==""){
//echo "Fill All Fields..";
//}else{
//// Check if the "Sender's Email" input field is filled out
//$email=$_POST['question'];
//// Sanitize E-mail Address
//$email =filter_var($email, FILTER_SANITIZE_EMAIL);
//// Validate E-mail Address
//$email= filter_var($email, FILTER_VALIDATE_EMAIL);
//if (!$email){
//echo "Invalid Sender's Email";
//}
//else{
//$subject = $_POST['sub'];
//$message = $_POST['msg'];
//
//// Send Mail By PHP Mail Function
//mail($email, $question);
//echo "Your mail has been sent successfuly ! Thank you for your feedback";
//}
//}
//}
//
?>
