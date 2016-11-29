<?php

include includes("/dbconnect.php");




$hash = password_hash($userPassword,PASSWORD_DEFAULT);


if (password_verify($hash,$hash,['cost' => 12])){
    //Login Successful
    if(password_needs_hash($hash,PASSWORD_DEFAULT,['cost' => 12])){

    }
}

?>