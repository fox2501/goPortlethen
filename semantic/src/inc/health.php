<!-- Health and wellbeing landing page -->

<?php
session_start();
//connects to database server
include("includes/dbconnect.php");
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if (isset($_SESSION['loggedIn'])) {
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
    if ($accessID == '1' || $accessID == '4') {
        $canAccess = '1';
    } else {
        $canAccess = '0';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="semantic.css">
    <title>GoPortlethen</title>
</head>

<? include("includes/header.php"); ?>
<!--main body-->
<body>

<h1 align="center">Health & Wellbeing</h1>
<div class="ui horizontal section divider">
    <p>Keeping Portlethen Healthy</p>
</div>

<div class="ui stackable container">
    <?php
    if(strpos($url, 'restricted') !== false){
        echo"
        <div class = 'ui warning message'>
        <h3 class = 'ui header''>
        You can only edit content that you have submitted!
        </h3>
    </div>
    ";
    }
    if(strpos($url, 'newApprovalNeeded') !== false){
        echo"
        <div class = 'ui warning message'>
        <h3 class = 'ui header''>
        You have successfully submitted new content. This requires approval first.
        </h3>
    </div>
    ";
    }
    if(strpos($url, 'newContentSubmitted') !== false){
        echo"
        <div class = 'ui message'>
        <h3 class = 'ui header''>
        You have successfully created new health content.
        </h3>
    </div>
    ";
    }
    if(strpos($url, 'editedContent') !== false){
        echo"
        <div class = 'ui message'>
        <h3 class = 'ui header''>
        You have successfully edited the content.
        </h3>
    </div>
    ";
    }
    if(strpos($url, 'editApprovalNeeded') !== false){
        echo"
        <div class = 'ui warning message'>
        <h3 class = 'ui header''>
        You have successfully submitted content to be edited. This needs approval by a site admin.
        </h3>
    </div>
    ";
    }
    ?>

    <div class="ui two column stackable grid">
        <div class="ten wide column">
            <?php
            if ($canAccess == '1') {
                echo "<div class='row'>
                            <a href='healthForm.php'>
                                <button class='ui green submit button' style='margin-right:50px'>Submit Content</button>
                            </a>
                            </div>";
            }
            ?>

            <div class="row">
                <ul>
                    <?php
                    $sql_query = "
                                SELECT A.title, A.mainText, B.userName, A.datePosted, A.healthContentID, C.url
                                FROM healthcontent A, users B, photos C
                                WHERE 
                                A.userID=B.userID
                                AND A.healthContentID = C.healthContentID
                                AND A.approvalStatus = 1;";
                    $result = $db->query($sql_query);
                    while ($row = $result->fetch_array()) {
                        $title = $row['title'];
                        $mainText = $row['mainText'];
                        $userName = $row['userName'];
                        $datePosted = $row['datePosted'];
                        $healthContentID = $row['healthContentID'];
                        $photoURL = $row['url'];
                        if ($canAccess == '1') {
                            echo "
            <div class='ui raised segment'>
                <div class='ui stackable container'>
                    <div class='ui stackable grid'>
                        <div class='three wide column'>
                            <div class='ui medium image'><img src='$photoURL'></div>
                        </div>
                        <div class='four wide column'>
                            <h3 class='ui header' id='title'>$title</h3>
                            <h4 class='ui header' id='datePosted'>$datePosted</h4>
                        </div>
                        <div class='seven wide column'>
                            <p id='mainText' style='text - align:justify'>$mainText<br></p>
                            <p id='author'>By $userName<br></p>
                        </div>
                        <div class='two wide column'>
                            <form action='editHealthContent.php' class='ui form' method='post'>
                                <button class='ui right floated mini button' onclick='/semantic/src/inc/editHealthContent.php' type='submit'><input name='editHealth' type='hidden' value='$healthContentID'>Edit</button> 
                                
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='ui hidden section divider'></div>
        ";
                        } else {
                            echo "
            <div class='ui raised segment'>
                <div class='ui stackable container'>
                    <div class='ui stackable grid'>
                        <div class='four wide column'>
                            <div class='ui medium image'><img src='$photoURL'></div>
                        </div>
                        <div class='four wide column'>
                            <h3 class='ui header' id='title'>$title</h3>
                            <h4 class='ui header' id='datePosted'>$datePosted</h4>
                        </div>
                        <div class='eight wide column'>
                            <p id='mainText' style='text - align:justify'>$mainText<br></p>
                            <p id='author'>By $userName<br></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='ui hidden section divider'></div>
                                        ";
                        }
                    } ?>
                </ul>
            </div>
        </div>
        <div class="six wide column">
            <div data-tockify-component="mini" data-tockify-calendar="healthevents"></div>
            <script data-tockify-script="embed" src="https://public.tockify.com/browser/embed.js"></script>


            <?php
                if ($canAccess == '1' || $canAccess == '4') {

               echo "
                <button class=\"ui green submit button\" ><a href = \"https://tockify.com/tkf2/submitEvent/42648d506ec74f769ce92685c0fe921e\"
                                         target = \"_blank\" style = \"color: white\" > Submit an Event </a ></button >
            ";}
            ?>


            <div style="height:600px">
                <a class="twitter-timeline" data-height="500" href="https://twitter.com/BoringMilner">Tweets by James
                    Milner</a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

            </div>
        </div>
    </div>
</div>

</body>

<!-- Footer -->
<?php include("includes/footer.php"); ?>

</html>