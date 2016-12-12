<?php
session_start();
//connects to database server
include("includes/dbconnect.php");

$clubCategory = $_POST["search"];

$sql = "SELECT * FROM clubs WHERE search = clubs.clubCategory";

header("Location: /semantic/src/inc/clubLandingPageSearched.php");
?>