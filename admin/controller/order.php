<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
     case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['nama_kategori'])){
                $error['nama_kategori']="nama kategori wajib terisi";
            }
            if(!isset($error)){
                if(!empty($_POST['id_order'])){
                    $sql = "update order set id_pelanggan='$_POST[id_pelanggan]', alamat_pengiriman='$_POST[alamat_pengiriman]', 
                    id_kota='$_POST[id_kota]', status_order='$_POST[status_order]', status_konfirmasi='$_POST[status_konfirmasi]', 
                    status_diterima='$_POST[status_diterima]'where md5(id_order)='$_POST[id_order]'";
                }/* else{
                    $sql = "INSERT INTO kategori_produk (id_kategori, nama_kategori) 
                    VALUES (NULL,'$_POST[nama_kategori]')";
                } */
                if ($conn->query($sql) === TRUE) {
                    header('Location:'.$con->site_url().'/admin/index.php?mod=order');
                } else {
                    $error['msg'] = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }else{
            $error['msg']="Tidak diizinkan";
        }
        if(isset($error)){
            $page = "views/order/tambah.php";
            include_once 'views/template.php';
        }
        $conn->close();
    break;
    case 'edit':
        $sql = "SELECT * FROM order WHERE md5(id_order)='$_GET[id]'";
        $order = $conn->query($sql);
        $_POST=$order->fetch_assoc();
        $_POST['id_order']=md5($_POST['id_order']);
       // var_dump($pelanggan);
        $kota="select * from kota";
        $kota=$conn->query($kota);
        $pelanggan="select * from pelanggan";
        $pelanggan=$conn->query($pelanggan);
        $page="views/order/tambah.php";
        include_once 'views/template.php';
    break; 
    case 'delete':
        $sql = "delete from order where md5(id_order)='$_GET[id]'";
        $order = $conn->query($sql);
        header('Location:'.$con->site_url().'/admin/index.php?mod=order');
    break;
    default :
        $sql = "select * from order join kota using(id_kota) join pelanggan using (id_pelanggan)";
        $order = $conn -> query($sql);
        $conn -> close();
        $page = "views/order/tampil.php";
        include_once 'views/template.php';
} 
?>