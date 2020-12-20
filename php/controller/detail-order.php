<?php
$con->auth();
$conn=$con->koneksi();

        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(!is_numeric($_POST['no_rek'])){
                $error['no_rek']="No rekening wajib angka";
            }
            if(empty($_POST['nama_bank'])){
                $error['nama_bank']="Nama bank wajib terisi";
            }
            if(empty($_POST['atas_nama'])){
                $error['atas_nama']="Atas nama wajib terisi";
            }
            if(!isset($error)){
                $id_pelanggan=$_SESSION['login']['id_pelanggan'];
                $sql = "INSERT INTO order (id_order, id_pelanggan, tgl_order, alamat_pengiriman, id_kota) 
                    VALUES ('','$id_pelanggan',now(),'$_POST[alamat_pengiriman]','$_POST[id_kota]')";
                if ($conn->query($sql) === TRUE) {
                    $sql2 = "INSERT INTO konfirmasi (id_konfirmasi, id_order, id_bank, nama_pengirim, rek_pengirim, tgl_konfirmasi, bukti_transfer) 
                    VALUES ('','$id_pelanggan','$_POST[id_order]','$_POST[id_bank]','$_POST[nama_pengirim]','$_POST[rek_pengirim]',now(),'$_POST[bukti_transfer]')";

                    $sql3 = "INSERT INTO detail_order (id_detail_order, id_order, id_produk, id_kota, jumlah) 
                    VALUES ('','$_POST[id_order]','$_POST[id_produk]','$_POST[id_kota]', '$_POST[jumlah]')";

                    

                    header('Location:'.$con->site_url().'/admin/index.php?mod=bank');
                } else {
                    $error['msg'] = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }else{
            $error['msg']="Tidak diizinkan";
        }
        if(isset($error)){
            $page = "views/bank/tambah.php";
            include_once 'views/template.php';
        }
        $conn->close();

?>