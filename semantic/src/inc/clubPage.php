<?php
session_start();
include("includes/dbconnect.php");
$clubID = $_POST['viewClub'];
echo "I am testing to see if this works $clubID";
if(!(isset($_POST['viewClub']))){
    echo "no club";
}
$sql = "SELECT * FROM club WHERE clubID = '$clubID'";
$result = $db->query($sql);
while ($row = $result->fetch_array()) {
        $clubName = $row['clubName'];
        $category = $row['clubCategory'];
        $clubDesc = $row['clubDescription'];
        $contactNum = $row['contactNumber'];
}
?>
<head>
     <meta charset="UTF-8">
     <title>Club Page</title>
</head>
<? include("includes/header.php"); ?>
<?php
    echo "
<body>
<div class='ui container''>
    <h2 class='ui blue header'>
        <div class='content'>
            <p>$clubName Club Profile Page</p>
        </div>
    </h2>
    <div class='ui three column grid'>
        <div class='row'>
            <div class='column'>
                <div class='ui card'>
                    <div class='image'>
                        <img
                            src='https://upload.wikimedia.org/wikipedia/en/thumb/e/eb/Manchester_City_FC_badge.svg/1024px-Manchester_City_FC_badge.svg.png'>
                    </div>
                    <div class='content'>
                        <a class='header'>$clubName</a>
                        <div class='meta'>
                            <span class='date'>Joined in 2016</span>
                        </div>
                        <div class='description'>
                            Best EPL team
                        </div>
                    </div>
                </div>
            </div>
            <div class='ui segment'>
                <h5 class='ui top attached header'>
                    Club Category:
                </h5>
                <div class='ui attached segment'>
                    <p>$category</p>
                </div>
                <h5 class='ui attached header'>
                    Club Description:
                </h5>
                <div class='ui attached segment'>
                    <p>Manchester, England. Founded in 1880 as St. Mark's (West
                        Gorton), they became Ardwick Association Football Club in 1887 and Manchester City in
                        1894. The club moved
                        to the City of Manchester Stadium in 2003, having played at Maine Road since 1923.

                        The club's most successful period was in the late 1960s and early 1970s when they won
                        the League
                        Championship, FA Cup, League Cup and European Cup Winners' Cup under the management team
                        of Joe Mercer and
                        Malcolm Allison. After losing the 1981 FA Cup Final, the club went through a period of
                        decline, culminating
                        in relegation to the third tier of English football for the only time in their history
                        in 1998. Having
                        regained their Premier League status in the early 2000s, the club was purchased in 2008
                        by Abu Dhabi United
                        Group and has become one of the wealthiest in the world. Since 2011 the club have won
                        six major honours,
                        including the Premier League in 2012 and 2014.</p>
                </div>
                <h5 class='ui attached header'>
                    Location:
                </h5>
                <div class='ui attached segment'>
                    <p>Manchester</p>
                </div>
                <h5 class='ui attached header'>
                    Contact Number:
                </h5>
                <div class='ui attached segment'>
                    <p>$contactNum</p>
                </div>
                <h5 class='ui attached header'>
                    Monthly Fee:
                </h5>
                <div class='ui bottom attached segment'>
                    <p>£1,000,000,000</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>";
include("includes/footer.php");
?>