<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $page = "views/bank/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
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
                if(!empty($_POST['id_bank'])){
                    $sql = "update bank set no_rek='$_POST[no_rek]', nama_bank='$_POST[nama_bank]', atas_nama='$_POST[atas_nama]' 
                    where md5(id_bank)='$_POST[id_bank]'";
                }else{
                    $sql = "INSERT INTO bank (id_bank, no_rek, nama_bank, atas_nama) 
                    VALUES (NULL,'$_POST[no_rek]','$_POST[nama_bank]','$_POST[atas_nama]')";
                }
                if ($conn->query($sql) === TRUE) {
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
    break;
    case 'edit':
        $sql = "SELECT * FROM bank WHERE md5(id_bank)='$_GET[id]'";
        $bank = $conn->query($sql);
        $_POST=$bank->fetch_assoc();
        $_POST['id_bank']=md5($_POST['id_bank']);
       // var_dump($pelanggan);

        $page="views/bank/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete':
        $sql = "delete from bank where md5(id_bank)='$_GET[id]'";
        $bank = $conn->query($sql);
        header('Location:'.$con->site_url().'/admin/index.php?mod=bank');
    break;
    default :
        $sql = "select * from bank";
        $bank = $conn -> query($sql);
        $conn -> close();
        $page = "views/bank/tampil.php";
        include_once 'views/template.php';
} 
?>