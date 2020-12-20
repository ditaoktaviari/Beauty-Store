<?php
include_once '../../config/Config.php';
$con = new Config();
$conn=$con->koneksi();

        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['nama'])){
                $error['nama']="Nama wajib terisi";
            }
            if(empty($_POST['alamat'])){
                $error['alamat']="Alamat wajib terisi";
            }
            if(empty($_POST['email'])){
                $error['email']="Email wajib terisi";
            }
            if(empty($_POST['password'])){
                $error['password']="Password wajib terisi";
            }
            if(!is_numeric($_POST['telp'])){
                $error['telp']="Telp wajib angka";
            }
    
            //if(!isset($error)){
                $sql = "INSERT INTO pelanggan (id_pelanggan, nama, telp, alamat, id_kota, email, password) 
                    VALUES (NULL,'$_POST[nama]','$_POST[telp]','$_POST[alamat]','$_POST[id_kota]','$_POST[email]',md5('$_POST[password]'))";

                if ($conn->query($sql) === TRUE) {
                    header('Location:'.$con->site_url().'/php/views/sign-in.php');
                } else {
                    $error['msg'] = "Error: " . $sql . "<br>" . $conn->error;
                    header('Location:'.$con->site_url().'/php/views/sign-up.php');
                }
           /*  } */
        }else{
            $error['msg']="Tidak diizinkan";
        }
        /* if(isset($error)){
            header('Location:'.$con->site_url().'/asset/php/views/sign-up.php');
        } */
        $conn->close();
?>