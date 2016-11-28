<!-- Database -->
<? include ("includes/dbconnect.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "semantic.css">
    <title>Semantic UI</title>
</head>

<!-- Nav bar -->
<?include ("includes/header.php"); ?>

<body>
    <!-- Page header -->
    <h1 align="center">Health & Wellbeing</h1>
    <div class="ui horizontal section divider">
        <p>Keeping Portlethen Healthy</p>
    </div>

    <!-- Submit content button -->
    <!-- Takes user to SubmitHealth.php -->
    <!-- Only visible to admin/contributor -->
    <!-- When ordinary user on site, hide this div -->
    <div class="ui container">
        <div class="ui grid">
            <div class="row">
                <a href="healthForm.php"><button class="ui primary button">Submit Content</button></a>
                <a href=""><button class="ui primary button">Event Calendar</button></a>
                <a href=""><button class="ui primary button">Twitter</button></a>
            </div>
        </div>
        <div class="ui divider"></div>
    </div>



    <div class=" ui container">
        <div class="ui grid">
            <div class="row">
                <!-- Info section -->
                <!-- Sections added as users add info through form -->
                <div>

                    <!-- Blank area to input info through form -->
                    <div>
                        <div class="ui grid">
                            <div class="row">
                                <ul>
                                    <?php
                                    $sql_query = "SELECT * FROM healthContent";
                                    $result = $db->query($sql_query);
                                    while($row = $result-> fetch_array()) {
                                        $title = $row['title'];
                                        $mainText = $row['mainText'];
                                        echo "<div>
                                            <div class=\"four wide column\">
                                                <h3 class=\"ui header\" id=\"title\">
                                                    $title
                                                </h3>
                                                <img class=\"ui small image\" src=\"https://scontent.flhr4-1.fna.fbcdn.net/v/t1.0-9/13434842_1608517786105160_4523080997776743356_n.jpg?oh=4981b2761c2ef40c4989fc4b74bd440a&oe=58C6B38A\" id=\"image\"></img>
                                                <br>
                                            </div>
                                        </div>";

                                        echo "<div>
                                            <div class=\"ten wide column\">
                                                <button class=\"mini ui button\" style=\"float:right; margin-left:20px\">Edit</button>
                                                <p id=\"mainText\" style=\"text-align:justify\">
                                                    $mainText
                                                </p>
                                                <p id=\"author\"><!-- Automatically add username of author --></p>
                                                <p id=\"date\"><!-- Automatically add date of post --></p>
                                                <div class=\"ui divider\"></div>
                                            </div>
                                        </div>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>



                <!-- Calendar and Twitter section -->
                <div class="two wide column">
                    <iframe src="https://calendar.google.com/calendar/embed?src=imdvs1dbg4fm5e9g35o2cj8i2g%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="400" height="300" frameborder="0" scrolling="no"></iframe>
                    <br><br><br>
                    <!-- Placeholder for Twitter section -->
                    <iframe src="https://calendar.google.com/calendar/embed?src=imdvs1dbg4fm5e9g35o2cj8i2g%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="400" height="300" frameborder="0" scrolling="no"></iframe>
                </div>

            </div>
        </div>
    </div>

</body>

<!-- Footer -->
<?php include("includes/footer.php"); ?>

</html>