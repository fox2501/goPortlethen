<?php
session_start();
//inserts header at top of page
include("/src/inc/includes/header.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$sql = "SELECT * FROM homecontent";
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$contentID = $row['contentID'];
$title = $row['title'];
$caption = $row['caption'];

$sql = "SELECT * FROM photos WHERE homeContentID = ?";
$stmt = $pdo -> prepare($sql);
$stmt -> execute([$contentID]);
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$photoID = $row['photoID'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>GoPortlethen Home</title>
</head>
<body>
<?php
if(strpos($url, 'newUser') !== false){
    echo "
	            <div class='ui warning message'>
	          <div class='centered header'>
	            You have successfully signed up. Please login!
	          </div>
	        </div>
	        ";
}
if(strpos($url, 'accountDeleted') !== false){
    echo "
	            <div class='ui error message'>
	          <div class='centered header'>
	            You have successfully deleted your account.
	          </div>
	        </div>
	        ";
}
?>
<div class="ui stackable container">
    <div class="ui stackable grid">
        <div class="sixteen wide column">
            <form action='editHome.php' class='ui form' method='post' onclick='/semantic/src/inc/editHome.php'>
                <button class='ui right floated button' onclick='/semantic/src/inc/editHome.php' type='submit'><input name='editHome' type='hidden' value = '<?php echo $contentID ?>'> <i class='ui settings icon'></i> Edit Home</button>
            </form>
        </div>
        <div class="sixteen wide column">
            <div class="ui huge blue centered header">
                <?php echo $title ?>
            </div>
        </div>
        <div class="sixteen wide column">
            <div class="column"><img class="ui medium centered circular image" src="<?php echo $photoID ?>"></div>
        </div>
        <div class="sixteen wide column">
            <p><?php echo $caption ?></p>
        <div class="ui header">
            Need help? Click <a href="/semantic/src/inc/help.php">here</a> for FAQs!
        </div>
    </div>
</div><?php include("/src/inc/includes/footer.php");?>
</body>
</html>