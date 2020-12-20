<?php
    include_once '../../config/Config.php';
    $con = new Config();
    if($con->auth())
        include_once 'keranjang.php';
    else
        include_once 'sign-in.php';
?>