<?php
session_start();
include("includes/PDOConnect.php");

$sql = "SELECT * from Clubs where clubCategory =?";


header ("Location: /semantic/src/inc/clubLandingPageSearched.php");
?>