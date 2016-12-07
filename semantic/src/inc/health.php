<?php
session_start();
include ( "includes/dbconnect.php");

if(isset($_SESSION['loggedIn'])){
    $userID = $_SESSION['loggedIn'];
    $canAccess = '0';
    $sql = "SELECT userName from users WHERE userID = '$userID'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $userName = $row["userName"];

    $sql = "SELECT accessID from useraccess where userName = '$userName'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $accessID = $row["accessID"];
    if($accessID == '1' || $accessID == '4'){
        $canAccess = '1';
    } else{
        $canAccess = '0';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <title>Semantic UI</title>
</head>

<!-- Nav bar -->
<?include ( "includes/header.php"); ?>

<body>
<!-- Page header -->
<h1 align="center">Health & Wellbeing</h1>
<div class="ui horizontal section divider">
    <p>Keeping Portlethen Healthy</p>
</div>

<!-- Submit content button -->
<!-- Takes user to SubmitHealth.php -->
<!-- Only visible to admin/contributor -->
<!-- When ordinary user on site/not logged in, hide this div -->
<div class="ui container">
    <div class="ui two column grid">
        <div class="ten wide column">
            <?php
            if($canAccess == '1'){
                echo "<div class='row'>
                <a href='healthForm.php'>
                    <button class='ui green submit button' style='margin-right:50px'>Submit Content</button>
                </a>
            </div>";
            }
            ?>

            <!-- Info section -->
            <!-- Sections added as users add info through form -->
            <!-- Blank area to input info through form -->
            <div class="row">
                <ul>
                    <?php $sql_query="
SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, C.url  
FROM healthcontent A, users B, photos C 
WHERE A.userID=B.userID, 
A.healthContentID = C.healthContentID;";
                    $result=$db->query($sql_query);
                    while($row = $result-> fetch_array()){
                        $title = $row['title'];
                        $mainText = $row['mainText'];
                        $userName = $row['userName'];
                        $datePosted = $row['datePosted'];
                        $healthContentID = $row['healthContentID'];
                        $photoURL = $row['url'];
                        $result = $db->query($sql);
                        if($canAccess == '1'){
                            echo "
                                <div class='four wide column'>
                                    <div class = 'ui raised segment'>
                                    <form class = 'ui form' method = 'POST' action = 'editHealthContent.php'>
                                        <button class = 'ui right floated mini button' onclick = '/semantic/src/inc/editHealthContent.php' type = 'submit'>
                                            <input type = 'hidden' name = 'editHealth' value = $healthContentID>
                                            Edit
                                        </button>
                                    </form>
                                    <h3 class='ui header' id='title'>
                                                $title
                                    </h3>
                                    <p id='datePosted'>$datePosted
                                        <br>
                                    </p>
                                    <img class='ui small image' src=$photoURL id='image'></img>
                                    <br >
                                    <p id = 'mainText'style = 'text - align:justify' > $mainText
                                        <br >
                                    </p >
                                    <p id = 'author' > By $userName
                                    <br>
                                    </p >
                                    </div>
                                    <div class='ui hidden section divider'></div>
                                </div>";
                        } else {
                            echo "
                            <div>
                                <div class=\"four wide column\">
                                    <h3 class=\"ui header\" id=\"title\">
                                                $title
                                            </h3>
                                    <p id=\"datePosted\">$datePosted
                                        <br>
                                    </p>

                                    <img class=\"ui small image\" src=\"https://scontent.flhr4-1.fna.fbcdn.net/v/t1.0-9/13434842_1608517786105160_4523080997776743356_n.jpg?oh=4981b2761c2ef40c4989fc4b74bd440a&oe=58C6B38A\" id=\"image\"></img>
                                    <br>
                                    <p id=\"mainText\"style=\"text - align:justify\">$mainText
                                        <br>
                                    </p>
                                    <p id=\"author\">By $userName;
                                        <br>
                                    </p>
                                    
                                    <div class=\"ui divider\"></div>
                                </div>
                            </div>";
                        }
                        } ?>
                </ul>
            </div>
        </div>
        <div class="six wide column">
            <iframe style="margin-right:50px" src="https://calendar.google.com/calendar/embed?src=imdvs1dbg4fm5e9g35o2cj8i2g%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="400" height="300" frameborder="0" scrolling="yes"></iframe>
            <div style="height:600px">
                <a class="twitter-timeline" data-height="500" href="https://twitter.com/BoringMilner">Tweets by James Milner</a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div>
</div>

</body>

<!-- Footer -->
<?php include( "includes/footer.php"); ?>

</html>