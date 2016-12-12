<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();
//inserts header at top of page
include("/src/inc/includes/header.php");
include("/src/inc/includes/PDOConnect.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (isset($_SESSION['loggedIn'])) {
    $userID = $_SESSION['loggedIn'];
    $sql = "SELECT A.accessID from useraccess A, users B WHERE A.userName = B.userName AND B.userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $accessLevel = $row['accessID'];
}

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
$url = $row['url'];

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
        <?php
        if($accessLevel == 1){
            echo "
            <div class='sixteen wide column'>
                <form action='/semantic/src/inc/editHome.php' class='ui form' method='post'>
                    <button class='ui right floated button' type='submit'><input name='editHome' type='hidden' value = '$contentID'> <i class='ui settings icon'></i> Edit Home</button>
                </form>
            </div>
            ";
        }

        ?>
        <div class="sixteen wide column">
            <div class="ui huge blue centered header">
                <?php echo $title ?>
            </div>
        </div>
        <div class="sixteen wide column">
            <div class="column"><img class="ui medium centered circular image" src="<?php echo $url ?>"></div>
        </div>
        <div class="sixteen wide column">
            <h3 class = 'ui header'>
                <?php echo $caption ?>
            </h3>
        <div class="ui header">
            Need help? Click <a href="/semantic/src/inc/help.php">here</a> for FAQs!
        </div>
    </div>
</div>
</div>
<?php include("/src/inc/includes/footer.php");?>
</body>
</html>