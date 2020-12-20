<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $page = "views/admin/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['email'])){
                $error['email']="Email wajib terisi";
            }
            if(empty($_POST['password'])){
                $error['password']="Password wajib angka";
            }
            if(!isset($error)){
                if(!empty($_POST['id_admin'])){
                    $sql = "update admin set email='$_POST[email]', password=md5('$_POST[password]')  where md5(id_admin)='$_POST[id_admin]'";
                }else{
                    $sql = "INSERT INTO admin (id_admin, email, password) 
                    VALUES (NULL,'$_POST[email]',md5('$_POST[password]'))";
                }
                if ($conn->query($sql) === TRUE) {
                    header('Location:'.$con->site_url().'/admin/index?mod=admin');
                } else {
                    $error['msg'] = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }else{
            $error['msg']="Tidak diizinkan";
        }
        if(isset($error)){
            $page = "views/admin/tambah.php";
            include_once 'views/template.php';
        }
        $conn->close();
    break;
    case 'edit':
        $sql = "SELECT * FROM admin WHERE md5(id_admin)='$_GET[id]'";
        $admin = $conn->query($sql);
        $_POST=$admin->fetch_assoc();
        $_POST['id_admin']=md5($_POST['id_admin']);
       // var_dump($pelanggan);

        $page="views/admin/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete':
        $sql = "delete from admin where md5(id_admin)='$_GET[id]'";
        $admin = $conn->query($sql);
        header('Location:'.$con->site_url().'/admin/index?mod=admin');
    break;
    default :
        $sql = "select * from admin";
        $admin = $conn -> query($sql);
        if(isset($_POST["submit"])){
            $search = $_POST['keyword'];
            $sql = "SELECT * FROM admin WHERE id_admin LIKE '%$search%'";
            $search2 = $conn -> query($sql);
        }
        $conn -> close();
        $page = "views/admin/tampil.php";
        include_once 'views/template.php';
} 
?>