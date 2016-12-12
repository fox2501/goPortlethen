<?php
session_start();
include("includes/PDOConnect.php");

$clubCategory = $_POST['clubCategory'];

$sql = "SELECT * FROM clubs WHERE clubCaterogy = ?";


header ("Location: /semantic/src/inc/clubLandingPageSearched.php");
?>