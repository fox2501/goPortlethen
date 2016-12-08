<?php
/**
 * Created by PhpStorm.
 * User: liams
 * Date: 08/12/2016
 * Time: 13:12
 */

$host = 'eu-cdbr-azure-west-a.cloudapp.net';
$db = 'goportlethencs8';
$user = 'bb78bf129caea6';
$pass ='8b6b715e';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

?>