<?php
session_start();
include ( "includes/dbconnect.php");
include("includes/header.php");
?>
<h1 align="center">Submit Map Content</h1>
<div class="ui horizontal section divider">
    Discover Portlethen
</div>
<div class="ui container">
    <form class="ui form" action="submitCreateMap.php" enctype="multipart/form-data" method="POST">
        <div class="field">
            <label>Title</label>
            <input type="text" name="title" placeholder="Enter the title of your route.">
        </div>
        <div class="field">
            <label>Type</label>
            <select class="ui select dropdown" name="mapType">
                <option value="view">Viewpoint</option>
                <option value="LOI">Location of Interest</option>
                <option value="hist">Historical Landmark</option>
            </select>
        </div>
        <div class="field">
            <label>Longitude</label>
            <input type="text" name="long" placeholder="Enter the location longitude.">
        </div>
        <div class="field">
            <label>Latitude</label>
            <input type="text" name="lat" placeholder="Enter the location latitude.">
        </div>
        <div class="field">
            <label>Description</label>
            <textarea rows="8" type="text" name="mapDesc" placeholder="Enter a description."></textarea>
        </div>
        <button class="ui fluid large green submit button" id="createMapContent" type="submit">Submit Content</button>
    </form>
</div>