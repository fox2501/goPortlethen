<?php
session_start();
//inserts header at top of page
include("/src/inc/includes/header.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

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
<form class='ui form' action='editHomePage.php'  method='post' onclick='/semantic/src/inc/editHomePage.php'>
    <button class='ui right floated button' onclick='/semantic/src/inc/editHomePage.php' type='submit'><input name='editHome' type='hidden'> <i class='ui settings icon'></i> Edit Home</button>
</form>
<div class="ui container">
    <div class="ui one column grid">
        <div class="row">
            <div class="column">
                <div class="ui huge blue centered header">
                    Welcome to goPortlethen.org.uk
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column"><img class="ui medium centered circular image" src="https://scontent.flhr4-1.fna.fbcdn.net/v/t1.0-9/13434842_1608517786105160_4523080997776743356_n.jpg?oh=4981b2761c2ef40c4989fc4b74bd440a&oe=58C6B38A"></div>
        </div>
        <div class="row">
            <div class="column">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eros est, feugiat sed ex ac, ultrices pretium elit. Nunc vel varius lectus. Nullam placerat erat ipsum, non consectetur nisi aliquam id. Aliquam in libero leo. Nam et neque mi. Sed vulputate blandit nisl quis feugiat. Morbi tempus commodo dui, et sagittis turpis porttitor vitae. Mauris pharetra id arcu ac efficitur. Mauris id mauris sit amet erat faucibus luctus. Morbi auctor dictum fringilla. Ut ullamcorper lorem nisi, scelerisque consequat neque volutpat vel. Duis eget ante nec felis varius interdum. Duis viverra orci nibh, et tincidunt mauris rhoncus et. Aenean elementum faucibus gravida. Aenean sed consectetur lacus. Nam imperdiet ultricies rhoncus. Ut sed feugiat lacus. Duis ac nulla ac turpis facilisis sollicitudin ut sit amet odio. Etiam vulputate ipsum nec pretium interdum. Nam vitae eros aliquet, aliquam nisl in, mollis nisl. Ut tristique, justo ut hendrerit varius, urna ex luctus erat, eget varius nulla tellus a orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed blandit nulla sit amet odio elementum efficitur.</p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="ui header">
                    Need help? Click <a href="/semantic/src/inc/help.php">here</a> for FAQs!
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("/src/inc/includes/footer.php");?>
</body>
</html>