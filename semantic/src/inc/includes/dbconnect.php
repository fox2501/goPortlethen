<?php
/**
 * Created by PhpStorm.
 * User: Lorna
 * Date: 21/11/2016
 * Time: 15:27
 */

define('DB_SERVER','eu-cdbr-azure-west-a.cloudapp.net');
define('DB_USERNAME','bb78bf129caea6');
define('DB_PASSWORD','8b6b715e');
define('DB_DATABASE','goportlethencs8');

$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

?>