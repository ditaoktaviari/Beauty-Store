<?php
include_once '../config/Config.php';
$con = new Config();
if($con->auth()){
    //panggil fungsi
    switch(@$_GET['mod']){
        case 'admin':
            include_once 'controller/admin.php';
        break;
        case 'pelanggan':
            include_once 'controller/pelanggan.php';
        break;
        case 'bank':
            include_once 'controller/bank.php';
        break;
        case 'kota':
            include_once 'controller/kota.php';
        break;
        case 'kategori':
            include_once 'controller/kategori.php';
        break;
        case 'produk':
            include_once 'controller/produk.php';
        break;
        case 'order':
            include_once 'controller/order.php';
        break;
        default:
            include_once 'controller/home.php';
    } 
}else{
    //panggil login
    include_once 'controller/login.php';
}
?>