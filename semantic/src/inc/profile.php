<?php
session_start();
if (isset($_SESSION['loggedIn'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/goportlethen/semantic/dist/semantic.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.js"></script>
        <title>goPortlethen</title>
    </head>
    <?php
    include("includes/header.php");
    ?>
    <body>
    <div class="ui container">
        <h2 class="ui blue header">
            <div class="content">
                Ross' Profile
            </div>
        </h2>
        <div class="ui three column grid">
            <div class="row">
                <div class="column">
                    <div class="ui card">
                        <div class="image">
                            <img src="http://www.rantlifestyle.com/wp-content/uploads/2014/04/Brick-Tamland1.jpg">
                        </div>
                        <div class="content">
                            <a class="header">Ross</a>
                            <div class="meta">
                                <span class="date">Joined in 2016</span>
                            </div>
                            <div class="description">
                                Ross is so cool
                            </div>
                        </div>
                        <div class="extra content">
                            <a>
                                <i class="user icon"></i>
                                100000000000 Friends
                            </a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui one column grid">
                        <div class="column">
                            <div class="row">
                                <div class="ui header">Name: Ross Henderson</div>
                            </div>
                            <div class="row">
                                <div class="ui header">Age: 22</div>
                            </div>
                            <div class="row">
                                <div class="ui header">Location: Aberdeen</div>
                            </div>
                            <div class="row">
                                <div class="ui header">Interests: Modern Warfare Remastered, Sesh.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="ui fixed bottom sticky" style="width: 100%;">
        <div class="ui blue inverted footer segment">
            <div class="ui center aligned container">
                <div class="ui stackable inverted grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">Community</h4>
                        <div class="ui inverted link list">
                            <a class="item" href="https://www.transifex.com/organization/semantic-org/" target="_blank">Help
                                Translate</a>
                            <a class="item" href="https://github.com/Semantic-Org/Semantic-UI/issues" target="_blank">Submit
                                an Issue</a>
                            <a class="item" href="https://gitter.im/Semantic-Org/Semantic-UI" target="_blank">Join our
                                Chat</a>
                            <a class="item" href="/cla.html" target="_blank">CLA</a>
                        </div>
                    </div>
                    <div class="three wide column">
                        <h4 class="ui inverted header">Network</h4>
                        <div class="ui inverted link list">
                            <a class="item" href="https://github.com/Semantic-Org/Semantic-UI" target="_blank">GitHub
                                Repo</a>
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
    </div>
    </body>
    </html>
    <?php
} else{
    header("/semantic/");
}
?>

