<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.css">
    <title>Create Club Page</title>
</head>
<?include ("includes/header.php"); ?>
<body>

<h1 align="center">Club Create Page</h1>
<div class="ui horizontal section divider">
    Inspire your local community
</div>

<form class="ui form">
    <div class="field">
        <label>Club Name</label>
        <input type="text" name="first-name" placeholder="First Name">
    </div>
    <div class="field">
        <label>Description</label>
        <input type="text" name="last-name" placeholder="Last Name">
    </div>
    <div class="field">
        <div class="ui checkbox">
            <input type="checkbox" tabindex="0" class="hidden">
            <label>I agree to the Terms and Conditions</label>
        </div>
    </div>
    <button class="ui button" type="submit">Submit</button>
</form>

</body>
<?
include("includes/footer.php");
?>
</html>