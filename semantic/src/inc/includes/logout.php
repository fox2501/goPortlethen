<?php
//logs out current user
session_start();
session_destroy();

header("location: /semantic/");
?>