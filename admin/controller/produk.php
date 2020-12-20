<?php
$con->auth();
$conn=$con->koneksi();
switch(@$_GET['page']){
    case 'add':
        $kategori="select * from kategori_produk";
        $kategori=$conn->query($kategori);
        $page = "views/produk/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){

            //validasi
            if(empty($_POST['nama_produk'])){
                $error['nama_produk']="Nama Produk wajib terisi";
            }
            if(empty($_POST['deskripsi'])){
                $error['deskripsi']="Deskripsi wajib terisi";
            }
            if(!is_numeric($_POST['stok'])){
                $error['stok']="Stok wajib angka";
            }
            if(!is_numeric($_POST['berat'])){
                $error['berat']="Berat wajib angka";
            }
            if(!is_numeric($_POST['harga_beli'])){
                $error['harga_beli']="Harga Beli wajib angka";
            }
            if(!is_numeric($_POST['harga_jual'])){
                $error['harga_jual']="Harga jual wajib angka";
            }
        
            //validasi file
            if(!empty($_FILES['fileToUpload']["name"])){
                $target_dir = "../media/";
                $photo=time().basename($_FILES["fileToUpload"]["name"]);
                $target_file = $target_dir . $photo;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    $error["fileToUpload"]= "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    $error["fileToUpload"]= "File is not an image.";
                    $uploadOk = 0;
                  }
                }
                
                // Check if file already exists
                if (file_exists($target_file)) {
                  $error["fileToUpload"]= "Sorry, file already exists.";
                  $uploadOk = 0;
                }
                
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 1048576) {
                  $error["fileToUpload"]= "Sorry, your file is too large.";
                  $uploadOk = 0;
                }
                
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                  $error["fileToUpload"]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
                }
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 1) {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    //$err["fileToUpload"]= "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    $_POST['photo']=$photo;
                    if(isset($_POST['photo_old']) && $_POST['photo_old']!=''){
                        unlink($target_dir.$_POST['photo_old']);
                    }
                  } else {
                    $error["fileToUpload"]= "Sorry, there was an error uploading your file.";
                  }
                }
            }
            
            if(!isset($error)){
                if(!empty($_POST['id_produk'])){
                    //update
                    if(isset($_POST['photo'])){
                        $sql="update produk set id_kategori='$_POST[id_kategori]',nama_produk='$_POST[nama_produk]',deskripsi='$_POST[deskripsi]',harga_beli='$_POST[harga_beli]',harga_jual='$_POST[harga_jual]',stok='$_POST[stok]',berat='$_POST[berat]',photo='$_POST[photo]'  
                        where md5(id_produk)='$_POST[id_produk]'";
                    }else{
                        $sql="update produk set id_kategori='$_POST[id_kategori]',nama_produk='$_POST[nama_produk]',deskripsi='$_POST[deskripsi]',harga_beli='$_POST[harga_beli]',harga_jual='$_POST[harga_jual]',stok='$_POST[stok]',berat='$_POST[berat]' 
                        where md5(id_produk)='$_POST[id_produk]'";
                    }
                }else{
                    //save
                    if(isset($_POST['photo'])){
                        $sql="INSERT INTO produk (id_produk,id_kategori,nama_produk,deskripsi,harga_beli,harga_jual,stok,berat,photo,tgl_masuk) 
                        VALUES ('','$_POST[id_kategori]','$_POST[nama_produk]','$_POST[deskripsi]','$_POST[harga_beli]','$_POST[harga_jual]','$_POST[stok]','$_POST[berat]','$_POST[photo]',now())";
                    }else{
                        $sql="INSERT INTO produk (id_produk,id_kategori,nama_produk,deskripsi,harga_beli,harga_jual,stok,berat,tgl_masuk) 
                        VALUES ('','$_POST[id_kategori]','$_POST[nama_produk]','$_POST[deskripsi]','$_POST[harga_beli]','$_POST[harga_jual]','$_POST[stok]','$_POST[berat]',now())";
                    }
                }
                    if ($conn->query($sql) === TRUE) {
                        header('Location: '.$con->site_url().'/admin/index.php?mod=produk');
                    } else {
                        $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        }else{
            $error['msg']="Tidak diizinkan";
        }
        if(isset($error)){
            $page = "views/produk/tambah.php";
            include_once 'views/template.php';
        }
        $conn->close();
    break;
    case 'edit':
        $sql = "SELECT * FROM produk WHERE md5(id_produk)='$_GET[id]'";
        $produk = $conn->query($sql);
        $_POST=$produk->fetch_assoc();
        $_POST['id_produk']=md5($_POST['id_produk']);
       // var_dump($pelanggan);
        $kategori="select * from kategori_produk";
        $kategori=$conn->query($kategori);
        $page="views/produk/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete':
        $sql = "delete from produk where md5(id_produk)='$_GET[id]'";
        $produk = $conn->query($sql);
        header('Location:'.$con->site_url().'/admin/index.php?mod=produk');
    break;
    default :
        $sql = "select * from produk join kategori_produk using(id_kategori)";
        $produk = $conn -> query($sql);
        $conn -> close();
        $page = "views/produk/tampil.php";
        include_once 'views/template.php';
} 
?>