<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "semantic.css">
    <title>Semantic UI</title>
</head>
<?include ("includes/header.php"); ?>

<body>
    <!-- Page header -->
    <h1 align="center">Health & Wellbeing</h1>

    <!-- Button for admin/contributors
         Only appears if they are logged in -->
    <button class="ui primary button">
        Submit Content
    </button>
    <br><br><br>

    <div class="ui container">
        <div class="ui grid">
            <div class="row">
                <div class="four wide column">
                    <h3 class="ui header">Section One</h3>
                    <button class="mini ui button">
                        Edit
                    </button>
                    <div class="ui segment">
                        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>-->
                        <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                    </div>
                </div>
            </div>
        </div>
           Div to hold a section of information
                 Div's appear individually as and when contributors add information
            <div>
                <h3 class="ui header">Section One</h3>
                Button for admin/contributors
                     Only appears if they are logged in
                <button class="mini ui button">
                    Edit
                </button>
                <div class="ui segment">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>-->
                    <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                </div>
                <div class="ui section divider"></div>
            </div>
        </div>

        <div class="four wide column">
            <iframe src="https://calendar.google.com/calendar/embed?src=imdvs1dbg4fm5e9g35o2cj8i2g%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="400" height="300" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>
</body>
</html>
