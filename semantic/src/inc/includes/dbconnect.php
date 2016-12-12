<?php

//credentials for connection
define('DB_SERVER','eu-cdbr-azure-west-a.cloudapp.net');
define('DB_USERNAME','bb78bf129caea6');
define('DB_PASSWORD','8b6b715e');
define('DB_DATABASE','goportlethencs8');
//connects to database server
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

?>