<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "semantic.css">
    <title>Semantic UI</title>
</head>

<!-- Database -->
<?include ("/includes/dbconnect.php");

$title = $_POST["title"];

$sql = "INSERT INTO healthContent (title) VALUES ('$title')";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error: " . $sql . "<br"> . mysqli_error($db);
}

header("location:health.php");
?>

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
                <a href="submithealth.php"><button class="ui primary button">Submit Content</button></a>
            </div>
        </div>
        <div class="ui divider"></div>
    </div>

    <div class=" ui container">
        <div class="ui grid">
            <div class="row">
                <!-- Info section -->
                <!-- Sections added as users add info through form -->
                <div class="ten wide column">

                    <!-- Blank area to input info through form -->
                    <div class="infoInput">
                        <div class="ui grid">
                            <div class="row">
                                <div class="four wide column">
                                    <h3 class="ui header" id="title">
                                        <?php
                                        $sql_query = "SELECT title FROM healthContent";
                                        $result = $db->query($sql_query);
                                        while($row = $result->fetch_array()) {
                                            $title = $row['title'];
                                            echo "{$title}";
                                        }
                                        ?>
                                    </h3>
                                    <img class="ui medium rounded image" src="" id="image">
                                        <?php
                                        $image = $_POST["image"];
                                        echo "{$image}";
                                        ?>
                                    </img>
                                </div>
                                <div class="ten wide column">
                                    <button class="mini ui button" style="float:right; margin-left:20px">Edit</button>
                                    <p id="content">
                                        <?php
                                        $content = $_POST["content"];
                                        echo "{$content}";
                                        ?>
                                    </p>
                                    <p id="author"><!-- Automatically add username of author --></p>
                                    <p id="date"><!-- Automatically add date of post --></p>
                                    <div class="ui divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- These are placeholders -->

                    <!-- Section 1 -->
                    <div class="ui grid">
                        <div class="row">
                            <div class="four wide column">
                                <h3 class="ui header">Section One</h3>
                                <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                            </div>
                            <div class="ten wide column">
                                <!-- Edit button -->
                                <!-- Takes user to SubmitHealth.php -->
                                <!-- Only visible to admin/contributor -->
                                <!-- When ordinary user on site, block this div -->
                                <button class="mini ui button" style="float:right; margin-left:20px">Edit</button>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <p>Author goes here</p>
                                <p>Date goes here</p>
                                <div class="ui divider"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2 -->
                    <div class="ui grid">
                        <div class="row">
                            <div class="four wide column">
                                <h3 class="ui header">Section Two</h3>
                                <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                            </div>
                            <div class="ten wide column">
                                <!-- Edit button -->
                                <!-- Takes user to SubmitHealth.php -->
                                <!-- Only visible to admin/contributor -->
                                <!-- When ordinary user on site, block this div -->
                                <button class="mini ui button" style="float:right; margin-left:20px">Edit</button>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <p>Author goes here</p>
                                <p>Date goes here</p>
                                <div class="ui divider"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3 -->
                    <div class="ui grid">
                        <div class="row">
                            <div class="four wide column">
                                <h3 class="ui header">Section Three</h3>
                                <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                            </div>
                            <div class="ten wide column">
                                <!-- Edit button -->
                                <!-- Takes user to SubmitHealth.php -->
                                <!-- Only visible to admin/contributor -->
                                <!-- When ordinary user on site, block this div -->
                                <button class="mini ui button" style="float:right; margin-left:20px">Edit</button>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <p>Author goes here</p>
                                <p>Date goes here</p>
                                <div class="ui divider"></div>
                            </div>
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
