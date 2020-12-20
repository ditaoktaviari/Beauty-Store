<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $kota="select * from kota";
        $kota=$conn->query($kota);
        $page = "views/pelanggan/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
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
    
            if(!isset($error)){
                if(!empty($_POST['id_pelanggan'])){
                    $sql = "update pelanggan set nama='$_POST[nama]', telp='$_POST[telp]', alamat='$_POST[alamat]', id_kota='$_POST[id_kota]', email='$_POST[email]', password=md5('$_POST[password]')  where md5(id_pelanggan)='$_POST[id_pelanggan]'";
                }else{
                    $sql = "INSERT INTO pelanggan (id_pelanggan, nama, telp, alamat, id_kota, email, password) 
                    VALUES (NULL,'$_POST[nama]','$_POST[telp]','$_POST[alamat]','$_POST[id_kota]','$_POST[email]',md5('$_POST[password]'))";
                }
                if ($conn->query($sql) === TRUE) {
                    header('Location:'.$con->site_url().'/admin/index.php?mod=pelanggan');
                } else {
                    $error['msg'] = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }else{
            $error['msg']="Tidak diizinkan";
        }
        if(isset($error)){
            $page = "views/pelanggan/tambah.php";
            include_once 'views/template.php';
        }
        $conn->close();
    break;
    case 'edit':
        $sql = "SELECT * FROM pelanggan WHERE md5(id_pelanggan)='$_GET[id]'";
        $pelanggan = $conn->query($sql);
        $_POST=$pelanggan->fetch_assoc();
        $_POST['id_pelanggan']=md5($_POST['id_pelanggan']);
       // var_dump($pelanggan);
        $kota="select * from kota";
        $kota=$conn->query($kota);
        $page="views/pelanggan/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete':
        $sql = "delete from pelanggan where md5(id_pelanggan)='$_GET[id]'";
        $pelanggan = $conn->query($sql);
        header('Location:'.$con->site_url().'/admin/index.php?mod=pelanggan');
    break;
    default :
        $sql = "select * from pelanggan join kota using(id_kota)";
        $pelanggan = $conn -> query($sql);
        $conn -> close();
        $page = "views/pelanggan/tampil.php";
        include_once 'views/template.php';
} 
?>