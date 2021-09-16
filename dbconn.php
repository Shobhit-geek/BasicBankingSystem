<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db = "banksystem";

    $link = mysqli_connect($db_host,$db_user,$db_pass,$db);
    if(!$link)
    {
        die("Couldn't Connect: ".mysqli_error($link));
    }

?>