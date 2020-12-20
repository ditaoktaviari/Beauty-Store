<?php
include_once '../../config/Config.php';
$con = new Config();

if(isset($_POST['email'])){
    //action
    $conn = $con->koneksi(); // panggil koneksi

    $email = $_POST['email'];
    $psw = md5($_POST['password']);

    $sql = "SELECT * FROM pelanggan where password='$psw' and email='$email'";
    $user = $conn->query($sql);

    if($user->num_rows>0){
        $sess = $user->fetch_array();
        $_SESSION['login']['email']=$sess['email'];
        $_SESSION['login']['id_pelanggan']=$sess['id_pelanggan'];

        header('Location:'.'http://localhost:8080/Beautyd2/index.php');
        //echo "<script>location:'../index.php?mod=pelanggan';<script>";
    }else{
        /* $msg = "Email atau Password salah"; */
        echo "<script>alert('Email atau password salah');location='sign-in.php';</script>";
        /* header('Location:'.'http://localhost:8080/Beautyd2/asset/php/views/sign-in.php'); */
    }
}else{
    header('Location:'.'http://localhost:8080/Beautyd2/php/views/sign-in.php'); 
}

?>