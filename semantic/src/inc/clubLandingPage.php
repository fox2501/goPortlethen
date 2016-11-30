<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>Club Landing Page</title>
</head>
<? include("includes/header.php"); ?>
<body>

<h1 align="center">Club Landing Page</h1>
<div class="ui horizontal section divider">
    Become more involved
</div>

<div class="ui container">
    <div class="ui grid">
        <div class="row">
        </div>
        <div class="row">
            <div class="four wide column">
                <button class="ui button"><a href="/semantic/src/inc/CreateClubPage.php">Create Club</a></button>
            </div>
            <div class="eight wide column">
                <div class="ui form">
                    <div class="inline fields">
                        <label>Filter clubs by: </label>
                        <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="Club" checked="" tabindex="0" class="hidden" id="A-Z">
                                <label for="A-Z">Name A-Z</label>
                            </div>
                        </div>
                        <div class="ui radio checkbox">
                            <input type="radio" name="Club" tabindex="0" class="hidden" id="fee">
                            <label for="fee">Fee does apply</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="four wide column">
                <div class="ui fluid category search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search clubs...">
                        <i class="search icon"></i>
                    </div>
                    <div class="results"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="ui grid">
    <div class="three wide column"></div>
    <div class="column">
        <img src="C:\Users\Cameron Lawrie\PhpstormProjects\goPortlethen\semantic\src\placeholder.png" alt="Placeholder"
             style="width:300px;height:300px;">
    </div>
    <div class="column"></div>
    <p>Your route following the infant river wanders through pastures and small Cotswold villages characterised by
        creamy stonework buildings with stone slate roofs. These are ideal places to enjoy a break as most villages have
        excellent local pubs. You'll also pass through the Cotswold Water Park that has 140 lakes created mostly from
        gravel extraction. Some lakes are managed solely for wildlife and therefore this is a great place for bird
        watching.</p>
    <div class="column">

    </div>
</div>-->
<!--<div class="ui container">
<div class="ui celled list">
    <div class="item">
        <div class="four wide column">
        <img class="ui medium bordered image"
             src="http://cache.images.core.optasports.com/soccer/teams/150x150/1900.png">
        </div>
        <div class="eight wide column">
        <div class="content">
            <div class="header">Hearts FC</div>
            Heart of Midlothian Football Club, commonly known as Hearts, is a Scottish professional football club based
            in Gorgie in the west of Edinburgh. It is currently the only Scottish Premiership club in the city, with
            Edinburgh derby rivals Hibernian playing in the Scottish Championship and Edinburgh City playing in Scottish
            League Two. Hearts is the oldest football club in the Scottish capital,[4] having been formed in 1874 by a
            group of friends from the Heart of Midlothian Quadrille Assembly Club (Dancing). The modern club crest is
            based on the Heart of Midlothian mosaic on the city's Royal Mile and the team's colours are predominantly
            maroon and white.[5] Hearts play at Tynecastle Stadium, where home matches have been played since 1886.[6]
            After renovating the ground into an all-seater stadium following the findings of the Taylor Report in 1990,
            the all-seated stadium originally had a capacity of 18,008, but over the years this has been reduced to
            roughly 17,000 to comply with UEFA regulations.
        </div>
        </div>
            <div class="four wide column">
                <button class="ui button">For more info click here!</button>
            </div>
        </div>
    </div>
    <div class="item">
        <img class="ui medium bordered image"
             src="http://cache.images.core.optasports.com/soccer/teams/150x150/676.png">
        <div class="content">
            <div class="header">Manchester City</div>
            Manchester City Football Club is a football club in Manchester, England. Founded in 1880 as St. Mark's (West
            Gorton), they became Ardwick Association Football Club in 1887 and Manchester City in 1894. The club moved
            to the City of Manchester Stadium in 2003, having played at Maine Road since 1923.

            The club's most successful period was in the late 1960s and early 1970s when they won the League
            Championship, FA Cup, League Cup and European Cup Winners' Cup under the management team of Joe Mercer and
            Malcolm Allison. After losing the 1981 FA Cup Final, the club went through a period of decline, culminating
            in relegation to the third tier of English football for the only time in their history in 1998. Having
            regained their Premier League status in the early 2000s, the club was purchased in 2008 by Abu Dhabi United
            Group and has become one of the wealthiest in the world. Since 2011 the club have won six major honours,
            including the Premier League in 2012 and 2014.
        </div>
    </div>
    <div class="item">
        <img class="ui medium bordered image"
             src="http://secure.cache.images.core.optasports.com/soccer/teams/150x150/961.png">
        <div class="content">
            <div class="header">bayern munich</div>
            Fußball-Club Bayern München e.V., commonly known as FC Bayern München (German pronunciation: [ʔɛf tseː
            ˈbaɪɐn ˈmʏnçn̩]), FCB, Bayern Munich, or FC Bayern, is a German sports club based in Munich, Bavaria,
            Germany. It is best known for its professional football team, which plays in the Bundesliga, the top tier of
            the German football league system, and is the most successful club in German football history, having won a
            record 26 national titles and 18 national cups.[3]
        </div>
    </div>
</div>
</div>-->


<!--<div class="row">
    <div class="four wide column">
        <img class="ui centered small image"
             src="http://cache.images.core.optasports.com/soccer/teams/150x150/1900.png">
    </div>
    <div class="eight wide column">
        <p>Heart of Midlothian Football Club, commonly known as Hearts, is a Scottish professional football club
            based
            in Gorgie in the west of Edinburgh. It is currently the only Scottish Premiership club in the city,
            with
            Edinburgh derby rivals Hibernian playing in the Scottish Championship and Edinburgh City playing in
            Scottish
            League Two. Hearts is the oldest football club in the Scottish capital,[4] having been formed in
            1874 by a
            group of friends from the Heart of Midlothian Quadrille Assembly Club (Dancing). The modern club
            crest is
            based on the Heart of Midlothian mosaic on the city's Royal Mile and the team's colours are
            predominantly
            maroon and white.[5] Hearts play at Tynecastle Stadium, where home matches have been played since
            1886.[6]
            After renovating the ground into an all-seater stadium following the findings of the Taylor Report
            in 1990,
            the all-seated stadium originally had a capacity of 18,008, but over the years this has been reduced
            to
            roughly 17,000 to comply with UEFA regulations.</p>
    </div>
    <div class="four wide column">
        <button class="large ui button"><a href="/semantic/src/inc/clubPage.php">For more info click here!</a></button>
    </div>
</div>
<div class="row">
    <div class="four wide column">
        <img class="ui centered small image"
             src="http://cache.images.core.optasports.com/soccer/teams/150x150/676.png">
    </div>
    <div class="eight wide column">
        <p>Manchester City Football Club is a football club in Manchester, England. Founded in 1880 as St.
            Mark's (West
            Gorton), they became Ardwick Association Football Club in 1887 and Manchester City in 1894. The club
            moved
            to the City of Manchester Stadium in 2003, having played at Maine Road since 1923.

            The club's most successful period was in the late 1960s and early 1970s when they won the League
            Championship, FA Cup, League Cup and European Cup Winners' Cup under the management team of Joe
            Mercer and
            Malcolm Allison. After losing the 1981 FA Cup Final, the club went through a period of decline,
            culminating
            in relegation to the third tier of English football for the only time in their history in 1998.
            Having
            regained their Premier League status in the early 2000s, the club was purchased in 2008 by Abu Dhabi
            United
            Group and has become one of the wealthiest in the world. Since 2011 the club have won six major
            honours,
            including the Premier League in 2012 and 2014.</p>
    </div>
    <div class="four wide column">
        <button class="large ui button"><a href="/semantic/src/inc/clubPage.php">For more info click here!</a></button>
    </div>
</div>
<div class="row">
    <div class="four wide column">
        <img class="ui centered small image"
             src="http://secure.cache.images.core.optasports.com/soccer/teams/150x150/961.png">
    </div>
    <div class="eight wide column">
        <p>Fußball-Club Bayern München e.V., commonly known as FC Bayern München (German pronunciation: [ʔɛf
            tseː
            ˈbaɪɐn ˈmʏnçn̩]), FCB, Bayern Munich, or FC Bayern, is a German sports club based in Munich,
            Bavaria,
            Germany. It is best known for its professional football team, which plays in the Bundesliga, the top
            tier of
            the German football league system, and is the most successful club in German football history,
            having won a
            record 26 national titles and 18 national cups.</p>
    </div>
    <div class="four wide column">
        <button class="large ui button"><a href="/semantic/src/inc/clubPage.php">For more info click here!</a></button>
    </div>
</div>
<div class="row">
</div>
</div>-->

<div class="ui container">
    <div class="ui grid">
        <div class="row">
        </div>
        <div class="ui divided items">
            <div class="item">
                <div class="ui small image">
                    <img src="http://secure.cache.images.core.optasports.com/soccer/teams/150x150/961.png">
                </div>
                <div class="middle aligned content">
                    <div class="header">
                        Bayern Munchen
                    </div>
                    <div class="description">
                        <p>Fußball-Club Bayern München e.V., commonly known as FC Bayern München (German pronunciation:
                            [ʔɛf tseː
                            ˈbaɪɐn ˈmʏnçn̩]), FCB, Bayern Munich, or FC Bayern, is a German sports club based in Munich,
                            Bavaria,
                            Germany. It is best known for its professional football team, which plays in the Bundesliga,
                            the top tier of
                            the German football league system, and is the most successful club in German football
                            history, having won a
                            record 26 national titles and 18 national cups.</p>
                    </div>
                    <div class="extra">
                        <div class="ui right floated button">
                            <a href="/semantic/src/inc/clubPage.php">For more info click here!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ui small image">
                    <img src="http://cache.images.core.optasports.com/soccer/teams/150x150/1900.png">
                </div>
                <div class="middle aligned content">
                    <div class="header">
                        Heart Of Midloathian FC
                    </div>
                    <div class="description">
                        <p>Heart of Midlothian Football Club, commonly known as Hearts, is a Scottish professional
                            football club based
                            in Gorgie in the west of Edinburgh. It is currently the only Scottish Premiership club in
                            the city, with
                            Edinburgh derby rivals Hibernian playing in the Scottish Championship and Edinburgh City
                            playing in Scottish
                            League Two. Hearts is the oldest football club in the Scottish capital,[4] having been
                            formed in 1874 by a
                            group of friends from the Heart of Midlothian Quadrille Assembly Club (Dancing). The modern
                            club crest is
                            based on the Heart of Midlothian mosaic on the city's Royal Mile and the team's colours are
                            predominantly
                            maroon and white.[5] Hearts play at Tynecastle Stadium, where home matches have been played
                            since 1886.[6]
                            After renovating the ground into an all-seater stadium following the findings of the Taylor
                            Report in 1990,
                            the all-seated stadium originally had a capacity of 18,008, but over the years this has been
                            reduced to
                            roughly 17,000 to comply with UEFA regulations.</p>
                    </div>
                    <div class="extra">
                        <div class="ui right floated button">
                            <a href="/semantic/src/inc/clubPage.php">For more info click here!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ui small image">
                    <img src="http://cache.images.core.optasports.com/soccer/teams/150x150/676.png">
                </div>
                <div class="middle aligned content">
                    <div class="header">
                        Manchester City FC
                    </div>
                    <div class="description">
                        <p>Manchester City Football Club is a football club in Manchester, England. Founded in 1880 as
                            St. Mark's (West
                            Gorton), they became Ardwick Association Football Club in 1887 and Manchester City in 1894.
                            The club moved
                            to the City of Manchester Stadium in 2003, having played at Maine Road since 1923.

                            The club's most successful period was in the late 1960s and early 1970s when they won the
                            League
                            Championship, FA Cup, League Cup and European Cup Winners' Cup under the management team of
                            Joe Mercer and
                            Malcolm Allison. After losing the 1981 FA Cup Final, the club went through a period of
                            decline, culminating
                            in relegation to the third tier of English football for the only time in their history in
                            1998. Having
                            regained their Premier League status in the early 2000s, the club was purchased in 2008 by
                            Abu Dhabi United
                            Group and has become one of the wealthiest in the world. Since 2011 the club have won six
                            major honours,
                            including the Premier League in 2012 and 2014.</p>
                    </div>
                    <div class="extra">
                        <div class="ui right floated button">
                            <a href="/semantic/src/inc/clubPage.php">For more info click here!</a>
                        </div>
                    </div>
                    <div class="ui hidden divider"></div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("includes/footer.php"); ?>
</html>