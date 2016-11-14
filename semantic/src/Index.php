<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "/goportlethen/semantic/dist/semantic.css">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
    <title>goPortlethen</title>
</head>
<?php include("inc/header.php");?>
<body>
<div class = "ui container">
    <div class = "ui one column grid">
        <div class = "row">
            <div class = "column">
                <div class = "ui huge blue centered header">Welcome to goPortlethen.org.uk</div>
            </div>
        </div>
        <div class = "row">
            <div class = "column">
                <img class="ui medium centered circular image" src="https://scontent.flhr4-1.fna.fbcdn.net/v/t1.0-9/13434842_1608517786105160_4523080997776743356_n.jpg?oh=4981b2761c2ef40c4989fc4b74bd440a&oe=58C6B38A">
            </div>
        </div>
        <div class = "row">
            <div class = "column">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eros est, feugiat sed ex ac, ultrices pretium elit.
                    Nunc vel varius lectus. Nullam placerat erat ipsum, non consectetur nisi aliquam id. Aliquam in libero leo. Nam et neque mi.
                    Sed vulputate blandit nisl quis feugiat. Morbi tempus commodo dui, et sagittis turpis porttitor vitae. Mauris pharetra id arcu ac efficitur.

                    Mauris id mauris sit amet erat faucibus luctus. Morbi auctor dictum fringilla.
                    Ut ullamcorper lorem nisi, scelerisque consequat neque volutpat vel. Duis eget ante nec felis varius interdum.
                    Duis viverra orci nibh, et tincidunt mauris rhoncus et. Aenean elementum faucibus gravida. Aenean sed consectetur lacus.
                    Nam imperdiet ultricies rhoncus.
                    Ut sed feugiat lacus. Duis ac nulla ac turpis facilisis sollicitudin ut sit amet odio.
                    Etiam vulputate ipsum nec pretium interdum. Nam vitae eros aliquet, aliquam nisl in, mollis nisl.
                    Ut tristique, justo ut hendrerit varius, urna ex luctus erat, eget varius nulla tellus a orci.
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed blandit nulla sit amet odio elementum efficitur.</p>
            </div>
        </div>
        <div class = "row">
            <div class = "column">
                <div class = "ui header">Need help? Click <a href = "help.php">here</a> for FAQs!</div>
            </div>
        </div>
    </div>
</div>
<div class="ui blue inverted footer segment" id = "footer">
    <div class="ui center aligned container">
        <div class="ui stackable inverted grid">
            <div class="three wide column">
                <h4 class="ui inverted header">Community</h4>
                <div class="ui inverted link list">
                    <a class="item" href="https://www.transifex.com/organization/semantic-org/" target="_blank">Help Translate</a>
                    <a class="item" href="https://github.com/Semantic-Org/Semantic-UI/issues" target="_blank">Submit an Issue</a>
                    <a class="item" href="https://gitter.im/Semantic-Org/Semantic-UI" target="_blank">Join our Chat</a>
                    <a class="item" href="/cla.html" target="_blank">CLA</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Network</h4>
                <div class="ui inverted link list">
                    <a class="item" href="https://github.com/Semantic-Org/Semantic-UI" target="_blank">GitHub Repo</a>
                    <a class="item" href="https://forums.semantic-ui.com" target="_blank">User Forums</a>
                    <a class="item" href="http://1.semantic-ui.com">1.x Docs</a>
                    <a class="item" href="http://legacy.semantic-ui.com">0.x Docs</a>
                </div>
            </div>
            <div class="seven wide right floated column">
                <h4 class="ui inverted header">Help Preserve This Project</h4>
                <p> Support for the continued development of Semantic UI comes directly from the community.</p>
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="7ZAF2Q8DBZAQL">
                    <button type="submit" class="ui large button">Donate Today</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>