<?php
session_start();
//connects to database server
include("includes/PDOConnect.php");

if (isset($_SESSION['loggedIn'])) {
$userID = $_SESSION['loggedIn'];

$sql = "SELECT accessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$accessID = $row['accessID'];

$clubID = $_POST['editClub'];
$sql = "SELECT userID from club where clubID = ?";
$stmt = $pdo -> prepare($sql);
$stmt->execute([$clubID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
if ($row['userID'] == $userID || $accessID == '1') {
$clubID = $_POST['editClub'];
$sql = "SELECT * FROM club WHERE clubID = ?";
$stmt = $pdo -> prepare($sql);
$stmt->execute([$clubID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $clubName = $row['clubName'];
    $category = $row['clubCategory'];
    $clubDesc = $row['clubDescription'];
    $contactNum = $row['contactNumber'];
    $feeRequired = $row['feePaid'];
    $feeCost = $row['feeCost'];
    $websiteURL = $row['websiteURL'];
}
if($feeRequired == 1){
    $feeRequired = 'Yes';
} else{
    $feeRequired = 'No';
}
$sql = "SELECT * from photos WHERE clubID = ?";
$stmt = $pdo -> prepare($sql);
$stmt->execute([$clubID]);
while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $photoURL = $row['url'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="goPortlethen/semantic/dist/semantic.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js">
    </script>
    <title>Edit Club</title>
</head>
<?php
include("includes/header.php");
echo "
<body>
<div class='ui stackable container'>
		<div class='ui stackable grid'>
			<div class='eight wide column'>
				<header class='ui blue huge header'>
					Edit club: $clubName
				</header>
			</div>
			<div class='eight wide column'>
				<form action='deleteClub.php' method='post'>
					<button class='ui red right floated button' name='clubID' type='submit' value='$clubID'>Delete Club</button>
				</form>
			</div>
			<div class='four wide column'>
				<div class='ui card'>
					<div class='image'><img src='$photoURL'></div>
				</div>
			</div>
			<div class='twelve wide column'>
				<form action='submitEditClub.php' class='ui form' enctype=\"\&quot;multipart/form-data\&quot;\" method='post'>
					<div class='field'>
						<label>Edit Club Name</label> <input name='editClubName' type='text' value='$clubName'>
					</div>
					<div class='field'>
						<label>Edit Club Description</label> 
						<textarea name='editDescription' rows=\"\&quot;\&quot;8\&quot;\&quot;\">$clubDesc</textarea>
					</div>
					<div class='field'>
						<label>Edit Contact Number</label> <input name='editNumber' type='number' value='$contactNum'>
					</div>
					<div class='field'>
						<label>Edit Website</label> <input name='editURL' type='text' value='$websiteURL'>
					</div>
					<div class='field'>
						<label>Fee Required?</label>
						<div class='ui selection dropdown' id='dropdown'>
							<input name='editFeeRequired' type='hidden'> <i class='ui dropdown icon'></i>
							<div class='default text'>
								$feeRequired
							</div>
							<div class='menu'>
								<div class='ui simple dropdown item'>
									Yes
								</div>
								<div class='ui simple downdown item'>
									No
								</div>
							</div>
						</div>
					</div>
					<div class='field'>
						<label>Edit Monthly Cost</label> <input name='editCost' type='text' value='$feeCost'>
					</div>
					<div class='field'>
						<input name='clubToEdit' type='hidden' value='$clubID'>
					</div>
					<div class='field'>
						<label>Please upload your clubs profile picture:</label>
						<div class='ui fluid action input'>
							<input name='img' size='35' type='file'>
						</div>
					</div><button class='ui fluid large green submit button' type='submit'>Submit</button> 
					<script type='text/javascript'>
					               
					               (function ($) {
					                   $('.ui.form').form({
					                       fields: {
					                           clubName: {
					                               identifier: 'clubName',
					                               rules: [
					                                   {
					                                       type: 'empty',
					                                       prompt: 'Please enter your clubs name'
					                                   }
					                               ]
					                           },
					                           clubEmail: {
					                               identifier: 'email',
					                               rules: [
					                                   {
					                                       type: 'email',
					                                       prompt: 'Please enter a valid email address'
					                                   }
					                               ]
					                           },
					                           clubCategory: {
					                               identifier: 'clubCategory',
					                               rules: [
					                                   {
					                                       type: 'empty',
					                                       prompt: 'Please select a club category'
					                                   }
					                               ]
					                           },
					                           clubDescription: {
					                               identifier: 'clubDescription',
					                               rules: [
					                                   {
					                                       type: 'empty',
					                                       prompt: 'Please select a club category'
					                                   }
					                               ]
					                           },
					                           number: {
					                               identifier: 'phoneNumber',
					                               rules: [
					                                   {
					                                       type: 'number',
					                                       prompt: 'Please enter a valid phone number'
					                                   }
					                               ]
					                           },
					                           url: {
					                               identifier: 'websiteURL',
					                               optional   : true,
					                               rules: [
					                                   {
					                                       type: 'url',
					                                       prompt: 'Please enter a url'
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
    ";
    include('includes/footer.php');
echo "
</body>
";

} else {
    echo "You do not have permission";
}
}
};
?>
</html>