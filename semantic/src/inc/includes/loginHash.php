<?php

include includes("/dbconnect.php");



$salt = random_bytes(16);
$hash = password_hash($userPassword,PASSWORD_DEFAULT);
$hashkey =  $salt +$hash;


if (password_verify($hashkey,$hash,['cost' => 12])){
    //Login Successful
    if(password_needs_hash($hashkey,PASSWORD_DEFAULT,['cost' => 12])){

    }
}
//achangge
?>