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

    <div class="ui container">
        <div class="ui grid">
            <div class="row">
                <div class="three wide column">
                    <!-- Submit content button -->
                    <!-- Takes user to SubmitHealth.php -->
                    <!-- Only visible to admin/contributor -->
                    <!-- When ordinary user on site, disable this button -->
                    <a href="submithealth.php"><button class="ui primary button">Submit Content</button></a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    <div class=" ui container">
        <div class="ui grid">
            <div class="row">
                <div style="overflow: scroll; height:500px">
                    <div class="ui grid">
                        <div class="row">
                            <div class="four wide column">
                                <h3 class="ui header">Section One</h3>
                                <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                            </div>
                            <div class="six wide column">
                                <!-- Lets user edit title, information and pictures, or delete the whole thing, of already existing health information -->
                                <!-- Only visible to admin/contributor -->
                                <!-- When ordinary user is logged in, disable this button -->
                                <!-- Links to form page that was originally used, but original details are there to be changed -->
                                <button class="mini ui button" style="float:right; margin-left:20px">Edit</button>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                <div class="ui divider"></div>
                            </div>
                        </div>
                    </div>

                        <div class="ui grid">
                            <div class="row">
                                <div class="four wide column">
                                    <h3 class="ui header">Section Two</h3>
                                    <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                                </div>
                                <div class="six wide column">
                                    <!-- Lets user edit title, information and pictures, or delete the whole thing, of already existing health information -->
                                    <!-- Only visible to admin/contributor -->
                                    <!-- When ordinary user is logged in, disable this button -->
                                    <!-- Links to form page that was originally used, but original details are there to be changed -->
                                    <button class="mini ui button" style="float:right; margin-left:20px">Edit</button>
                                    <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                    <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                    <div class="ui divider"></div>
                                </div>
                            </div>
                        </div>
                        <div class="ui grid">
                            <div class="row">
                                <div class="four wide column">
                                    <h3 class="ui header">Section Three</h3>
                                    <img class="ui medium rounded image" src="/images/wireframe/square-image.png">
                                </div>
                                <div class="six wide column">
                                    <!-- Lets user edit title, information and pictures, or delete the whole thing, of already existing health information -->
                                    <!-- Only visible to admin/contributor -->
                                    <!-- When ordinary user is logged in, disable this button -->
                                    <!-- Links to form page that was originally used, but original details are there to be changed -->
                                    <button class="mini ui button" style="float:right; margin-left:20px">Edit</button>
                                    <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                    <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor ante eu faucibus efficitur. Suspendisse potenti. Fusce lobortis massa arcu, eget vestibulum sem sagittis sed. Aliquam nec quam tristique, pulvinar mauris ac, euismod ipsum. Nullam magna ipsum, auctor eget justo a, interdum condimentum tellus. Mauris auctor, massa id pulvinar laoreet, nibh elit fringilla nulla, sed commodo enim velit in massa. Aenean non volutpat orci. Phasellus nunc velit, semper at efficitur ut, finibus vel tellus. Proin egestas quis neque non elementum. Pellentesque eros nulla, venenatis non rhoncus id, blandit eget elit. Duis ornare cursus pretium.</p>
                                    <div class="ui divider"></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <iframe src="https://calendar.google.com/calendar/embed?src=imdvs1dbg4fm5e9g35o2cj8i2g%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="400" height="300" frameborder="0" scrolling="no"></iframe>

            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php include("includes/footer.php"); ?>
</body>
</html>
