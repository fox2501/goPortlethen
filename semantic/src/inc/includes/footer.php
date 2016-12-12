<?
//session begins
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>goPortlethen</title>
</head>

<body>
    <div class="ui blue inverted footer segment" id = "footer"
    style="position:absolute; width:100%; height:150px">

        <div class="ui center aligned container">
            <div class="ui stackable inverted grid">
                <div class="three wide column">
                    <!--navigation pane for site links-->
                    <h4 class="ui inverted header">Navigation</h4>
                    <div class="ui inverted link list">
                        <a class="item" href="/semantic/src/inc/health.php" target="_blank">Health & Wellbeing</a>
                        <a class="item" href="/semantic/src/inc/clubLandingPage.php" target="_blank">Clubs</a>
                        <a class="item" href="/semantic/src/inc/mapLandingPage.php" target="_blank">Maps</a>
                    </div>
                </div>
                <div class="three wide column">
                    <div class="ui inverted link list">
                        <a class="item"> </a>
                        <a class="item"> </a>
                        <a class="item"> </a>
                        <a class="item"> </a>
                        <a class="item" href="/semantic/src/inc/help.php" target="_blank">Help</a>
                        <a class="item" href="#" target="_blank">Terms & Conditions</a>
                    </div>
                </div>
                <!--cookies and terms links-->
                <div class="eight wide column">
                    <h4 class="ui inverted header">This website uses cookies... blah blah</h4>
                    <h4 class="ui inverted header"> </h4>
                    <h4 class="ui inverted header">Copyright © 2016 GoPortlethen</h4>

                </div>


            </div>
        </div>
    </div>
</body>
</html>

<script>
    x = $('#div-that-increase-height').height()+20; // +20 gives space between div and footer
    y = $(window).height();

    if (x+100<=y){ // 100 is the height of your footer
        $('#footer').css('top', y-100+'px');// again 100 is the height of your footer
        $('#footer').css('display', 'block');
    }else{
        $('#footer').css('top', x+'px');
        $('#footer').css('display', 'block');
    }
</script>