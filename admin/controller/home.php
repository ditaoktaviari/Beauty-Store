<?php
$con->auth();
$conn=$con->koneksi();

switch(@$_GET['page']){
    case 'edit':
    break;
    default :
        $email=$_SESSION['login']['email'];
        $sql = "select * from admin where email = '$email'";
        $home = $conn -> query($sql);
        $home = mysqli_fetch_assoc($home);
        $conn -> close();
        $page = "views/home/tampil.php";
        include_once 'views/template.php';
} 
?>