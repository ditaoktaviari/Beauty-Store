<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $page = "views/kota/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['nama_kota'])){
                $error['nama_kota']="Kota wajib terisi";
            }
            if(empty($_POST['ongkir'])){
                $error['ongkir']="Ongkir wajib angka";
            }
            if(!isset($error)){
                if(!empty($_POST['id_kota'])){
                    $sql = "update kota set nama_kota='$_POST[nama_kota]', ongkir='$_POST[ongkir]'  where md5(id_kota)='$_POST[id_kota]'";
                }else{
                    $sql = "INSERT INTO kota (id_kota, nama_kota, ongkir) 
                    VALUES (NULL,'$_POST[nama_kota]', '$_POST[ongkir]')";
                }
                if ($conn->query($sql) === TRUE) {
                    header('Location:'.$con->site_url().'/admin/index.php?mod=kota');
                } else {
                    $error['msg'] = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }else{
            $error['msg']="Tidak diizinkan";
        }
        if(isset($error)){
            $page = "views/kota/tambah.php";
            include_once 'views/template.php';
        }
        $conn->close();
    break;
    case 'edit':
        $sql = "SELECT * FROM kota WHERE md5(id_kota)='$_GET[id]'";
        $kota = $conn->query($sql);
        $_POST=$kota->fetch_assoc();
        $_POST['id_kota']=md5($_POST['id_kota']);
       // var_dump($pelanggan);

        $page="views/kota/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete':
        $sql = "delete from kota where md5(id_kota)='$_GET[id]'";
        $kota = $conn->query($sql);
        header('Location:'.$con->site_url().'/admin/index.php?mod=kota');
    break;
    default :
        $sql = "select * from kota";
        $kota = $conn -> query($sql);
        $conn -> close();
        $page = "views/kota/tampil.php";
        include_once 'views/template.php';
} 
?>